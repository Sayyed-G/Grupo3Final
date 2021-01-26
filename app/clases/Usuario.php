<?php
namespace App\Clases;
use includes\ConexionBD as Conexion;
include_once "includes/autoload.php";

class Usuario{
    private $id;
    private $nombres;
    private $user;
    private $clave;
    private $tipo;


    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
       return $this->id = $id;
         
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(string $user)
    {
       return $this->user = $user;
    }

    public function getClave()
    {
        return $this->clave;
    }


    public function setClave(string $clave)
    {
       return $this->clave= $clave;
        
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres)
    {
       return $this->nombres = $nombres;
         
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo)
    {
       return $this->tipo = $tipo;
       
    }

    public function crear() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO usuario(nombres, user, clave, tipo)
                    VALUES(?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->nombres, \PDO::PARAM_STR);
            $stmt->bindParam(2, $this->user, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->clave, \PDO::PARAM_STR);
            $stmt->bindParam(4, $this->tipo, \PDO::PARAM_INT);
            $stmt->execute();
            $filas = $stmt->rowCount();
            $conexionDB->cerrarConexion();
            if ($filas!=0) {
                return true;
            } else {
               return false;
           }
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function mostrarPorUsuario()
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM usuario WHERE user=? ";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->user, \PDO::PARAM_STR);

            $stmt->execute();
            //$resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();
            
            return $stmt;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
