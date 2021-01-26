<?php

namespace App\Controladores;


use App\Clases\Usuario;
include_once "includes/autoload.php";

class ControladorUsuario
{
    public function login(string $user, string $password)
    {
        $usuario = new Usuario();
        $usuario ->setUser($user);
        $query = $usuario->mostrarPorUsuario();
        if ($query->rowCount() != 1) {
            $msj = "Usuario incorrecto";
        } else {
            $datos = $query->fetchAll();
            foreach ($datos as $user) {
                $passwordBD = $user["clave"];
                $nombres = $user["nombres"];
                $tipo = $user["tipo"];
                $id = $user['id'];

            }
            if (password_verify($password, $passwordBD)) {
               // session_start();
                $_SESSION['user'] = $id;
                $_SESSION["nombre"] = $nombres;
                $_SESSION["tipo"] = $tipo;
                $_SESSION["estado"] = "ok";
               // header("Location: bienvenido");
                $msj = 1;
            } else {
                $msj = "Usuario y/o Contraseña incorrecto";
            }
        }
        return $msj;
    }

    public function CrearUsuario(string $nombre, string $user, string $clave, int $tipo) {
        
        $mensaje = "";

        if (!$this->validarCadena($nombre)) {
            $mensaje .= "Caracteres no admitidos en Nombres<br>";
        }

        if (!$this->validarCorreo($user)) {
            $mensaje .= "El correo no cumple con el formato establecido<br>";
        }
         
         if (strlen($mensaje) == 0) {
         
         $objUser = new Usuario();
          $objUser->setNombres($nombre);
          $objUser->setUser($user);
          $claveHash = password_hash($clave, PASSWORD_BCRYPT);
          $objUser->setClave($claveHash);
          $objUser->setTipo($tipo);

          $guardar = $objUser->crear();
          $guardar = $guardar ? true : false;
          if ($guardar) {
             $mensaje = 'Se guardó';
          } else {
            $mensaje = 'No se pudo guardar';
          }
       }

          return $mensaje;
    }

    public function validarCadena($cadena)
    {
        $valores = null;
        preg_match("/[a-zA-Z ]+/", $cadena, $valores);
        $validacion = (strlen($cadena) == strlen($valores[0])) ? true : false;
        return $validacion;
    }
    public function validarCorreo($cadena)
    {
      $valores = null;
      return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $cadena, $valores)) ? true : false;
    }

}