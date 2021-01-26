<?php


namespace App\Clases;


class PruebaCovid
{
    private $estado;
    private $fechaRegistro;
    private $respPersona;
    private $numDocumento;
    private $descripcion;

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
        return $this;
    }

    public function getRespPersona()
    {
        return $this->respPersona;
    }

    public function setRespPersona($respPersona)
    {
        $this->respPersona = $respPersona;
        return $this;
    }

    public function getNumDocumento()
    {
        return $this->numDocumento;
    }

    public function setNumDocumento($numDocumento)
    {
        $this->numDocumento = $numDocumento;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }


}