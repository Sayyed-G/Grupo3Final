<?php


namespace App\Clases;


class Administrador
{
    private $codigo;
    private $nombres;
    private $estado;

    public function __construct($codigo, $nombres, $estado)
    {
        $this->codigo = $codigo;
        $this->nombres = $nombres;
        $this->estado = $estado;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }



}