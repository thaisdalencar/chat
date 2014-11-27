<?php 
session_start();
$id_dono = $_SESSION['id'];
if (isset($_GET['id_amigo'])) {
	$id_amigo = $_GET['id_amigo'];
	include_once 'app.php';
	$checar = new app;
	$retorno = $checar->checar_nova_msg($id_dono, $id_amigo);
	if($retorno == true){
		echo "true";
	}else{
		echo "false";
	}
}
?>