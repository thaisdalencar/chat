<?php 
class mensagem{
	public $id;
	public $msg;
	public $id_from;
	public $id_to;
	public $remetente;
	public $data;
	function __construct($id, $msg, $id_from, $id_to, $remetente, $data){
		$this->id = $id;
		$this->msg = $msg;
		$this->id_from = $id_from;
		$this->id_to = $id_to;
		$this->remetente = $remetente;
		$this->data = $data;
	}
	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id = $id;
	}
	function getMsg(){
		return $this->msg;
	}
	function setMsg($msg){
		$this->msg = $msg;
	}
	function getId_from(){
		return $this->id_from;
	}
	function setId_from($id_from){
		$this->id_from = $id_from;
	}
	function getId_to(){
		return $this->id_to;
	}
	function setId_to($id_to){
		$this->id_to = $id_to;
	}
	function getRemetente(){
		return $this->remetente;
	}
	function setRemetente($remetente){
		$this->remetente = $remetente;
	}
	function getData(){
		return $this->data;
	}
	function setData($data){
		$this->data = $data;
	}
}
?>