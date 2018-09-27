<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<!-- Todas as meta tag das páginas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Todas as folhas de estilo css das páginas -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style type="text/css">
		body, html{
			margin: 0;
			padding: 0;
		}
		.btn-white{
			color: white;
			background-color: #f00;
		  	background-image: none;
		  	border-color: transparent;
		}
		.btn-white:hover{
			color: red;
			background-color: transparent;
			border-color: #f00;
		}
	</style>

	<!-- Todas os arquivos JavaScript das páginas -->
	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<div class="row" style="display: flex; justify-content: center; align-items: center;">
			<div class="col-sm-10 col-md-9 col-lg-7 col-xs-12" style="width: 600px; 
			position: absolute; top: calc(50% - 200px);">
				<div class="jumbotron">
					<div class="form-group">
						<h1 class="text-center display-4">
							Administrador
						</h1>
						<br>
					</div>

					<form class="form" method="POST" action="php/logar-admin.php">
						<label for="usuario">Usuário:</label>
						<div class="form-group input-group">
							<input type="email" id="usuario" class="form-control" name="email-adm" placeholder="Digite seu email">
						</div>
						
						<label for="senha">Senha:</label>
						<div class="form-group input-group">
							<input type="password" id="senha" class="form-control" name="senha-adm" placeholder="Digite sua senha">
						</div>

						<div class="form-group input-group">
							<button class="btn btn-white col-lg-6 form-control">Login</button>
							<button class="btn btn-white col-lg-6 form-control">Limpar</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</body>
</html>