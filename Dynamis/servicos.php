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
			document.getElementById('servicos').style.display = "block";
	</script>

<div class="container">
	<!--Serviços oferecidos-->
	<div class="row my-5">
		
		<div class="col-12 text-center mb-3">
			<h1 class="corTitulo" id="servicos"><b>Serviços</b></h1>
		</div>

		<div class="col-sm-4">
			<div class="card">
				<img src="img/dedetizacao.png" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title text-center corTituloServico">Dedetização</h4>
				
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card">
				<img src="img/caminhao1.jpg" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title text-center corTituloServico">Desratização</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card">
				<img src="img/caminhao1.jpg" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title text-center corTituloServico">Descupinização</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card my-3">
				<img src="img/desentupimento.png" class="card-img-top">
				<div class="card-body mb-4">
					<h4 class="card-title text-center corTituloServico">Desentupimento</h4>
				
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card my-3 mb-4">
				<img src="img/desinfeccao_de_caixa.png" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title text-center corTituloServico">Desinfecção de caixas-d' água</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card my-3">
				<img src="img/impermeabilizacao_de_caixas.png" class="card-img-top">
				<div class="card-body mb-4">
					<h4 class="card-title text-center corTituloServico">Impermeabilização de caixas</h4>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Rodapé do site -->
<?php
	include_once ('footer.php');
?>