<?php header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php');

//função para transformar a data para o padrão brasileiro
function inverteData($data, $separar = '-', $juntar = '-'){
		return implode($juntar, array_reverse(explode($separar, $data)));
	}

 ?>



<?php include_once('header-admin.php') ?>

<!-- Título da página -->
<h1 class="text-center my-5 text-muted display-3 font">Serviços Marcados</h1>
<!-- Orçamentos já realizados -->
	<div id="orcamentos" class="mb-5">

		<?php
			
			$ler = new ler;
			$ler->Query("cd_orca, a.cd_agendamento, nm_usuario, nm_segmento, nm_tipo_servico, ds_observacoes,ds_frequencia, ds_volume, un_medida, vl_orca, cd_confirmacao","tb_orcamento o","inner join tb_agendamento a on o.cd_agendamento = a.cd_agendamento inner join tb_usuario as u on a.cd_usuario = u.cd_usuario where vl_orca > 0");
			$ler->getResultados();

			$codigo = $ler->getResultados()[0]['cd_orca'];
			$nome = $ler->getResultados()[0]['nm_usuario'];
			$seg = $ler->getResultados()[0]['nm_segmento'];
			$tipo = $ler->getResultados()[0]['nm_tipo_servico'];
			$obs = $ler->getResultados()[0]['ds_observacoes'];
			$valor = $ler->getResultados()[0]['vl_orca'];
			$confirmacao = $ler->getResultados()[0]['cd_confirmacao'];

			if ($ler->getResultados()){ ?>
				<table class="table table-hover " id="tabela_orcamento_admin">
					<thead>
						<!--<th>#</th>-->
						<th>Nome</th>
						<th>Segmento</th>
						<th>Tipo</th>
						<th>Descrição</th>
						<th>Frequência</th>
						<th>Volume</th>
						<th>Valor do serviço</th>
						<th>Confirmação</th>
						<th>Detalhes</th>
					</thead>
					
					<tbody>
					<?php
					$numero_agendamento = 0;
						while (isset($ler->getResultados()[$numero_agendamento])) {
							$cd_agend = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_agendamento']);
							$cd_orca = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_orca']);
							$nome_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_usuario']);
							$nome_segmento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_segmento']);
							$tipo_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_tipo_servico']);
							$desc_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_observacoes']);
							$frequencia = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_frequencia']);
							$volume = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_volume']);
							$un_medida = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['un_medida']);
							$vl_orca = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['vl_orca']);
							$confirmacao = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_confirmacao']);	
						?>

					<tr>
						
						<?php echo "<td>".$nome_user[$numero_agendamento]."</td>"; ?>
						<?php echo "<td>".$nome_segmento[$numero_agendamento]."</td>"; ?>
						<?php echo "<td>".$tipo_servico[$numero_agendamento]."</td>";	?>
						<?php echo "<td>".$desc_servico[$numero_agendamento]."</td>"; ?>
						<?php echo "<td>".$frequencia[$numero_agendamento]."</td>"; ?>
						<?php if($volume[$numero_agendamento] > 0){ ?>
						<?php echo "<td>".$volume[$numero_agendamento].$un_medida[$numero_agendamento]."</td>"; ?>
						<?php } else {
							echo "<td class='text-muted'><i>Não necessário</i></td>";
							}?>
						<?php if($vl_orca[$numero_agendamento] > 0){ ?>
						<?php echo "<td>R$".$vl_orca[$numero_agendamento]."</td>"; ?>
						<?php } else {
							echo "<td class='text-muted'><i>Orçamento sendo realizado</i></td>";
							}?>
						<?php if($confirmacao[$numero_agendamento] != 0){ ?>
						<?php echo "<td class='text-muted'>Confirmado</td>"; ?>
						<?php } else {
							echo "<td class='text-muted'><i>Ainda não foi confirmado</i></td>";
							}?>
							<td><?php echo "<a href='detalhes-agend.php?id=".$cd_agend[$numero_agendamento]."'><button class='btn btn-outline-white'>Detalhes</button></a>" ?></td>
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

	<!-- Todas as folhas de estilo css desta página -->
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
			<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
			
			<!-- Todas os arquivos JavaScript desta página -->
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
			
			<script type="text/javascript">
				$(document).ready( function () {
				    $('#tabela_orcamento_admin').DataTable({
				    	retrieve: true,
				    	"language": {
				            "lengthMenu": "Mostrando _MENU_ registros por páginas",
				            "zeroRecords": "Nada encontrado",
				            "info": "Mostrando página _PAGE_ de _PAGES_",
				            "infoEmpty": "Nenhum registro disponível",
				            "sSearch": "Pesquisar:",
				            "oPaginate": {
				            	"sFirst": "Primeira",
				            	"sPrevious": "Anterior",
				            	"sNext": "Próximo",
				            	"sLast": "Última",
				            },
				            "infoFiltered": "(filtrado de _MAX_ registros no total)"
				        }	
				    });
				} );
			</script>