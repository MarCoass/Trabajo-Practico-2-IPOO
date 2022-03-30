<?php
include "Persona.php";

echo "Test Persona: \n";
$persona = new Persona("Mar", "Coassin", "DNI", "42969186");
echo $persona-> __toString();