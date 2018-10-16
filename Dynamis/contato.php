<?php 
session_start();
if (isset($_SESSION['login'])) {
	if ($_SESSION['login']) {
		$login = $_SESSION['login'];
		$codigo = $_SESSION['codigo'];
		$nome = $_SESSION['nome'];
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];
	}
}
?>
<!-- Cabeçalho do site -->
<?php
	include_once('header.php');
?>

	<script type="text/javascript">
			document.getElementById('contato').style.display = "block";
	</script>

<div class="container">
	<div class="row">
		
		<div class="col-lg-6 col-xs-12 p-1">

			<!--Formulario de contato-->
			<div class="container-fluid my-5">
					<div class="container">
					
					<div class="row">
						<div class="col-12">
							<h1 class="text-center corTitulo mb-5" id="contato"><b>Mensagem</b></h1>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-sm-12 col-md-10 col-lg-8">
							<form name="form" method="POST" action="php/mensagem.php">
								<div class="form-row">			
									<div class="form-group col-sm-6">
										<label for="inputNome">Seu nome completo:<b class="d">*</b></label>
										<input type="text" name="nome" class="form-control" id="inputNome" required>
									</div>
									<div class="form-group col-sm-6">
										<label for="inputEmail">Seu E-mail:<b class="d">*</b></label>
										<input type="email" name="email" class="form-control" id="inputEmail" required>
									</div>
									<div class="form-group col-sm-12">
										<label for="inputAssunto">Assunto:<b class="d">*</b></label>
										<input type="text" name="assunto" class="form-control" id="inputAssunto">
									</div>
									<div class="form-group col-sm-12">
										<label for="inputMensagem">Sua mensagem:<b class="d">*</b></label>
										<textarea type="text" name="mensagem" class="form-control" id="inputMensagem"></textarea>
									</div>

									<div class="form-row col-lg-12 my-3">
										<div class="form-group col-sm-6">
											<button type="submit" name="enviar" class="form-control btn btn-outline-white" id="inputSobrenome">Enviar</button>
										</div>

										<div class="form-group col-sm-6">
											<button type="reset" name="reset" class="form-control btn btn-outline-white" id="inputSobrenome">Limpar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		
		<div class="col-lg-6 col-xs-12 my-5 a">
			
			<!--Localização-->	
			<div class="col-12 text-center">
					<h1 class="corTitulo" id="localizacao"><b>Localização</b></h1>
			</div>
			<div class="row">
				<div class="col-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.193744906971!2d-46.48378068546916!3d-24.024232084732052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1f014114e293%3A0x58101a2fcc36bf3d!2sDynamis+Dedetizadora!5e0!3m2!1spt-BR!2sbr!4v1533354058021" frameborder="0" style="border:0; position: relative;" class=" my-5" allowfullscreen></iframe>

					<p class="text-center text-muted">R. Antônio Borne de Lima, 30.047 - Cidade Ocian Praia Grande - São Paulo</p>
				</div>
			</div>
		
		</div>

	</div>
	
	<div class="mensagens">
		<?php 
		require_once('config/config.inc.php');
		function inverteData($data, $separar = '-', $juntar = '-'){
		return implode($juntar, array_reverse(explode($separar, $data)));
	} 
		$ler = new Ler;
				$ler->Query("*", "tb_msg","where ds_display = 1 order by cd_msg desc");
				$ler->getResultados(); 
			?>
				<table class="table my-4" id="tabela_mensagem_admin">
					<thead class="bg-red">	
						<th>Nome</th>
						<th>Assunto</th>
						<th>Mensagem</th>
						<th>Data</th>
					</thead>
					
					<tbody>
					<?php
					
					$numero_agendamento = 0;
					while (isset($ler->getResultados()[$numero_agendamento])) {
							$cd_msg = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_msg']);
							$nome_msg = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_msg']);
							$email_msg = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_email']);
							$assunto = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['nm_assunto']);
							$messagem = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['ds_msg']);
							$data = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['dt_msg']);
						?>

						<tr>
							
							<?php echo "<td>".$nome_msg[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$assunto[$numero_agendamento]."</td>";	?>
							<?php echo "<td>".$messagem[$numero_agendamento]."</td>";	?>
							<?php echo "<td>".inverteData($data[$numero_agendamento],'-','/')."</td>";	?>
						</tr>


						<?php
							$numero_agendamento++;
					}
					?>
					</tbody>
				</table>
	</div>
</div>


<!-- Rodapé do site -->
<?php
	include_once ('footer.php');
?>