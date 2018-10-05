<!DOCTYPE html>
<html>
<head>
	<title>Funcionario</title>
	<?php header("content-type: text/html;charset=utf-8");
	require_once('../../config/config.inc.php');

	session_start();
	if (isset($_SESSION['funcionario'])) {
		

	}
	else{
		session_destroy();
		?>
		<script type='text/javascript'>
			window.setTimeout("location='../admin.php';",0000);
		</script>
		<?php
	}

	//função para transformar a data para o padrão brasileiro
	function inverteData($data, $separar = '-', $juntar = '-'){
			return implode($juntar, array_reverse(explode($separar, $data)));
		}

	 ?>

	<link rel="apple-touch-icon" sizes="57x57" href="icone-func/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icone-func/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icone-func/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icone-func/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icone-func/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icone-func/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icone-func/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icone-func/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icone-func/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icone-func/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icone-func/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icone-func/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icone-func/favicon-16x16.png">
	<link rel="manifest" href="icone-func/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icone-func/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Todas as meta tag das páginas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Todas as folhas de estilo css das páginas -->
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css-admin/style-admin.css">

	<!-- Todas os arquivos JavaScript das páginas -->
	<script src="../../js/jquery.js"></script>
	<script src="../../js/popper.js"></script>
	<script src="../../js/bootstrap.js"></script>


</head>
<body>
	<div class="navbar navbar-expand-lg">
		<a href="orcamentos-func.php" class="btn">Orçamentos</a>
		<a href="servicos-func.php" class="btn">Serviços</a>
		<a href="../php/sair_adm.php" class="btn">Sair</a>
	</div>

	<div class="container">
	
