<?php
  if (!isset($rootDir)) {
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
  }

require_once ($rootDir . "/PHPEmail/SendCorreo.php");


$correoDestino = "";
$asunto = "";
$mensaje = "";

$enviado = SendCorreo::enviar($correoDestino,$asunto,$mensaje);

if($enviado){
	echo "enviado";
}else{
	echo "no enviado";
}