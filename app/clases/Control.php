<?php

namespace App\Clases;
use includes\ConexionBD as Conexion;
include_once "includes/autoload.php";


class Control
{
    private $codigo;
    private $docprueba;
    private $tipoprueba;
    private $fechaprueba;
    private $fechareg;
    private $mtransporte;
    private $resultado;
    private $estadiapersona;
    private $usuario_id;

    // aporte ghadir-------------------------------
    private $dni_paciente;
    private $nombres_paciente;
    private $apellidos_paciente;
    private $idPersona;
    private $idControl;

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setIdPersona(string $idPersona)
    {
        return $this->idPersona = $idPersona;
    }

    public function getIdControl()
    {
        return $this->idControl;
    }

    public function setIdControl(string $idControl)
    {
        return $this->idControl = $idControl;
    }

    public function getDniPaciente()
    {
        return $this->dni_paciente;
    }

    public function setDniPaciente(string $dni_paciente)
    {
        return $this->dni_paciente = $dni_paciente;
    }

    public function getNombrePaciente()
    {
        return $this->nombres_paciente;
    }

    public function setNombrePaciente(string $nombre_paciente)
    {
        return $this->nombres_paciente = $nombre_paciente;
    }

    public function getApellidosPaciente()
    {
        return $this->apellidos_paciente;
    }

    public function setApellidosPaciente(string $apellidos_paciente)
    {
        return $this->apellidos_paciente = $apellidos_paciente;
    }


//---------------------------------------------------------

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo)
    {
        return $this->codigo = $codigo;
    }
    public function getdocprueba()
    {
        return $this->docprueba;
    }

    public function setdocprueba(string $docprueba)
    {
        return $this->docprueba = $docprueba;
        
    }
    public function gettipoprueba()
    {
        return $this->tipoprueba;
    }

    public function settipoprueba(string $tipoprueba)
    {
        return $this->tipoprueba = $tipoprueba;
        
    }


    public function getfechaprueba()
    {
        return $this->fechaprueba;
    }

    public function setfechaprueba(string $fechaprueba)
    {
        return $this->fechaprueba = $fechaprueba;
        
    }

    public function getfechareg()
    {
        return $this->fechareg;
    }

    public function setfechareg(string $fechareg)
    {
        return $this->fechareg = $fechareg;
        
    }

    public function getmtransporte()
    {
        return $this->mtransporte;
    }

    public function setmtransporte(string $mtransporte)
    {
        return $this->mtransporte = $mtransporte;
        
    }

    public function getresultado()
    {
        return $this->resultado;
    }

    public function setresultado(string $resultado)
    {
        return $this->resultado = $resultado;
        
    }

    public function getestadiapersona()
    {
        return $this->estadiapersona;
    }


    public function setestadiapersona(string $estadiapersona)
    {
        return $this->estadiapersona = $estadiapersona;
        
    }
    public function getusuario() 
    {
        return $this->usuario_id;
    }
    public function setusuario(int $usuario_id)
    {
        return $this->usuario_id = $usuario_id;
    }

    public function guardar() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO control(codigo,docprueba,tipoprueba,fechaprueba,fechareg,mtransporte,resultado,estadiapersona,usuario_id)
                    VALUES(?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->codigo, \PDO::PARAM_INT);
            $stmt->bindParam(2, $this->docprueba, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->tipoprueba, \PDO::PARAM_STR);
            $stmt->bindParam(4, $this->fechaprueba, \PDO::PARAM_STR);
            $stmt->bindParam(5, $this->fechareg, \PDO::PARAM_STR);
            $stmt->bindParam(6, $this->mtransporte, \PDO::PARAM_STR);
            $stmt->bindParam(7, $this->resultado, \PDO::PARAM_STR);
            $stmt->bindParam(8, $this->estadiapersona, \PDO::PARAM_STR);
            $stmt->bindParam(9, $this->usuario_id, \PDO::PARAM_INT);
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

    public function controlID()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT id from control where codigo=:codigo ";
            
            $parameter = array(
                    ':codigo'=>$this->codigo
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
 
 //------------------------------------------------------------------
//APORTE GHADIR
    public function obtenerDatosPacientePorDni() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM persona WHERE documento = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->dni_paciente, \PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt->fetch();
            }else{
                return false;
            }

            $conexionDB->cerrarConexion();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function obtenerDatosDeControlPorUsuarioLogueado() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT id FROM control WHERE usuario_id = ? ORDER BY id DESC LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->usuario_id, \PDO::PARAM_INT);
            if($stmt->execute()){
                return $stmt->fetch();
            }else{
                return false;
            }

            $conexionDB->cerrarConexion();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function registrarNuevoPaciente() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO persona(documento,nombres,apellidos)
                    VALUES(?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->dni_paciente, \PDO::PARAM_STR);
            $stmt->bindParam(2, $this->nombres_paciente, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->apellidos_paciente, \PDO::PARAM_STR);
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

    public function guardarHistorialClinico() {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO historial(control_id,persona_id)
                    VALUES(?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->idControl, \PDO::PARAM_INT);
            $stmt->bindParam(2, $this->idPersona, \PDO::PARAM_INT);
            $stmt->execute();
            $filas = $stmt->rowCount();

            $conexionDB->cerrarConexion();
            if ($filas!=0) {
                return true;
            } else {
                return false;
            }
//-------------------------------------------------------------------------------------
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    


}