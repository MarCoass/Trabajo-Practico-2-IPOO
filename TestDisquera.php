<?php
include "Disquera.php";
include "Persona.php";

echo "Test Disquera:\n";
$duenio = new Persona("Mar", "Coass", "DNI", 42969186);
$horario1 = ["horas"=>9, "minutos"=>30];
$horario2 = ["horas"=>13, "minutos"=>0];
$disquera = new Disquera($horario1, $horario2, "Cerrado", "Plaza Huincul", $duenio);
echo $disquera->__toString();

$coleccionHoras = [
    ["horas"=>9, "minutos"=>30],
    ["horas"=>8, "minutos"=>20],
    ["horas"=>12, "minutos"=>9],
    ["horas"=>13, "minutos"=>1],
    ["horas"=>11, "minutos"=>30],
    ["horas"=>9, "minutos"=>29],
];

foreach($coleccionHoras as $horario){
    $rta = $disquera->dentroHorarioAtencion($horario["horas"], $horario["minutos"])? "Si\n" : "No\n";
    echo "Esta abierto a las " . $horario["horas"].":". $horario["minutos"] ."? " . $rta;
}

foreach($coleccionHoras as $horario){
    echo "Estado actual: " . $disquera->getEstado() . "\n";
    $disquera->abrirDisquera($horario["horas"], $horario["minutos"]);
    echo "Estado despues de abrirDisquera(" . $horario["horas"] . ":" . $horario["minutos"] . "): " . $disquera->getEstado() ."\n";
    $disquera ->cerrarDisquera($horario["horas"], $horario["minutos"]);
    echo "Estado despues de cerrarDisquera(" . $horario["horas"] . ":" . $horario["minutos"] . "): " . $disquera->getEstado() ."\n";
    echo "___________________________________________________________________\n";
}
