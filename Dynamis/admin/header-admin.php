<?php 
	session_start();
	if (isset($_SESSION['admin'])) {
		if ($_SESSION['admin']) {
			$email_adm = $_SESSION['email-adm'];
			$senha_adm = $_SESSION['senha-adm'];

		}
	}
	else{
		session_destroy();
		?>
		<script type='text/javascript'>
			window.setTimeout("location='admin.php';",0000);
		</script>
		<?php
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="apple-touch-icon" sizes="57x57" href="icone-admin/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icone-admin/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icone-admin/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icone-admin/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icone-admin/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icone-admin/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icone-admin/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icone-admin/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icone-admin/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icone-admin/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icone-admin/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icone-admin/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icone-admin/favicon-16x16.png">
	<link rel="manifest" href="icone-admin/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icone-admin/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Todas as meta tag das páginas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Todas as folhas de estilo css das páginas -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="css-admin/style-admin.css">

	<!-- Todas os arquivos JavaScript das páginas -->
	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>

	
	<!--Menu -->
	<input type="checkbox" name="check" id="check">
	<label id="icone" for="check"><div id="botao"></div></label>
	

	<div class="barra">
		<nav>
			<a href="index.php"><div class="opcao"><div id="bem-vindo"> <span>Bem-Vindo</span></div></div></a>

			<a href="mensagens-admin.php"><div class="opcao"><div id="menssagem"> <span>Mensagens</span></div></div></a>
			
			<a href="usuarios-admin.php"><div class="opcao"><div id="usuarios"> <span>Usuários</span></div></div></a>
			
			<a href="orcamentos-admin.php"><div class="opcao"><div id="orcamento"> <span>Orçamentos</span></div></div></a>
			
			<a href="servicos-admin.php"><div class="opcao"><div id="services"> <span>Serviços</span></div></div></a>

			<a href="func-admin.php"><div class="opcao"><div id="func"> <span>Funcionários</span></div></div></a>
			
			<a href="graficos.php"><div class="opcao"><div id="estatisticas"> <span>Gráficos</span></div></div></a>
			
			<a href="editar.php"><div class="opcao"><div id="editar"><span>Editar</span></div></div></a>
			
			<a href="php/sair_adm.php"><div class="opcao"><div id="sair"> <span>Sair</span></div></div></a>
		</nav>
	</div>

	<script src="../js/pace.min.js"></script>