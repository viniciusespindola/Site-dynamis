<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	
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

	
<!-- Título da página -->
<h1 class="text-center my-5 text-muted display-3 font">Serviços Marcados</h1>

		

<div class="container">
	<script type="text/javascript" src="../js/jquery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#menu a").click(function( e ){
				e.preventDefault();
				var href = $( this ).attr('href');
				$("#orcamentos").load( href +"#orcamentos");
			});
		});
	</script>

	<!-- Menu dos orçamentos -->
	<div id="menu">
		<div class="navbar nav navbar-expand-lg navbar-light bg-light col-8 mb-4">
			<div class="container">

				<ul class="navbar-nav mr-auto" id="link">
					<li class="nav-item">
						<label><a class="btn btn-white mr-2 mb-2" href="orcamentos-admin.php">Todos os pedidos de orçamentos</a></label>
					</li>
					<li class="nav-item">
						<label><a class="btn btn-white mr-2 mb-2" href="orcamentos-1-admin.php">Orçamentos não realizados</a></label>
					</li>
					<li class="nav-item">
						<label><a class="btn btn-white mr-2 mb-2" href="orcamentos-2-admin.php">Orçamentos já realizados</a></label>
					</li>
				</ul>

			</div>	
		</div>
	</div>
<!-- Orçamentos não realizados -->
	<div id="orcamentos">
		<p>Tudo Bem?</p>
		
	</div>
