<?php
	include_once 'header-admin.php';
	require_once('../config/config.inc.php');
?>

	<h1 class="text-center my-5 text-muted display-3 font">Detalhes do Orçamento</h1>
<?php
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { 		 
				$confirme_codigo = $_GET['id'];
		}
	}
		$ler = new ler;
		$ler->Query("cd_orca, nm_usuario, nm_segmento, nm_tipo_servico, ds_observacoes,ds_frequencia, ds_tf, ds_tl, ds_alt, un_medida, vl_orca, cd_confirmacao","tb_orcamento o","inner join tb_agendamento a on o.cd_agendamento = a.cd_agendamento inner join tb_usuario as u on a.cd_usuario = u.cd_usuario where a.cd_agendamento = $confirme_codigo limit 1");
		
		
		$ler->getResultados();
		$codigo = $ler->getResultados()[0]['cd_orca'];
		$nome = $ler->getResultados()[0]['nm_usuario'];
		$seg = $ler->getResultados()[0]['nm_segmento'];
		$tipo = $ler->getResultados()[0]['nm_tipo_servico'];
		$obs = $ler->getResultados()[0]['ds_observacoes'];
		$frequencia = $ler->getResultados()[0]['ds_frequencia'];
		$volume = $ler->getResultados()[0]['ds_tf'] * $ler->getResultados()[0]['ds_tl'] * $ler->getResultados()[0]['ds_alt'];
		$un_medida = $ler->getResultados()[0]['un_medida'];
		$valor = $ler->getResultados()[0]['vl_orca'];
		$confirmacao = $ler->getResultados()[0]['cd_confirmacao'];
		?>
	
	<div class="container">
		<table class="table table-striped my-4">
			<thead>
				<th>#</th>
				<th>Nome</th>
				<th>Segmento</th>
				<th>Tipo</th>
				<th>Descrição</th>
				<th>Frequência</th>
				<th>Volume</th>
				<th>Valor do serviço <label onclick="mostrar('valor')"><img class="editar" src="../img/Sem Título-1.png"></label></th>
				<th>Confirmação</th>
			</thead>
			
			<tbody>
				<?php echo "<form action='php/alterar_valor.php?id=$codigo' method='POST'>"?>
					
					<?php echo "<td>".$codigo."</td>"; ?>
					<?php echo "<td><a href='usuarios-admin.php'>".$nome."</a></td>"; ?>
					<?php echo "<td>".$seg."</td>"; ?>
					<?php echo "<td>".$tipo."</td>"; ?>
					<?php echo "<td>".$obs."</td>"; ?>
					<?php echo "<td>".$frequencia."</td>"; ?>
					<?php if($volume > 0){ ?>
							<?php echo "<td>".$volume.$un_medida."³</td>"; ?>
							<?php } else {
								echo "<td class='text-muted'><i>Não necessário</i></td>";
								}?>
					<?php if($valor > 0){ ?>
					<td><?php echo "R$".$valor.""; ?>
						<div id="valor" class="my-2" >
							<input type="text" name="valor" class="form-control"><?php echo "<a href='php/alterar_valor.php?id=".$codigo."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
						</div>
					</td>

					<?php } else { ?>
						<td class='text-muted'> <?php echo "<i>Orçamento sendo realizado</i>"; ?>
							<div id="valor" class="my-2" >
								<input type="text" name="valor" class="form-control"><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button>
							</div>
						</td>
						<?php } ?>
					<?php if($confirmacao != 0){ ?>
					<?php echo "<td class='text-muted'>Confirmado</td>"; ?>
					<?php } else {
						echo "<td class='text-muted'><i>Ainda não foi confirmado</i></td>";
						}?>
				</form>
			</tbody>
		</table>
		<a href="pdf/pdf.php"><p>Gerar PDF</p></a>
		<a href="javascript:history.back()"><p class="d text-right">Voltar</p></a>
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