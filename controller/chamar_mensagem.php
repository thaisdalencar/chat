<?php 
session_start();
$id_dono = $_SESSION['id'];
if (isset($_GET['nome'])) {
	$id_amigo = $_GET['nome'];
	include_once 'app.php';
	$mostrar = new app();
	$msg = $mostrar->mostrar_msg($id_dono, $id_amigo);
	include_once("../view/mostrar_mensagem.php");	
	}
?>
