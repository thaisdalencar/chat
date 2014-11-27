<?php 
class App{
	var $usuarios;
	var $msg;

	function logar(){
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		include_once '../model/model.php';
		$model = new model();
		$usuario = $model->validar_login($email,$senha);
		if($usuario){
			session_start();
			$_SESSION['id'] = $usuario->getId();
			$_SESSION['nome'] = $usuario->getNome();
			$_SESSION['email'] = $usuario->getEmail();
			$_SESSION['logado'] = true; 
			header("Location:../view/chat.php");			
		}else{
			header("Location:../view/login.php?erro");
		}
	}
	function sessionIniciada($logado){
		if($logado != true){
			header("location: ../view/login.php");
		}else{		
			return true;
		}
	}
	function sair(){
		session_start();
		if($_SESSION['logado'] == true){
			include_once '../model/model.php';
			$sair = new model();
			$sair->desfazer_login($_SESSION['email']);

			unset($_SESSION['id']);
			unset($_SESSION['nome']);
			unset($_SESSION['email']);
			unset($_SESSION['logado']);
			session_unset(); 
			session_destroy();	
			header("location: ../view/login.php");		
		}
	}
	function listar_membros($id_dono){
		include_once '../model/model.php';
		$model = new model();
		$membros = $model->membros($id_dono);
		return $membros;
	}
	function mostrar_msg($id_dono, $id_amigo){
		include_once '../model/model.php';
		$msg = new model();
		$mensagem = $msg->mensagens($id_dono, $id_amigo);
		return $mensagem;
	}
	function enviar_msg($msg, $id_from, $id_to, $time_now){
		include_once '../model/model.php';
		$gravar = new model();	
		$retorno = $gravar->gravar_mensagens($msg, $id_from, $id_to, $time_now);
		return $retorno;
	}
	function mostrar_titulo($id_amigo){
		include_once '../model/model.php';
		$model = new model();
		$titulo = $model->titulo($id_amigo);
		return $titulo;
	}
	function setar_como_lida($id_dono, $id_from){
		include_once '../model/model.php';
		$setar = new model();	
		$retorno = $setar->foi_lida($id_dono, $id_from);
	}
	function checar_nova_msg($id_dono, $id_amigo){
		include_once '../model/model.php';
		$checar = new model();	
		$retorno = $checar->nova_msg($id_dono, $id_amigo);
		if($retorno == true){
			return true;
		}else{
			return false;
		}
	}
}
?>