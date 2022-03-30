<?php
include "CuentaBancaria.php";
include "Persona.php";
echo "Test Cuenta Bancaria: \n";
$persona = new Persona("Mar", "Coassin", "DNI", "42969186");
$cuenta = new CuentaBancaria(1,$persona,10,50);
echo $cuenta->__toString()."\n";