<?php 
use App\Controladores\ControladorUsuario;
use App\Controladores\ControladorControl;
use App\Clases\Persona;
use App\Clases\Control;
use App\Clases\Historial; 

include_once "includes/autoload.php";
session_start();
$objUser = new ControladorUsuario();
$objControl = new ControladorControl();
$controlPrueba = new Control();
$objPersona = new Persona();
$objHistorial = new Historial();
$historial = new Historial();

$accion = $_POST['accion'];


switch ($accion) {
	//GHADIR---------------------------------------------------------------------------------------------
    case 'HISTORIALCLINICO':

        $historial->setDniPaciente($_POST['dni']);
        // $historialClinico = $historial->getHistorialClinico();
        $controlPrueba->setDniPaciente($_POST['dni']);
        // $paciente = $controlPrueba->obtenerDatosPacientePorDni();

        $datosHistorialClinico = array("paciente" => $controlPrueba->obtenerDatosPacientePorDni(),
            "historialClinico" => $historial->getHistorialClinico());

        echo json_encode($datosHistorialClinico);

        break;
//----------------------------------------------------------------------------------------------------
	case 'REGISTRAR':
	  $nombre = $_POST['nombre'];
	  $user = $_POST['user'];
	  $clave = $_POST['clave'];
	  $tipo = $_POST['tipo'];
      
      $guardar = $objUser->CrearUsuario($nombre,$user,$clave,$tipo);

       echo $guardar;

		break;
	case 'LOGIN':
	  $user = $_POST['email'];
		$clave = $_POST['password'];

		 $inicio = $objUser->login($user,$clave); 

		 echo $inicio;
		break;
	case 'CONTROL':
	   $datos = array(
            'codigo'=>$_POST['codigo'],
            'docprueba'=>$_POST['docprueba'],
            'tipoprueba'=>$_POST['tipoprueba'],
            'fechaprueba'=>$_POST['fechaprueba'],
            'fechareg'=>$_POST['fechareg'],
            'mtransporte'=>$_POST['mtransporte'],
            'resultado'=>$_POST['resultado'],
            'estadiapersona'=>$_POST['estadiapersona'],
            'user'=>$_SESSION['user'],
            'tipoDoc'=>$_POST['tipoDoc'],
            'dni'=>$_POST['dni'],
            'nombres'=>$_POST['nombres'],
            'apellidos'=>$_POST['apellidos']
	   	);
      
      $ress = $objControl->controles($datos);

      echo $ress;

            
		break;

	case 'MOSTRAR_LISTA':
	   	$dni = $_POST['dni'];

	   	$muestroTabla = $objControl->listarControl($dni);

	   	echo $muestroTabla;
    

		break;

	default:
		# code...
		break;
}



 ?>