<?php
include_once '../../includes/ConexionBD.php'; 
include_once '../../app/clases/Control.php';

$controlPrueba = new Control();

$codigo = $_POST['codigo'];
$numprueba = $_POST['numprueba'];
$tipoprueba = $_POST['tipoprueba'];
$fechaPrueba = $_POST['fechaPrueba'];
$fechaReg = $_POST['fechaReg'];
$tipotransporte = $_POST['tipotransporte'];
$estadiaPersona = $_POST['estadiaPersona'];
$resultado = $_POST['resultado'];

$guardar = $controlPrueba->guardar($codigo,$numprueba,$tipoprueba,$fechaPrueba,$fechaReg,$tipotransporte,$resultado,$estadiaPersona);

$guardar = $guardar ? true:false;

if ($guardar) {
	echo 'El registro fue guardado';
} else {
	echo 'No fue guardado';
}

 ?>
