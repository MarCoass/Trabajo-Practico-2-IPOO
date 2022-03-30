<?php
class Disquera
{
    private $horaDesde; //horaDesde y horaHasta son arreglos asociativos de la forma ["horas"=> h, "minutos"=>m]
    private $horaHasta;
    private $estado;
    private $direccion;
    private $duenio;


    public function __construct($desde, $hasta, $estado, $direccion, $duenio)
    {
        $this->horaDesde = $desde;
        $this->horaHasta = $hasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->duenio = $duenio;
    }

    public function getHoraDesde()
    {
        return $this->horaDesde;
    }
    public function getHoraHasta()
    {
        return $this->horaHasta;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getDuenio()
    {
        return $this->duenio;
    }

    public function setHoraDesde($x)
    {
        $this->horaDesde = $x;
    }
    public function setHoraHasta($x)
    {
        $this->horaHasta = $x;
    }
    public function setEstado($x)
    {
        $this->estado = $x;
    }
    public function setDireccion($x)
    {
        $this->direccion = $x;
    }
    public function setDuenio($x)
    {
        $this->duenio = $x;
    }

    /**
     * Dada una hora y minutos retorna true si la tienda debe encontrarse abiera en ese horario y false en caso contrario.
     * @param int $hora
     * @param int $minutos
     * @return boolean
     */
    public function dentroHorarioAtencion($hora, $minutos)
    {
        if (
            (($this->getHoraDesde()["horas"] == $hora && $this->getHoraDesde()["minutos"]<=$minutos) || 
                $this->getHoraDesde()["horas"] < $hora) &&
            (($this->getHoraHasta()["horas"] == $hora && $this->getHoraHasta()["minutos"] > $minutos) ||
                $this->getHoraHasta()["horas"]>$hora)
        ) {
            $dentroHora = true;
        } else {
            $dentroHora = false;
        }
        return $dentroHora;
    }

    /**
     * Dada una hora y minutos corrobora que se encuentra dentro del horario de atencion y cambia el estado de la disquera
     * solo si es un horario valido para su apertura
     * @param int $horas
     * @param int $minutos
     */
    public function abrirDisquera($hora, $minutos){
        if ($this->dentroHorarioAtencion($hora, $minutos)){
            $this->setEstado("Abierto");
        }
    }
    /**
     * Dada una hora y minutos corrobora qye se encuentra fuera del horario de atencion y cambia el estado de la disquera
     * solo si es un horario valido para su cierre.
     * @param int $horas
     * @param int $minutos
     */
    public function cerrarDisquera($horas, $minutos){
        if(!$this->dentroHorarioAtencion($horas, $minutos)){
            $this->setEstado("Cerrado");
        }
    }

    public function __toString()
    {
        return "Horario: desde " . $this->getHoraDesde()["horas"] . ":" . $this->getHoraDesde()["minutos"] . " hasta " . $this->getHoraHasta()["horas"]. ":" . $this->getHoraHasta()["minutos"] . 
        "\nEstado: " . $this->getEstado() .
        "\nDireccion: " . $this->getDireccion() .
        "\nDueño: \n". $this->getDuenio();
    }
}
