<?php header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php');
function inverteData($data, $separar = '-', $juntar = '-'){
		return implode($juntar, array_reverse(explode($separar, $data)));
	}

 ?>



<?php include_once('header-admin.php') ?>

<h1 class="text-center my-5 text-muted display-3 font">Serviços Marcados</h1>

<!-- Menu dos serviços -->
	<div class="row " id="menu">
		<div class="navbar nav navbar-expand-lg navbar-light bg-light col-12 pl-5 mb-4">
			

				<ul class="navbar-nav mr-auto" id="link">
					<li class="nav-item">
						<a class="btn btn-white mr-2 mb-2" href="servicos-admin.php">Todos os serviços</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-white mr-2 mb-2" href="servicos-1-admin.php">Serviços já marcados</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-white mr-2 mb-2" href="servicos-2-admin.php">Serviços ainda não marcados</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-white mr-2 mb-2" href="servicos-3-admin.php">Serviços já realizados</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-white mr-2 mb-2" href="servicos-4-admin.php">Serviços ainda não realizados</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-white mr-2 mb-2" href="servicos-5-admin.php">Pedidos de alteração de data do serviço</a>
					</li>
				</ul>

			</div>	
		</div>
	</div>
<div class="container">
<div class="mb-5">
			
</div>
	
<div id="servicos-marcados">
	<?php
		$ler = new ler;
		$ler->Query("cd_servico, nm_usuario, nm_segmento, hr_servico_marcado, dt_servico_marcado, nm_tipo_servico, ds_observacoes", "tb_agendamento a","inner join tb_servico s on a.cd_agendamento = s.cd_agendamento inner join tb_usuario  u on a.cd_usuario = u.cd_usuario inner join tb_orcamento o on a.cd_agendamento = o.cd_agendamento where cd_confirmacao = 1");
		$ler->getResultados();
		if ($ler->getResultados()){ ?>
			<table class="table table-hover " id="tabela_todos_servicos_admin">
				<thead>
					<th>Usuário</th>
					<th>Segmento</th>
					<th>Data</th>
					<th>Hora</th>
					<th>Tipo</th>
					<th>Descrição</th>
					<th>Detalhes</th>
				</thead>
				
				<tbody>
				<?php
				$numero_agendamento = 0;
					while (isset($ler->getResultados()[$numero_agendamento])) {
						$cd_serv = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_servico']);
						$nome_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_usuario']);
						$nome_segmento = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_segmento']);
						$hora_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['hr_servico_marcado']);
						$data_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['dt_servico_marcado']);
						$tipo_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_tipo_servico']);
						$desc_servico = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['ds_observacoes']);	
					?>

				<tr>
					<?php if($hora_servico[$numero_agendamento] == 0){ ?>
					<?php echo "<td>".$nome_user[$numero_agendamento]."</td>"; ?>
					<?php echo "<td>".$nome_segmento[$numero_agendamento]."</td>"; ?>
					<?php if ($data_servico[$numero_agendamento] > 0) { ?>
					<?php echo "<td>".inverteData($data_servico[$numero_agendamento],'-','/')."</td>";	?>
					<?php } else{
						echo "<td><i class='text-muted'>Não marcado</i></td>";
					} ?>
					<?php if ($hora_servico[$numero_agendamento] > 0) { ?>
					<?php echo "<td>".$hora_servico[$numero_agendamento]."</td>"; ?>
					<?php } else{
						echo "<td><i class='text-muted'>Não marcado</i></td>";
					} ?>
					<?php echo "<td>".$tipo_servico[$numero_agendamento]."</td>";	?>
					<?php echo "<td>".$desc_servico[$numero_agendamento]."</td>";	?>
					<td><?php echo "<a href='detalhes-serv.php?id=".$cd_serv[$numero_agendamento]."'><button class='btn btn-outline-white'>Detalhes</button></a>" ?></td>
					<?php } ?>
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
			<p class="text-muted col-8">Nada encontrado.</p>
			
		<?php } ?>
		
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
			    $('#tabela_todos_servicos_admin').DataTable({
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
</div>