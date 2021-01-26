<?php


namespace App\Controladores;


use App\Clases\Cuarentena;

class ControladorCuarentena
{

    function mostrarCuarentena(){
        $guardarCuarentena= new Cuarentena();
        return $guardarCuarentena->mostrarCuarentena();
    }

    function ActualizarCuarentena(array $datos){
        //VAR_DUMP($datos);exit;
        $a= new Cuarentena();
        $a->setcontrolid($datos['id']);
        $a->setdescripcion($datos['descripcion']);
        $a->ActualizarCuarentena();

    }

    function BuscarIdC($id){
        $vehi= new Cuarentena();
        return $vehi->BuscarIdC($id);
    }

}
