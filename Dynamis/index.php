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
			document.getElementById('index').style.display = "block";
	</script>

<div class="container">
	<video class="w-100 h-100 video mb-3" loop autoplay="autoplay"  muted="true" >
		<source src="videos/VID-20180827-WA0000.mp4" type="video/mp4">
		<object data=""  class=" w-100 h-100"  >
			<embed  src="videos/VID-20180827-WA0000.mp4">
		</object>
	</video>
</div>

<div class="modal fade" id="video" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- Slide de imagens do site -->
			<div class=" logo-video" data-toggle="modal" data-target="#video">
				<img src="img/Logo Dynamis PNG8.png" id="imagemSlide" class="d-block w-100">
			</div>
		</div>
	</div>
</div>


<!-- Rodapé do site -->
<?php
	include_once ('footer.php');
?>