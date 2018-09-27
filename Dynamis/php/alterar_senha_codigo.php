
<!DOCTYPE html>
<html>
<head>
	<title>Dedetizadora Dynamis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	

	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/dynamis.js"></script>
</head>
<body>
	<div class="modal fade" id="atualizou" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title d">Atualização de senha</h6>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				
				<div class="modal-body">
					<h4 class="text-muted">Sua senha foi atualizada com sucesso!</h4>
				</div>
				<div class="modal-footer">
					<a href="../usuario.php"><button class="btn btn-outline-white">Voltar a página Usuario</button></a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="nao-atualizou" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title d">Senha Errada</h4>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				
				<div class="modal-body">
					<h5 class="">A senha digitada não corresponde a senha cadastrada para essa conta!</h5>
					<h5 class="">Por favor digite a senha cadastrada para esta conta para poder modificar sua senha!</h5>
					<br>
					<br>
					<p class="text-muted">Você será redirecionado a página do usuario em 5 segundos.</p>
				</div>
				<div class="modal-footer">
					<a href="../usuario.php"><button class="btn btn-outline-white">Voltar a página Usuario</button></a>
				</div>
			</div>
		</div>
	</div>
	<?php 
		require_once('../config/config.inc.php');
		$senha_antiga = md5($_POST['senha_antiga']);
		$nova_senha = md5($_POST['nova_senha']);
		session_start();
		$codigo = $_SESSION['codigo'];
			$ler = new ler;
			$ler->Query("*", "tb_usuario","where nm_senha = '$senha_antiga' and cd_usuario = '$codigo'");
			$ler->getResultados();
		
			if ($ler->getResultados()) {
				$dados = "nm_senha = '$nova_senha'";
				$codigo = $_SESSION['codigo']; 
				$termos = "WHERE cd_usuario = $codigo";
				$atualizar = new atualizar;
				$atualizar->Query("tb_usuario", $dados, $termos);
			?>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#atualizou').modal('show');
					})
				</script>
			<?php
			}
			else{
			?>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#nao-atualizou').modal('show');
					})
				</script>
			<?php
			}
		?>
	<script type='text/javascript'>
		window.setTimeout("location='../usuario.php';",5000);
	</script>
</body>
</html>
