<?php 
session_start();
$logado = $_SESSION['logado'];
include_once '../controller/app.php';
$session = new app();
$session->sessionIniciada($logado);
?>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style/css/estilo_chat.css">
	<script src="../style/js/jquery-1.9.1.js"></script>
	<script src="../style/js/bootstrap.js"></script>
	<script src="../style/js/dimanico_chat.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<div id="sair" ><a href="../controller/chamar_sair.php">SAIR</a></div>
	<div id="topo">
		<p id="nome_logado" class="text-center text-capitalize"><?php echo($_SESSION['nome']); ?></p>			
	</div>
	
	<div id="barra">	</div>
	<div id="divFora">  </div>	

<div id="aqui"></div>
</body>
</html>