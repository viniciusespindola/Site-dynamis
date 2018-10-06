<!DOCTYPE html>
<html>
<head>
	<title>Alterar senha</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap.css">

	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>
<div class="container_alterar_senha">
	<div class="alterar_senha">
		<div class="container">
			<form class="form" method="POST" action="alterar_senha_codigo.php">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="senha_antiga">Digite sua senha:</label>
						<input class="form-control" id="senha_antiga" type="password" name="senha_antiga">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="nova_senha">Digite sua nova senha:</label>
						<input class="form-control" type="password" name="nova_senha" id="nova_senha">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="nova_senha_confirmacao">Confirme a nova senha:</label>
						<input class="form-control" type="password" name="nova_senha_confirmacao" id="nova_senha_confirmacao">
					</div>
				</div>

				<div class="form-row col-lg-12">
					<div class="form-group col-sm-6">
						<button type="submit" name="enviar" class="form-control btn btn-outline-white" id="inputSobrenome">Enviar</button>
					</div>

					<div class="form-group col-sm-6">
						<button type="reset" name="reset" class="form-control btn btn-outline-white" id="inputSobrenome">Limpar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { echo $_GET['id'];
		}
	}
	?>

	
</body>
</html>