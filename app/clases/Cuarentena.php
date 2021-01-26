<?php


namespace App\Clases;
use includes\ConexionBD as Conexion;
include_once "includes/autoload.php";


class Cuarentena
{
    private $fechaInicio;
    private $fechaFinal;
    private $descripcion;
    private $control_id;

   
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio)
    {
        return $this->fechaInicio = $fechaInicio;
        
    }

    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    public function setFechaFinal($fechaFinal)
    {
        return $this->fechaFinal = $fechaFinal;
        
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        return $this->descripcion = $descripcion;
    }

    public function getControl_id()
    {
        return $this->control_id;
    }

    public function setControl_id($control_id)
    {
        return $this->control_id = $control_id;
    }
    
    public function guardar()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO cuarentena(fecha_inicio,fecha_final,descripcion,control_id)
                    VALUES(?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->fechaInicio, \PDO::PARAM_STR);
            $stmt->bindParam(2, $this->fechaFinal, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->descripcion, \PDO::PARAM_STR);
            $stmt->bindParam(4, $this->control_id, \PDO::PARAM_INT);
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

    public function mostrarCuarentena(){
        $Conexion = new Conexion();
        $conn = $Conexion->abrirConexion();

        $sql = "SELECT c.codigo, p.nombres, p.apellidos, cu.fecha_inicio, cu.fecha_final FROM cuarentena AS cu 
					JOIN control AS c ON cu.control_id = c.id
                    JOIN historial AS h ON h.control_id = c.id
                    JOIN persona AS p ON p.id = h.persona_id";

        return $conn->query($sql);
    }

    public function ActualizarCuarentena(){

        $Conexion = new Conexion();
        $conn = $Conexion->abrirConexion();

        $sql = "UPDATE cuarentena SET ". "descripcion='" . $this->descripcion ."'"
            . " WHERE id='" . $this->id."'";
        $conn->query($sql);
        $Conexion->CerrarConexion();
    }

    public function BuscarIdC($id){
        $Conexion = new Conexion();
        $conn = $Conexion->abrirConexion();
        $sql = "SELECT cu.id, p.nombres, p.apellidos, cu.fecha_inicio, cu.fecha_final, cu.descripcion FROM cuarentena AS cu 
					JOIN control AS c ON cu.control_id = c.id
                    JOIN historial AS h ON h.control_id = c.id
                    JOIN persona AS p ON p.id = h.persona_id WHERE cu.id='" . $id."'";
        return $conn->query($sql);

    }



}