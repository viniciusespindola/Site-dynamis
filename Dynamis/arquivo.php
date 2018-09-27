<?php 
require_once('config/config.inc.php');

$ler = new ler;
$ler->Query("*", "usuarios");
$ler->getResultados();
echo "<pre>";
echo $ler->getResultados()[1]['nm_email'];

?>