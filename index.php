<?php

use App\Includes\ConexionBD;
use App\Clases\Historial; 
include_once "includes/autoload.php";

session_start();
/*
if(!isset($_SESSION['user']) && $_SESSION['user']==''){
     header('location: includes/login.php');
     exit;
}
*/


$request = $_SERVER['QUERY_STRING'];
switch ($request) {
    //get
    case "bienvenido":
       $objHistorial = new Historial();
        include_once "App/vistas/bienvenido.php";
        break;
    case "crear-usuarios":
        include_once "App/vistas/uCrear.php";
        break;
    case "registrar-personas":
        include_once "App/vistas/regPersona.php";
        break;
    case "registrar-pnp":
        include_once "App/vistas/regPnp.php";
        break;
    case "registrar-control":
        include_once "App/vistas/controlCovid.php";
        break;
    case "mostrar-historial":
        include_once "App/vistas/mHistorial.php";
        break;
    case "mostrar-cuarentena":
        include_once "App/vistas/mCuarentena.php";
        break;
    case "mostrar-prueba":
        include_once "App/vistas/mPrueba.php";
        break;
    //post
    case "login":
        include_once "App/vistas/uLogin.php";
        break;
    case 'cerrar':
        session_start();
        session_destroy();
        header('location: cerrado');
        break;
    case "guardar-usuario":
        include_once "App/vistas/uCrear.php";
        break;
    case "validar":
        $codigo = $_POST["correo"];
        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->validar($codigo);
        break;
    case "api/personas":
          
        break;

    default:

        include_once "app/vistas/uLogin.php";
        
        break;

}

