<?php
require_once('config/config.inc.php');
session_start();
$codigo = $_SESSION['codigo']; 
include_once 'header.php';
?>
<div class="mostrar_info_orca mb-5">
			<div class="row">
				<?php
				$ler = new ler;
				$ler->Query("cd_orca,nm_segmento, nm_tipo_servico, ds_observacoes,vl_orca, cd_confirmacao","tb_orcamento o","inner join tb_agendamento a on o.cd_agendamento = a.cd_agendamento inner join tb_usuario as u on a.cd_usuario = u.cd_usuario where u.cd_usuario = $codigo group by cd_orca desc");
				$ler->getResultados();
				if ($ler->getResultados()){ ?>
					<table class="table table-striped col-10">
						<thead>
							<th>#</th>
							<th>Segmento</th>
							<th>Tipo</th>
							<th>Descrição</th>
							<th>Valor</th>
							
						</thead>
						<tbody>
						<?php
						$numero_agendamento = 0;
						while (isset($ler->getResultados()[$numero_agendamento])) {
								$codigo_orcamento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_orca']);
								$nome_segmento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_segmento']);
								$tipo_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_tipo_servico']);
								$desc_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_observacoes']);
								$valor_orca = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['vl_orca']);
								$confirmacao = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_confirmacao']);
							?>

						<tr>
							<?php echo "<td class='tamanho-coluna'>".$codigo_orcamento[$numero_agendamento]."</td>"; ?>
							<?php echo "<td class='tamanho-coluna'>".$nome_segmento[$numero_agendamento]."</td>"; ?>
							<?php echo "<td class='tamanho-coluna'>".$tipo_servico[$numero_agendamento]."</td>";	?>
							<?php echo "<td class='tamanho-coluna'><div class='desc_servico'>".$desc_servico[$numero_agendamento]."</div></td>";	?>
							<?php if ($valor_orca[$numero_agendamento] != 0){
								echo "<td class='tamanho-coluna'>R$".$valor_orca[$numero_agendamento]."</td>";	
							}
							else{
								echo "<td class='tamanho-coluna'>"."<p class='text-muted'>Orçamento sendo realizado</p>"."</td>";
							} 
					
						/*		$numero_agendamento++;
						?>
						</tr>
						<?php
						}
					*/
						?>
					<!--	
						</tbody>
					</table>	
						
					
					<table class="table table-striped col-2">
						<thead>
							<th>Confirmação</th>
						</thead>
						<tbody>
					-->
							<?php
						/*	
							//while de confirmação
							$numero_agendamento = 0;
							while (isset($ler->getResultados()[$numero_agendamento])) {
								$codigo_orcamento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_orca']);
								$confirmacao = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_confirmacao']);
						*/
								if ($confirmacao[$numero_agendamento] == 1){
									echo "<td class='tamanho-coluna'>"."<p class='text-muted confirmado'>Confirmado</p>"."</td>";
								}	
								else{
								?>
								
								<td class='tamanho-coluna'>
									<?php
									echo "<a href='php/confirme.php?id=".$codigo_orcamento[$numero_agendamento]."'><button class='btn btn-outline-white'>botão</button></a>"		
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






<!-- .redes{

 margin: 150px auto;
 width: 50px;
 height: 50px;
} -->






						<?php		
						//		$numero_agendamento++;
						?>
						<!--
						</tr>
					-->
						<?php
						//}
					
						?>
						<!--
						</tbody>
					</table>	
						
						
					<table class="table table-striped col-2">
						<thead>
							<th>Confirmação</th>
						</thead>
						<tbody>
					-->
							<?php
						/*	
							//while de confirmação
							$numero_agendamento = 0;
							while (isset($ler->getResultados()[$numero_agendamento])) {
								$codigo_orcamento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_orca']);
								$confirmacao = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_confirmacao']);
						*/













								<!--<div class="row">
	<div class="col-3">
		<select name="tamnho-f-un" id="selecionar" class="form-control" >
			<option value="todos">Todos</option>
			<option value="n-realizados">ainda não realizados<meta http-equiv="refresh" content="1; #"></option>
		</select>
	</div>
</div>
-->
<script type="text/javascript">
	<?php GLOBAL $selecionar ?> = getElementById('selecionar')<?php ; ?>
</script>