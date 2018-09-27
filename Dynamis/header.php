<!DOCTYPE html>
<html>
<head>
	
	<title>Dedetizadora Dynamis</title>
	<!-- Favicon da página -->
	<link rel="apple-touch-icon" sizes="57x57" href="icone/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icone/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icone/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icone/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icone/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icone/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icone/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icone/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icone/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icone/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icone/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icone/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icone/favicon-16x16.png">
	<link rel="manifest" href="icone/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icone/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<!-- Todas as meta tag das páginas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Todas as folhas de estilo css das páginas -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Todas os arquivos JavaScript das páginas -->
	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/additional-methods.min.js"></script>

</head>

<body>
	
	<!--Barra de menu do site-->
	<nav class="navbar mudar-menu navbar-expand-lg navbar-dark bg-light" id="nav">
		
		<div class="container">
		
			<a class="navbar-brand mudar-brand" id="brand" href="index.php"><b class="">D</b><b class="">ynamis</b></a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDynamis">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarDynamis">
			
				<ul class="navbar-nav mr-auto" id="link">
					<li class="nav-item">
						<a class="nav-link mudar-link" href="index.php">Início</a>
						<hr style="border: 2px solid white; width: 50px; position: absolute; top: 41px; display: none;" id="index"></hr>	
					</li>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="quem_somos.php">Quem Somos</a>
						<hr style="border: 2px solid white; width: 105px; position: absolute; top: 41px; display: none;" id="quem_somos"></hr>
					</li>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="servicos.php">Serviços</a>
						<hr style="border: 2px solid white; width: 70px; position: absolute; top: 41px; display: none;" id="servicos"></hr>
					</li>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="promocoes.php">Promoções</a>
						<hr style="border: 2px solid white; width: 90px; position: absolute; top: 41px; display: none;" id="promocoes"></hr>
					</li>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="contato.php">Contato</a>
						<hr style="border: 2px solid white; width: 67px; position: absolute; top: 41px; display: none;" id="contato"></hr>
					</li>
					
					
					
					<?php
						if (isset($login)) {
					?>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="usuario.php">Usuário</a>
						<hr style="border: 2px solid white; width: 65px; position: absolute; top: 41px; display: none;" id="usuario"></hr>
					</li>
					<?php
						}
						else{
					?>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="login.php">Agende uma visita</a>
						<hr style="border: 2px solid white; width: 143px; position: absolute; top: 41px; display: none;" id="agende"></hr>
					</li>
					<?php
						}
					?>

				</ul>
				
				<ul class="navbar-nav ml-auto">
					<?php
					if (isset($login)) {
					?>
					<li class="nav-item"><a href="usuario.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAASuSURBVGhD7ZpZyFdFGIe/yooWCi1B224iKMMMEyIsBAlaoJWiRXKBjEJaIKKrumhRW4iCsqK6iCIioohWumghKgLLiIQuMrXCNtvLitbnOTUwHM//nJn5L1/K94MHnf85M+c9Z7b3fecbm9B2rANhIdwDL8En8C38Db/BN/A+PAHXw/GwG/wvNAUuhdWgwblsgYfhBNgBRq59YSX8AMGor+Fx8MXmwwGwByiNnAyHw5lwI7wJf0Co/y6cBSORBl0IX4EP/wuegdNgZ8jVfnA1rIfwQg7Lw2Bo2gc0OjzwaZgFg5AfYTFsAtv+BS6CgetQ2AA+5DM4FVK1O+z47387tRfcCfa0z7oPdoKBaA5sBht+BaZBLzn0ToK7YS38CNYTV7EH4Qjo0unwPVjvKdgF+tIM+BJs8FFoa1ADncDB8F64FF8BLhhtOhLsfev47OKecU58DDb0CLQ1ZK99B7HBXfwKy6Gt3UMgfMhb/CFXDpEwsV+Gtp5wLwlfroQHoE1Hg5PfeXOKP+RoKfiQz6FtTih36bpxuRwHbboEvM/ecT9KkmM3TO6U1elDiI0q4SHo0rPgvS4kSboJrOA+0SU3tNigUlzRunQwOMR+B+dOqxzvLpmOx5n+0KFjoMmwXP6EFM/APcb7u+bV2GXgjSm9oY6F2KB+2Bu6dBDYI/ZM6/1vg42mrg6DehGNmwQpCnPFBalRvq03ONFTHUCdu9igUj6CVJ0H1vGFGqXT5g2PVaU0+RXd2GKjSngRUuWq6pwyhGj84PeCjS6rSulaA3XDcrkBcvQeWG92VarpVfDivKqULr9mbFQJF0COdJms5zDbSp+CF/evSmnyXrs5NqqE1FUy6Dqw3jVVqaYQtuYkBI6C2KBS3oEchW3i1qpUkxfcCHM0FWKDSjGzkqMlYL1VVakm13Iv5uoNiI0qwTRSjgyDrXdXVaopxBOGmzkybg8xQwn2Rm7QdCVYd0VVqsnQ1ItGhbnyi8bGpeLH2xVydTtY//KqVJMrhxdzEgtB+j0hq5hD49BIUHBTTq5KNbkpeTF3cwoyPxUb2YVetkm8XBm9hqFsmnYrmbb04utVKV+6KzkT35WnRIYX1l9XlRq0J/wMpjGn+0OBUveVt6BU14JtmCzvKdMu3uSqUKLwtboofRGH1QdgG+aXe+pE8Cbd6tT4IFZqxKjTVyInt/W1rzV76RuHZXiRP2QqZDu6MAmuV5AjbQtz0Ix/p84Fb9aJdN6kyL3gKjAEjQ1uw0MfI8xUnQ/WM2mY5A/65q+Ble7whxaZ3L4NQvqoBA+JLoa2GNxgKmTqfaFkubt7mtSU3fOB+jqD8LFiwumVR3Lx+PfDhqznc/+Vs2SkaGXdCFcjX0DfJj6lGhYOu7NB+Ux/+wK6sp49dT/YiPMlBF6jxDjFf83gz4VimbwOfs144QZ9DvQtX+ZJaHrIsLEnBnpAarxwMzQ9bFg4J/oaTm06AzxqaHrwIHkeTJAPVa7pOmwhNB4kGyE3NdS3TJe6qrn+NxmVg2csRnvj+icdHkX4RwQvwE/QZGgTHnd7aKMXm3p8PTLpMZvGXAAmzwxlTcWKroxf3VA6Jwk4oW1QY2P/ANttdsxdJ2yfAAAAAElFTkSuQmCC"></a>
					</li>
					<li class="nav-item">
						<a href="usuario.php" class="nav-link mudar-link mr-2 mb-2"><?php echo $nome; ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link mudar-link" href="php/sair.php">Sair</a>
					</li>
					<?php
					}
					else{

					?>
					<li class="nav-item">
						<a class="btn btn-red mr-2 mb-2" href="login.php">Login</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-red" href="cadastro.php">Cadastrar</a>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>

