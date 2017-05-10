<?php
//include_once("analyticstracking.php") ;
include_once "funciones.php";
//http://localhost/marcador?numeroDocumento=44729231&local=1

$documento=$_REQUEST['numeroDocumento'];
$local=$_REQUEST['local'];
$ip=$_SERVER['REMOTE_ADDR'];
$resp=registrarMarca($documento,$local,$ip);

echo $resp;
?>
