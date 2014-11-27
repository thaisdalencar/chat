<?php 
class Conexao{
	function __construct(){
		$conexao = @mysql_connect('localhost','admin','gdestetelecom') or die('nao foi possivel conectar');
		mysql_select_db("chat",$conexao);
	}
}
class Model extends conexao{
   function __construct(){
    	parent::__construct();
      include_once '../controller/usuario.php';            
    	include_once '../controller/mensagem.php';            
   }
   function validar_login($email,$senha){
   	$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha= '$senha'";
		$query = mysql_query($sql);
		$usuario = null;
        if(mysql_num_rows($query) == 1){   
            $ins = "UPDATE usuarios SET logado = 1 WHERE email = '$email'";
            $log = mysql_query($ins);
        	while($linha = mysql_fetch_array($query)){
				    $usuario = new usuario($linha[0], $linha[1], $linha[2], $linha[4]);
			     }
        }   
        return $usuario;
   }
   function membros($id_dono){
     $sql = "SELECT * FROM usuarios WHERE id_user != $id_dono";
     $query = mysql_query($sql);
     /*while ($row = mysql_fetch_array($query)) {
          $lista[] =  $row;  
      }
    return $lista;  */
        if(mysql_num_rows($query)>0){
          while($linha = mysql_fetch_array($query)){
              $membros[] = new usuario($linha[0], $linha[1], $linha[2], $linha[4]);
          }
        }
      return $membros;
     }
     function mensagens($id_dono, $id_amigo){
          $sql = "SELECT id, msg, id_from, id_to,nome, data_de_envio
                  FROM msg
                  INNER JOIN usuarios
                  ON id_to = '$id_dono'
                  AND id_from = '$id_amigo'
                  AND id_user = id_from
                  OR id_to = '$id_amigo'
                  AND id_from = '$id_dono'
                  AND id_user = id_from ";
         $query = mysql_query($sql);
         if(mysql_num_rows($query)>0){
          while($linha = mysql_fetch_array($query)){
              $mensagem[] = new mensagem($linha[0], $linha[1], $linha[2], $linha[3], $linha[4], $linha[5]);
          }
        }
        if(isset($mensagem)){
          return $mensagem;
        }
     }
     function gravar_mensagens($msg, $id_from, $id_to, $time_now){
        $sql = "INSERT INTO msg (msg,id_from, id_to, data_de_envio, msg_lida)VALUES ('$msg',$id_from, $id_to, '$time_now', 1);";
        $query = mysql_query($sql);
        return $query;
     }
     function desfazer_login($email){
        $ins = "UPDATE usuarios SET logado = 0 WHERE email = '$email'";
        $log = mysql_query($ins);
     }
     function titulo($id_amigo){
         $sql = "SELECT nome FROM usuarios WHERE id_user = $id_amigo";
          $query = mysql_query($sql);
         while ($row = mysql_fetch_array($query)) {
              $lista[] =  $row;  
          }
        return $lista;  
     }
      function foi_lida($id_dono, $id_from){
        $sql = "UPDATE msg SET msg_lida = 0 WHERE id_from = $id_from and id_to = $id_dono";
        $query = mysql_query($sql);
     }
      function nova_msg($id_dono, $id_amigo){
        $sql = "SELECT id_from, id_to, msg_lida FROM msg WHERE msg_lida = 1 AND id_from = $id_amigo AND id_to = $id_dono";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) >= 1){
            return true;
        }else{
            return false;
        }
     }
}
?>
