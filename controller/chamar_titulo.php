<?php 
if (isset($_GET['nome']) and !empty($_GET['nome'])) {
	$id_amigo = $_GET['nome'];
	include_once 'app.php';
	$mostrar = new app();
	$titulo = $mostrar->mostrar_titulo($id_amigo);
	include_once("../view/mostrar_titulo.php");	
	}
?>