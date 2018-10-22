<?php
	include_once 'header-admin.php';
	require_once('../config/config.inc.php');
?>

	<h1 class="text-center my-5 text-muted display-3 font">Detalhes do Funcionário</h1>
<div class="container">
<?php
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { 		 
				$confirme_codigo = $_GET['id'];
		}
	}
		$ler = new ler;
			$ler->Query("*","tb_funcionario f","where cd_func = $confirme_codigo limit 1");
			$ler->getResultados();

			$codigo = $ler->getResultados()[0]['cd_func'];
			$nome = $ler->getResultados()[0]['nm_func'];
			$email = $ler->getResultados()[0]['nm_email'];
			$esp = $ler->getResultados()[0]['nm_especialidade'];
			
			if ($ler->getResultados()){ ?>
				<table class="table table-hover mb-5" id="funcionarios">
					<thead>
						<th>#</th>
						<th>Nome <label onclick="mostrar('nome-func')"><img class="editar" src="../img/Sem Título-1.png"></label></th>
						<th>E-mail <label onclick="mostrar('email-func')"><img class="editar" src="../img/Sem Título-1.png"></label></th>
						<th>Especialidade <label onclick="mostrar('especialidade')"><img class="editar" src="../img/Sem Título-1.png"></label></th>
						<th>Deletar</th>
					</thead>
					
					<tbody>
					<?php						
							$cd_func = $ler->getResultados()[0]['cd_func'];
							$nome = $ler->getResultados()[0]['nm_func'];
							$email = $ler->getResultados()[0]['nm_email'];
							$esp = $ler->getResultados()[0]['nm_especialidade'];
						?>

						<tr>
							
							<?php echo "<td>".$cd_func."</td>"; ?>
							<td>
								<?php echo "".$nome.""; ?>
								<div id="nome-func" class="my-2" >
									<input type="text" name="valor" class="form-control"><?php echo "<a href='php/alterar_nm_func.php?id=".$cd_func."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
								</div>
							</td>
							<td>
								<?php echo "".$email.""; ?>
								<div id="email-func" class="my-2" >
									<input type="text" name="valor" class="form-control"><?php echo "<a href='php/alterar_mail_func.php?id=".$cd_func."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
								</div>
							</td>
							<td>
								<?php echo "".$esp.""; ?>
								<div id="especialidade" class="my-2" >
									<input type="text" name="valor" class="form-control"><?php echo "<a href='php/alterar_esp.php?id=".$cd_func."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
								</div>
							</td>
							<td><a href="php/deletar-func.php"><img style="position: relative;left: 10px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAhCAYAAABX5MJvAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAKISURBVFhH7ZfJThVBFIabBGEFQiCSgDER4UkYdA8JbNGFwsohMizgMQjDiiEC8RFk1I0aFeKT+Aj+X3edpGiq696+fXNJCH/ypbpOdZ8699R4k3s1SQ/EI1e2TM/EB3EmrsSl+CL+uDp22nmv6RoRn8WpeC0GhanNlQg77QRzKPiusuhgRfwUY67eJ0j/R4FWXUkdO+28NyG+i0XRsDrEvlgXOO8V3WJGxDQrukSP4LsNsSvwV0r8EgJ4l9aSpFO8yh7rFu/zHSJLBFJKS4IMIIbDH/cy4rvl7DHNSN1DMyoYS9IHjQbgy3wxt+paOawCJiFzIDQEDx0hFbXNCexMVlZNVMPiJHtMJ2FeOPrqyHcWa0Pm71zQT6HYaFjn/WIKgyfrhNkPfmf5tm/O5gt/+J0XNuGDYpNhwwltw35HyAJ54sq8PR8Ewi/+LdtB/XUlqyOkUCD/XIliASDza/3cEFH+zh6jygcy5MpaAfj6JULZTk/DY8GSLMqEiSEgA4/TWlZSxx4TfvFPP/R3Q63MBP0EM4FufU4gWx3tae26QgFQL7M68EvmuIMU6r14I6ruE6EgbJ9YEG8xFImdjGwweUK/xDoLdRJrQ9jweyGeYojpSIwLzo6XGHLCWagTVNTGGcT94rn4hKGWOOV+CDv5qopf75+i0XPDF+c+5z/iPoCjRsR3tiK2BWdTKe0JbkSIGxLHcRkxlHaz4ofsZI/lRPq4km0KNhbGlLvjtIiJdrtj4mNLEECloSUbzJFJQXoHBEHZVW3NldSx0857LwRzgGXfFPH/4UCwfLkP2FaN/PmCnX2AiwuroO5JWEY45UJCMP4/MEr7B8ZGVHMfaKZIf8v/i95VJcl/J0F7QMNF2U4AAAAASUVORK5CYII="></a></td>
							
						</tr>


					<?php
							
						}

						else{
						 ?>
							<p class="text-muted col-8">Nenhum funcionário cadastrado.</p>
						<?php } ?>

					</tbody>
				</table>
		
		<a href="javascript:history.back()"><p class="d text-right">Voltar</p></a>
	</div>
</div>
	<script type="text/javascript">
		function mostrar(id) {
			if (document.getElementById(id).style.display == "block") {
				document.getElementById(id).style.display = "none";
			}
			else{
				document.getElementById(id).style.display = "block";
			}
		}
	</script>