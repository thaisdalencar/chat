<?php 
$timezone = new DateTime('now',
            new DateTimeZone('America/Sao_Paulo'));
//Ajusta o formato
$time_now = $timezone->format('d/m/Y H:i:s');

session_start();
$id_from = $_SESSION['id'];
if ((isset($_GET['msg'])) and (isset($_GET['id_to']))) {
	$id_to = $_GET['id_to'];
	$msg = $_GET['msg'];
	include_once 'app.php';
	$enviar = new app;
	$retorno = $enviar->enviar_msg($msg, $id_from, $id_to, $time_now);
}
?>
