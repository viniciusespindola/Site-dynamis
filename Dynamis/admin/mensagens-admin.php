<?php header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php');
	function inverteData($data, $separar = '-', $juntar = '-'){
		return implode($juntar, array_reverse(explode($separar, $data)));
	} ?>



<?php include_once('header-admin.php') ?>
<style type="text/css">
	#menssagem{
		background-image: url(img-admin/menssagem.png);
		background-repeat: no-repeat;
	}
</style>
<h1 class="text-center my-5 text-muted display-3 font">Mensagens dos Usuários</h1>


<div class="container">
	<?php 
		$ler = new Ler;
				$ler->Query("*", "tb_msg","order by cd_msg desc");
				$ler->getResultados(); 
			?>
				<table class="table my-4" id="tabela_mensagem_admin">
					<thead>
						
						<th>Nome</th>
						<th>E-mail</th>
						<th>Assunto</th>
						<th>Mensagem</th>
						<th>Data</th>
						<th>Exibição</th>
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
							$display = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['ds_display']);
						?>

						<tr>
							
							<?php echo "<td>".$nome_msg[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$email_msg[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$assunto[$numero_agendamento]."</td>";	?>
							<?php echo "<td>".$messagem[$numero_agendamento]."</td>";	?>
							<?php echo "<td>".inverteData($data[$numero_agendamento],'-','/')."</td>";	?>
							<?php if ($display[$numero_agendamento] == 0) { ?>
							<?php echo "<td><a href='php/exibir.php?id=".$cd_msg[$numero_agendamento]."'><button class='btn btn-outline-white'>Mostrar</button></a></td>"; ?>
							<?php } else{?>
							<?php echo "<td><a href='php/ocultar.php?id=".$cd_msg[$numero_agendamento]."'><button class='btn btn-outline-white'>Ocultar</button></a></td>"; ?>
							<?php } ?>
						</tr>


						<?php
							$numero_agendamento++;
					}
					?>
					</tbody>
				</table>

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
			    $('#tabela_mensagem_admin').DataTable({
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