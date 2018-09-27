<?php 
session_start();
if (isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
	$codigo = $_SESSION['codigo'];
	$nome = $_SESSION['nome'];
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];
}
?>
<!-- Cabeçalho do site -->
<?php
	include_once('header.php');
?>

	<script type="text/javascript">
			document.getElementById('promocoes').style.display = "block";
	</script>

<div class="container">
	<div class="row">
		<div class="col-12 text-center my-5">
			<h1 class="corTitulo" id="promocoes"><b>Promoções</b></h1>
		</div>
		<img src="img/promocoes/dia_do_condominio.jpg" class="col-12">
	</div>
</div>

<!-- Rodapé do site -->
<?php
	include_once ('footer.php');
?>