<?php 
	if (!isset($_SESSION)) session_start();
	$id_dono = $_SESSION['id'];
	
	include_once '../controller/app.php';
	$listar = new app;
	$lista = $listar->listar_membros($id_dono);
	include_once("../view/mostrar_membros.php");
?>