<?php


namespace App\Clases;
use includes\ConexionBD as Conexion;
include_once "includes/autoload.php";

class Historial
{
    private $control_id;
    private $persona_id;
    private $numHistorial;
    private $dni_paciente;



    public function getcontrol_id()
    {
        return $this->control_id;
    }

    public function setcontrol_id($control_id)
    {
       return $this->control_id = $control_id;
        
    }
    public function getpersona_id()
    {
        return $this->persona_id;
    }

    public function setpersona_id($persona_id)
    {
       return $this->persona_id = $persona_id;
        
    }

    public function getNumHistorial()
    {
        return $this->numHistorial;
    }


    public function setNumHistorial($numHistorial)
    {
        $this->numHistorial = $numHistorial;
        return $this;
    }

    public function getDniPaciente(){
        return $this->dni_paciente;
    }

    public function setDniPaciente(string $dni_paciente){
        $this->dni_paciente = $dni_paciente;
    }

    public function getHistorialClinico() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT c.*, p.documento
                      FROM historial AS h 
                      JOIN control AS c ON h.control_id = c.id
                      JOIN persona AS p ON h.persona_id = p.id
                      WHERE p.documento = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->dni_paciente, \PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return false;
            }

            $conexionDB->cerrarConexion();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


    public function guardar()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO historial(control_id,persona_id)
                    VALUES(?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->control_id, \PDO::PARAM_INT);
            $stmt->bindParam(2, $this->persona_id, \PDO::PARAM_INT);
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

    public function listarHistorial()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT  *from historial as h join persona as p on h.persona_id=p.id join control as c on h.control_id=c.id where c.id=:id ";
            
            $parameter = array(
                    ':id'=>$this->control_id
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

    public function listarHistorialPersona()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT  *from historial as h join persona as p on h.persona_id=p.id join control as c on h.control_id=c.id where p.id=:id ";
            
            $parameter = array(
                    ':id'=>$this->persona_id
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

    public function listarCuarentena($fecha)
    {
        $anterior = date("Y-m-d",strtotime($fecha."- 15 days"));
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT p.nombres as nomP, p.apellidos, cu.fecha_inicio, cu.fecha_final, c.resultado, u.nombres as nomU from historial as h join persona as p on h.persona_id=p.id join control as c on h.control_id=c.id join cuarentena as cu on cu.control_id=c.id join usuario as u on c.usuario_id=u.id where c.resultado=:resultado and cu.fecha_inicio between :fi and :ff ";
            
            $parameter = array(
                    ':resultado'=>'Cuarentena',
                    ':fi'=>$anterior,
                    ':ff'=>$fecha
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

    public function CantidadMes($mes)
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT COUNT( * ) AS cantidad FROM control where MONTH(fechareg)=:mes  ";
            $parameter = array(
                    ':mes'=>$mes
                );

            $stmt = $conn->prepare($sql);
            $stmt->execute($parameter);
           // $mostrar = $stmt->rowCount();
      
            $conexionDB->cerrarConexion();
          
          return $stmt;      
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function cantidad($consulta,$tiempo)
    {
        $fecha = date('Y-m-d');
        $anterior = date("Y-m-d",strtotime($fecha."- ".$tiempo.'"'));
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();

            if($consulta=='REGISTRO'){
            $sql = "SELECT COUNT( * ) AS cantidad FROM control where fechareg between '$anterior' and '$fecha'";
            } else {
             $sql = "SELECT COUNT( * ) AS cantidad FROM control where resultado='Cuarentena' and fechareg between '$anterior' and '$fecha' ";
            }

            $stmt = $conn->prepare($sql);
            $stmt->execute();
           // $mostrar = $stmt->rowCount();
      
            $conexionDB->cerrarConexion();
          
          return $stmt;      
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }



}