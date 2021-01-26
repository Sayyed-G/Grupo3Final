<?php
namespace App\Clases;
use includes\ConexionBD as Conexion;
include_once "includes/autoload.php";
class Persona
{
    private $tipoDoc;
    private $dni;
    private $nombres;
    private $apellidos;


    public function gettipoDoc()
    {
        return $this->tipoDoc;
    }

    public function settipoDoc($tipoDoc)
    {
        return $this->tipoDoc = $tipoDoc;
    }

    public function getdni()
    {
        return $this->dni;
    }

    public function setdni($dni)
    {
       return $this->dni = $dni;
    }

    public function getnombres()
    {
        return $this->nombres;
    }

    public function setnombres($nombres)
    {
        return $this->nombres = $nombres;
    }

    public function getapellidos()
    {
        return $this->apellidos;
    }

    public function setapellidos($apellidos)
    {
        return $this->apellidos = $apellidos;
    }

  public function guardar()
  {
    try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO persona(tipoDoc,documento,nombres,apellidos)
                    VALUES(?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->tipoDoc, \PDO::PARAM_STR);
            $stmt->bindParam(2, $this->dni, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->nombres, \PDO::PARAM_STR);
            $stmt->bindParam(4, $this->apellidos, \PDO::PARAM_STR);
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

  public function personaID()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT id from persona where documento=:dni ";
            
            $parameter = array(
                    ':dni'=>$this->dni
                );
            $stmt = $conn->prepare($sql);
            $stmt->execute($parameter);
           // $mostrar = $stmt->fecthAll();
      
            $conexionDB->cerrarConexion();
          
          return $stmt;      
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
 public function buscar()
 {
    try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT *from persona where documento=:dni ";
            
            $parameter = array(
                    ':dni'=>$this->dni
                );
            $stmt = $conn->prepare($sql);
            $stmt->execute($parameter);
            $ok = $stmt->rowCount();
      
            $conexionDB->cerrarConexion();
            if ($ok!=0) {
                return true;
            } else {
                return false;
            }
          
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
 }

 
}