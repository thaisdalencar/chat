<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style/css/estilo_login.css">
	<script src="../style/js/jquery-1.9.1.js"></script>
	<script src="../style/js/bootstrap.js"></script>
	<meta charset="utf-8">
</head>
<body>
<div id="formulario">	
	<div id="#msgErro">
		<?php 
			if(isset($_GET['erro'])){
				echo "Falha ao logar.";
			}
		?>
	</div>
	<form class="form-horizontal" role="form"  method="post" action="../controller/chamar_logar.php">
	    <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="senha">
				</div>
			</div>
				<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Entrar</button>
				</div>
			</div>	
	</form>
</div>
</body>
</html>

			