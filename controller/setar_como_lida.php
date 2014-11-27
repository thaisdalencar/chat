<?php 
session_start();
$id_dono = $_SESSION['id'];
if(isset($_GET['nome'])) {
	$id_from = $_GET['nome'];
	include_once 'app.php';
	$setar = new app;
	$retorno = $setar->setar_como_lida($id_dono, $id_from);
}
?>