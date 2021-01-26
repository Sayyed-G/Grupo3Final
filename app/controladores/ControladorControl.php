<?php 
namespace App\Controladores;
use App\Clases\Control;
use App\Clases\Persona;
use App\Clases\Historial;
use App\Clases\Cuarentena;
include_once "includes/autoload.php";


Class ControladorControl 
{
	public function controles($datos)
	{
		$controlPrueba = new Control();
        $objPersona = new Persona();
        $objHistorial =  new Historial();
        $objCuarentena = new Cuarentena();

		    $controlPrueba->setCodigo($datos['codigo']);
            $controlPrueba->setdocprueba($datos['docprueba']);
			$controlPrueba->settipoprueba($_POST['tipoprueba']);
			$controlPrueba->setfechaprueba($datos['fechaprueba']);
			$controlPrueba->setfechareg($datos['fechareg']);
			$controlPrueba->setmtransporte($datos['mtransporte']);
			$controlPrueba->setresultado($datos['resultado']);
			$controlPrueba->setestadiapersona($datos['estadiapersona']);
			$controlPrueba->setusuario($datos['user']);

			// GUARDA EL CONTROL ========
			$guardar = $controlPrueba->guardar();

			 $objPersona->settipoDoc($datos['tipoDoc']);
		 	 $objPersona->setdni($datos['dni']);
		 	 $objPersona->setnombres($datos['nombres']);
		 	 $objPersona->setapellidos($datos['apellidos']);
             
             //GUARDAR A LA TABLA PERSONA ==========
             $existe = $objPersona->buscar();
             $existe = $existe ? true:false;
             if (!$existe) {
             	$guardar = $objPersona->guardar();
             }
		 	 
             $ControlID = $controlPrueba->controlID();
             $ControlID = $ControlID->fetchAll();
             foreach ($ControlID as $k => $value) {
             	$id_control = $value['id'];
             }
             
             $PersonaID = $objPersona->personaID();
             $PersonaID = $PersonaID->fetchAll();
             foreach ($PersonaID as $k => $persona) {
             	$id_persona = $persona['id'];
             }
             
             //GUARDA EL HISTORIAL
             $objHistorial->setcontrol_id($id_control);
             $objHistorial->setpersona_id($id_persona);
             $guardar = $objHistorial->guardar();

		 	 $guardar = $guardar ? true:false;
             
             //GUARDAR EN CUARENTENA SI LA PERSONA NO PRESENTO DOCUMENTOS ================
             if($datos['resultado']=='Cuarentena') {  
               $objCuarentena->setControl_id($id_control);
               $objCuarentena->setFechaInicio($datos['fechareg']);
                $quinceDias = date("Y-m-d",strtotime($datos['fechareg']."+ 15 days")); // se genera 15 días a partir de ahora
               $objCuarentena->setFechaFinal($quinceDias);
               $objCuarentena->setDescripcion('');
               $guardarCuarentena = $objCuarentena->guardar();
               $guardarCuarentena = $guardarCuarentena ? true:false;
              }
             //=========================================================
		 	 $listar = $objHistorial->listarHistorial();

		 	 if($listar->rowCount()!=0) {
		 	 	$mostrar = $listar->fetchAll();
               $div='';
		 	 	foreach ($mostrar as $k => $value) {
		 	 		if ($value['resultado']=='Negativo') {
		 	 			$resultado = '<span class="badge bg-success">Negativo</span>';
		 	 		} else {
		 	 			$resultado = '<span class="badge bg-danger">Cuarentena</span>';
		 	 		}
		 	 		$div .= '
                      <tr>
                         <td>'.($k+1).'</td>
                         <td>'.$value['codigo'].'</td>
                         <td>'.$value['fechareg'].'</td>
                         <td>'.$resultado.'</td>
                         <td><button class="btn btn-successs"><i class="fa fa-edit"></i> </button></td>
                      </tr>
		 	 		';
		 	 	}
		 	 }

      return $div;
	}

	public function listarControl($dni) 
	{
	  $objPersona = new Persona();
      $objHistorial =  new Historial();

		$dni = $_POST['dni'];
		$objPersona->setdni($dni);
    $existe = $objPersona->buscar();
       $existe = $existe ? true:false;
    $div='';
    if($existe) {         
		$PersonaID = $objPersona->personaID();
             $PersonaID = $PersonaID->fetchAll();
             foreach ($PersonaID as $k => $persona) {
             	$id_persona = $persona['id'];
             }
        $objHistorial->setpersona_id($id_persona);
        $cod = $objHistorial->listarHistorialPersona();
           $cod = $cod->fetchAll();
         
           foreach ($cod as $k => $historial) {
           	  if ($historial['resultado']=='Negativo') {
		 	 			$resultado = '<span class="badge bg-success">Negativo</span>';
		 	 		} else {
		 	 			$resultado = '<span class="badge bg-danger">Cuarentena</span>';
		 	 		}
		 	 		$div .= '
                      <tr>
                         <td>'.($k+1).'</td>
                         <td>'.$historial['codigo'].'</td>
                         <td>'.$historial['fechareg'].'</td>
                         <td>'.$resultado.'</td>
                         <td><button class="btn btn-successs"><i class="fa fa-edit"></i> </button></td>
                      </tr>
		 	 		';
           }
      }  
         return $div;
	}
}





 ?>