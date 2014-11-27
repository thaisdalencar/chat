<?php
	class Usuario{
		public $id;
		public $nome;
		public $email;
		public $logado;		
		function __construct($id, $nome, $email, $logado){
			$this->id = $id;
			$this->nome = $nome;
			$this->email = $email;
			$this->logado = $logado;
		}		
		function getId(){
			return $this->id;
		}
		function setId($id){
			$this->id = $id;
		}
		function getNome(){
			return $this->nome;
		}
		function setNome($nome){
			$this->nome = $nome;
		}
		function getEmail(){
			return $this->email;
		}
		function setEmail($email){
			$this->email = $email;
		}	
		function getLogado(){
			return $this->logado;
		}
		function setLogado($logado){
			$this->logado = $logado;
		}		
	}
?>
