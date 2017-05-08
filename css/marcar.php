<?php
include_once("analyticstracking.php") ;
include_once "funciones.php";
//tipoEntidad=Todas&moneda=1&departamento=15&plazo=360&monto=10000

$documento=$_REQUEST['numeroDocumento'];
$local=$_REQUEST['local'];
$resp=registrarMarca($documento,$local);

echo $resp;
?>
