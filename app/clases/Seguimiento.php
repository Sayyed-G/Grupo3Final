<?php


namespace App\Clases;


class Seguimiento
{
    private $fecharReporte;
    private $nunDocumento;
    private $descripcion;
    private $prueba;

    public function getFecharReporte()
    {
        return $this->fecharReporte;
    }

    public function setFecharReporte($fecharReporte)
    {
        $this->fecharReporte = $fecharReporte;
        return $this;
    }

    public function getNunDocumento()
    {
        return $this->nunDocumento;
    }

    public function setNunDocumento($nunDocumento)
    {
        $this->nunDocumento = $nunDocumento;
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

    public function getPrueba()
    {
        return $this->prueba;
    }

    public function setPrueba($prueba)
    {
        $this->prueba = $prueba;
        return $this;
    }


}