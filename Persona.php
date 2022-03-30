<?php
class Persona{

    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre, $apellido, $tipo, $doc)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->tipoDocumento=$tipo;
        $this->numeroDocumento=$doc;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    public function setNombre($x){
        $this->nombre=$x;
    }
    public function setApellido($x){
        $this->apellido=$x;
    }
    public function setTipoDocumento($x){
        $this->tipoDocumento=$x;
    }
    public function setNumeroDocumento($x){
        $this->numeroDocumento = $x;
    }

    public function __toString()
    {
        return "    Nombre: " . $this->getNombre().
        "\n    Apellido: " .$this->getApellido() . 
        "\n    Tipo Documento: " . $this->getTipoDocumento(). 
        "\n    Numero Documento: " . $this->getNumeroDocumento(); 
    }
}