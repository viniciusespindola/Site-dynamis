<?php 
header("content-type: text/html;charset=utf-8");
require_once('config/config.inc.php');
session_start();
if (isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
	$codigo = $_SESSION['codigo']; 
	$nome = $_SESSION['nome'];
	$cpf = $_SESSION['cpf'];
	$cnpj = $_SESSION['cnpj'];
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];
	if (isset($_SESSION['ddd'])) {
		$ddd = $_SESSION['ddd'];
	}
	else{
		$ddd = null;
	}
	$telefone = $_SESSION['telefone'];
	if (isset($_SESSION['ddd_alternativo'])) {
		$ddd_alternativo = $_SESSION['ddd_alternativo'];
	}
	else{
		$ddd_alternativo = null;
	}
	$telefone_alternativo = $_SESSION['telefone_alternativo'];
	$endereco = $_SESSION['endereco'];
	$numero = $_SESSION['numero'];
	$complemento = $_SESSION['complemento'];
	$cep = $_SESSION['cep'];


	$ler = new ler;

	function inverteData($data, $separar = '-', $juntar = '-'){
		return implode($juntar, array_reverse(explode($separar, $data)));
	}
}
else{
	session_destroy();
	?>
	<script type='text/javascript'>
		window.setTimeout("location='login.php';",0000);
	</script>
	<?php
}
?>

<!-- Cabeçalho do site -->
<?php
	include_once ('header.php');
?>
	
	<script type="text/javascript">
			document.getElementById('usuario').style.display = "block";
	</script>

<!-- Script que mostra e oculta o conteudo do orçamento e do agendamento-->
<script type="text/javascript">
	$(document).ready(function() {
		$(".mostrar_info_serv").hide();
		$("#botao_mostrar_orca").click(function() {
			$(this).toggleClass("active").next().slideToggle("slow");
			if ($(this).text()=="Mostrar") {
				$(this).text("Ocultar");
			}
			else{
				$(this).text("Mostrar");
			}
			return false;
		});
		$("#botao_mostrar_serv").click(function() {
			$(this).toggleClass("active").next().slideToggle("slow");
			if ($(this).text()=="Ocultar") {
				$(this).text("Mostrar");
			}
			else{
				$(this).text("Ocultar");
			}
			return false;
		});
	});
</script>

<div class="container bg-light py-2 px-5 ult-servicos">
	<h5 class="text-muted my-3">Últimos orçamentos realizados </h5>

	<div class="container">
			<div id="botao_mostrar_orca" class="mostrar">
				Ocultar
			</div>
		
		<div class="mostrar_info_orca mb-5">
			<div class="row">
				<?php
				$ler->Query("cd_orca,nm_segmento, nm_tipo_servico, ds_observacoes,ds_frequencia,vl_orca, cd_confirmacao","tb_orcamento o","inner join tb_agendamento a on o.cd_agendamento = a.cd_agendamento inner join tb_usuario as u on a.cd_usuario = u.cd_usuario where u.cd_usuario = $codigo group by cd_orca desc");
				$ler->getResultados();
				if ($ler->getResultados()){ ?>
					<table class="table table-striped col-12">
						<thead>
							<th>Segmento</th>
							<th>Tipo</th>
							<th>Descrição</th>
							<th>Frequência</th>
							<th>Valor</th>
							<th>Confirmar serviço</th>	
						</thead>
						<tbody>
						<?php
						$numero_agendamento = 0;
						while (isset($ler->getResultados()[$numero_agendamento])) {
								$codigo_orcamento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_orca']);
								$nome_segmento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_segmento']);
								$tipo_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_tipo_servico']);
								$desc_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_observacoes']);
								$frequencia = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_frequencia']);
								$valor_orca = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['vl_orca']);
								$confirmacao = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_confirmacao']);
							?>

						<tr>
							<?php echo "<td class='tamanho-coluna'>".$nome_segmento[$numero_agendamento]."</td>"; ?>
							<?php echo "<td class='tamanho-coluna'>".$tipo_servico[$numero_agendamento]."</td>";	?>
							<?php echo "<td class='tamanho-coluna'><div class='desc_servico'>".$desc_servico[$numero_agendamento]."</div></td>";	?>
							<?php echo "<td class='tamanho-coluna'><div class='desc_servico'>".$frequencia[$numero_agendamento]."</div></td>";	?>
							<?php if ($valor_orca[$numero_agendamento] != 0){
								echo "<td class='tamanho-coluna'>R$".$valor_orca[$numero_agendamento]."</td>";	
							}
							else{
								echo "<td class='tamanho-coluna'>"."<p class='text-muted'>Orçamento sendo realizado</p>"."</td>";
							} 

								if ($confirmacao[$numero_agendamento] == 1){
									echo "<td class='tamanho-coluna'>"."<p class='text-muted confirmado'>Confirmado</p>"."</td>";
								}	
								else{
								?>
							
								<td class='tamanho-coluna'>
									<?php
									echo "<a href='php/confirme.php?id=".$codigo_orcamento[$numero_agendamento]."'><button class='btn btn-outline-white'>Confirmar</button></a>"		
									?>	
								</td>		
								<?php
							
								}

								$numero_agendamento++;
						?>

						</tr>
						<?php
							}
						?>
					
						</tbody>
					</table>

				<?php }
				else{
				 ?>
					<p class="text-muted col-8">.</p>
					<a href="#orçamento" class="col-4 text-muted">Realize seu primeiro orçamento <b class="d">agora</b>.</a>
				<?php } ?>
			</div>
		</div>
	</div>

	<h5 class="text-muted my-3">Últimos serviços agendados</h5>
	<div class="container">
		<div id="botao_mostrar_serv" class="mostrar">
			Mostrar
		</div>
		<div class="mostrar_info_serv">
			<div class="row">
				<?php 
				$ler->Query("nm_segmento, hr_servico_marcado, dt_servico_marcado, nm_tipo_servico, ds_observacoes", "tb_agendamento a","inner join tb_servico s on a.cd_agendamento = s.cd_agendamento where cd_usuario = '$codigo' order by dt_servico desc");
				$ler->getResultados();
				if ($ler->getResultados()){ ?>
					<table class="table table-striped">
						<thead>
							<th>Segmento</th>
							<th>Data</th>
							<th>Hora</th>
							<th>Tipo</th>
							<th>Descrição</th>
						</thead>
						
						<tbody>
						<?php
						$numero_agendamento = 0;
							while (isset($ler->getResultados()[$numero_agendamento])) {
								$nome_segmento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_segmento']);
								$hora_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['hr_servico_marcado']);
								$data_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['dt_servico_marcado']);
								$tipo_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_tipo_servico']);
								$desc_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_observacoes']);	
							?>

						<tr>
							<?php if($hora_servico[$numero_agendamento] > 0){ ?>
							<?php echo "<td>".$nome_segmento[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".inverteData($data_servico[$numero_agendamento],'-','/')."</td>";	?>
							<?php echo "<td>".$hora_servico[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$tipo_servico[$numero_agendamento]."</td>";	?>
							<?php echo "<td><div class='desc_servico'>".$desc_servico[$numero_agendamento]."</div></td>";	}?>
						</tr>


							<?php
								$numero_agendamento++;
							}
						?>
						</tbody>
					</table>

				<?php }
				else{
				 ?>
					<p class="text-muted col-8">Você ainda não realizou nenhum serviço conosco.</p>
					<a href="#orçamento" class="col-4 text-muted">Realize seu primeiro orçamento <b class="d">agora</b>.</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="container my-5">
<div class="tabela-contorno">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
			<div class="tabela col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2 class=" my-5 text-center" id="orçamento">Faça um Orçamento</h2>
				<form name="form" method="POST" action="php/orcamento.php">
					<div class="form-row">
						<div class="form-group col-sm-12 my-5">
								<label for="segmento">Selecione o Segmento *</label>
								<select required name="segmento" id="segmento" class="form-control" ><br />
									<option value="">Escolha um segmento</option><br />
									<option value="Residencias">Residencias</option><br />
									<option value="Industrias">Indústrias</option><br />
									<option value="Empresas">Empresas</option><br />
								</select>
							</div>

							<div class="form-group col-sm-9">
								<label for="frequencia">Qual a frequencia que este serviço deve ser realizado *</label>		
								<select name="frequencia" id="frequencia" class="form-control" ><br />
									<option value="Apenas uma vez">Apenas uma vez</option>
									<option value="Semanalmente">Semanalmente</option>
									<option value="Quinzenalmente">A cada 15 dias</option>
									<option value="Mensal">Mensalmente</option>
									<option value="Anual">Anualmente</option>
								</select>
							</div>

							<div class="form-group col-sm-12">
								<label for="descProblema">Descrição do Problema *</label>
								<textarea name="descProblema" class="form-control" id="descProblema" required></textarea>
							</div>

							<div class="form-group col-sm-12 my-4">
								<label for="dadoServ">Selecione o tipo de Serviço *</label>
							</div>

							<div class="form-group col-sm-4">
								<input type="radio" name="dadosServ" id="dedetizacao" value="Dedetização" class="">
								<label for="dedetizacao">Dedetização</label>
							</div>


							<div class="form-group col-sm-4">
								<input type="radio" name="dadosServ" id="desratizacao" value="Desratizacao" class="">
								<label for="desratizacao">Desratização</label>
							</div>


							<div class="form-group col-sm-4">
								<input type="radio" name="dadosServ" id="descupinizacao" value="Descupinização" class="">
								<label for="descupinizacao">Descupinização</label>
							</div>


							<div class="form-group col-sm-4">
								<input type="radio" name="dadosServ" id="desentupimento" value="Desentupimento" class="">
								<label for="desentupimento">Desentupimento</label>
							</div>


							<div class="form-group col-sm-6">
								<input type="radio" name="dadosServ" id="desinfeccao" value="Desinfeccao" class="" onclick="mostrar('info-desinfec-caixa')">
								<label for="desinfeccao">Desinfecção de caixas-d’água</label>
								<div class="display" id="info-desinfec-caixa">
									<h5>Informações da caixa</h5>
									Tamanho frontal:<label> <input type="number" name="tamanho-f" class=""> <select name="tamnho-f-un" id="tamanho-f-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
									</select><br>	

									Tamanho lateral: <input type="number" name="tamanho-l" class=""> <select name="tamnho-l-un" id="tamanho-l-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
									</select><br>

									Altura: <br><input type="number" name="tamanho-a" class=""> <select name="tamnho-a-un" id="tamanho-a-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
								</select> 									
								</div>
							</div>

							<div class="form-group col-sm-6">
								<input type="radio" name="dadosServ" id="impermeabilizacao" value="Impermeabilização" class="" onclick="mostrar('info-caixa-imper')">
								<label for="impermeabilizacao">Impermeabilização de caixas</label>
								<div class="display" id="info-caixa-imper">
									<h5>Informações da caixa</h5>
									Tamanho frontal:<label> <input type="number" name="tamanho-f1" class=""> <select name="tamnho-f-un1" id="tamanho-f-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
									</select><br>	

									Tamanho lateral: <input type="number" name="tamanho-l1" class=""> <select name="tamnho-l-un1" id="tamanho-l-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
									</select><br>

									Altura: <br><input type="number" name="tamanho-a1" class=""> <select name="tamnho-a-un1" id="tamanho-a-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
								</select> 									
								</div>
							</div>

							<div class="form-group col-sm-8">
								<input type="radio" name="dadosServ" id="succao" value="Sucção" class="" onclick="mostrar('info-caixa-succao')">
								<label for="succao">Sucção de caixa de gordura, fossa e dreno</label>
								<div class="display" id="info-caixa-succao">
									<h5>Informações da caixa ou fossa</h5>
									Tamanho frontal:<br> <input type="number" name="tamanho-f" class=""> <select name="tamnho-f-un" id="tamanho-f-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
									</select><br>	

									Tamanho lateral: <br><input type="number" name="tamanho-l" class=""> <select name="tamnho-l-un" id="tamanho-l-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
									</select><br>

									Altura: <br><input type="number" name="tamanho-a" class=""> <select name="tamnho-a-un" id="tamanho-a-un" class="" ><br />
									<option value="M">M</option><br />
									<option value="CM">CM</option><br />
									<option value="POL">POL</option><br />
									<option value="PÉS">PÉS</option><br />
								</select> 									
								</div>
							</div>

							<div class="form-group col-sm-8">
								<br>
								<i>* Orçamento será realizado em até dois dias</i>
								<br><br>
								<i>* Obrigatório</i>
							</div>

							<div class="form-row col-lg-12 my-5">
								<div class="form-group col-sm-6">
									<button type="submit" name="enviar" class="form-control btn btn-red" id="botaoEnviar">Enviar</button>
								</div>

								<div class="form-group col-sm-6">
									<button type="reset" name="reset" class="form-control btn btn-red" id="botaoLimpar">Limpar</button>
								</div>
							</div>
					</div>
				</form>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
			<h2 class="d mt-5 text-center">Meus Dados</h2>

			<table class="table table-striped my-5">
				<form action="php/alterar.php" method="POST">
					<tr>
						<th class="text-center col-2">Nome <label onclick="mostrar('nome')"><img class="editar" src="img/Sem Título-1.png"></label></th>
						
						<td class="text-center col-10"><?php echo $nome; ?>
							<div id="nome" class="my-2">
								<input type="text" name="nome" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
					</tr>

					<tr>
						<th class="text-center col-2">CPF <label onclick="mostrar('cpf')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<?php
							if ($cpf > 0) {
						?>
						<td class="text-center col-10"><?php echo $cpf; ?>
							<div id="cpf" class="my-2">
								<input type="text" name="cpf" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
						<?php
							}
							else {
								echo "<td class='text-muted col-10'><i class='ml-4'>Nenhum Valor Encontrado</i>
									<div id='cpf' class='my-2'>
										<input type='text' name='cpf' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
									</div>
								</td>";
							}
						?>
					</tr>

					<tr>
						<th class="text-center">CNPJ <label onclick="mostrar('cnpj')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<?php
							if ($cnpj > 0) {
						?>
						<td class="text-center"><?php echo $cnpj; ?>
							<div id="cnpj" class="my-2">
								<input type="text" name="cnpj" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
						<?php 
							}
							else {
								echo 
								"<td class='text-muted'><i class='ml-4'>Nenhum Valor Encontrado</i>
									<div id='cnpj' class='my-2'>
										<input type='text' name='cnpj' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
									</div>		

								</td>";
							}
						?>
					</tr>

					<tr>
						<th class="text-center">E-mail <label onclick="mostrar('email')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<td class="text-center"><?php echo $email; ?>
							<div id="email" class="my-2">
								<input type="text" name="email" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
					</tr>

					<tr>
						<th class="text-center">Telefone <label onclick="mostrar('telefone')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<td class="text-center"><?php echo $ddd.$telefone; ?>
							<div id="telefone" class="my-2">
								<input type="text" name="telefone" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
					</tr>

					<tr>
						<th class="text-center">Telefone Alternativo <label onclick="mostrar('TAlternativo')"><img class="editar" src="img/Sem Título-1.png"></label></th>
							
						<?php
							if ($telefone_alternativo !== "") {
						?>
						<td class="text-center"><?php echo $ddd_alternativo.$telefone_alternativo; ?>
							<div id="TAlternativo" class="my-2">
								<input type="text" name="TAlternativo" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
						<?php 
							}
							else {
								echo 
								"<td class='text-muted'><i class='ml-4'>Nenhum Valor Encontrado</i>
									<div id='TAlternativo' class='my-2'>
										<input type='text' name='TAlternativo' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
									</div>
								</td>";
							}
						?>
					</tr>

					<tr>
						<th class="text-center">Endereço <label onclick="mostrar('endereco')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<td class="text-center"><?php echo $endereco; ?>
							<div id='endereco' class='my-2'>
								<input type='text' name='endereco' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
							</div>	
						</td>
					</tr>

					<tr>
						<th class="text-center">Número <label onclick="mostrar('numero')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<td class="text-center"><?php echo $numero; ?>
							<div id='numero' class='my-2'>
								<input type='text' name='numero' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
							</div>	
						</td>
					</tr>

					<tr>
						<th class="text-center">Complemento <label onclick="mostrar('complemento')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<?php
							if ($complemento != "") {	
						?>
						<td class="text-center"><?php echo $complemento; ?>
							<div id='complemento' class='my-2'>
								<input type='text' name='complemento' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
							</div>	
						</td>
						<?php
							}
							else {
								echo 
								"<td class='text-muted'><i class='ml-4'>Nenhum Valor Encontrado</i>
									<div id='complemento' class='my-2'>
										<input type='text' name='complemento' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
									</div>	
								</td>";
							}
						?>
					</tr>

					<tr>
						<th class="text-center">C.E.P <label onclick="mostrar('cep')"><img class="editar" src="img/Sem Título-1.png"></label></th>

						<td class="text-center"><?php echo $cep; ?>
							<div id='cep' class='my-2'>
								<input type='text' name='cep' class='form-control'><button type='submit' name='enviar' class='btn btn-outline-white w-100'>Alterar</button>
							</div>	
						</td>
					</tr>
					
					<tr>
						<td><img src="img/Sem Título-1.png"> Editar informações</td>
						<td colspan="4" class="text-right"><a href="#" class="d" data-toggle="modal" data-target="#dados">Mudar senha</a></td>
					</tr>
				</form>
			</table>
		</div>
		</div>
	</div>
</div>

<div class="modal fade" id="dados" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title d">Alterar senha:</h6>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form class="form" method="POST" action="php/alterar_senha_codigo.php">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="senha_antiga">Digite sua senha:</label>
						<input class="form-control" id="senha_antiga" type="password" name="senha_antiga">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="nova_senha">Digite sua nova senha:</label>
						<input class="form-control" type="password" name="nova_senha" id="nova_senha">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="nova_senha_confirmacao">Confirme a nova senha:</label>
						<input class="form-control" type="password" name="nova_senha_confirmacao" id="nova_senha_confirmacao">
					</div>
				</div>

				<div class="form-row col-lg-12">
					<div class="form-group col-sm-6">
						<button type="submit" name="enviar" class="form-control btn btn-outline-white" id="inputSobrenome">Enviar</button>
					</div>

					<div class="form-group col-sm-6">
						<button type="reset" name="reset" class="form-control btn btn-outline-white" id="inputSobrenome">Limpar</button>
					</div>
				</div>
			</form>
			</div>
		</div>
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

<!-- Rodapé do site -->
<?php
	include_once ('footer.php');
?>