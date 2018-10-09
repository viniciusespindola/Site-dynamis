<?php header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php'); ?>



<?php include_once('header-admin.php') ?>

<style type="text/css">
	#usuarios{
		background-image: url(img-admin/usuarios.png);
		background-repeat: no-repeat;
	}
</style>

<h1 class="text-center my-5 text-muted display-3 font">Usuários Cadastrados</h1>


<div class="container">
	<?php 
		$ler = new Ler;
				$ler->Query("u.cd_usuario, nm_usuario, nm_email, nm_endereco", "tb_usuario u","order by cd_usuario desc");
				$ler->getResultados(); 
			?>
				<table class="table my-4" id="tabela_usuarios_admin">
					<thead>
						<th>#</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Endereço</th>
						<th>Detalhes</th>
					</thead>
					
					<tbody>
					<?php
					
					$numero_agendamento = 0;
					while (isset($ler->getResultados()[$numero_agendamento])) {
							$cd_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_usuario']);
							$nome_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_usuario']);
							$email_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_email']);
							$tel_user = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['nm_endereco']);
						?>

						<tr>
							<?php echo "<td>".$cd_user[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$nome_user[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$email_user[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$tel_user[$numero_agendamento]."</td>";	?>
							<td><?php echo "<a href='detalhes-user.php?id=".$cd_user[$numero_agendamento]."'><button class='btn btn-outline-white'>Detalhes</button></a>" ?></td>
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
			    $('#tabela_usuarios_admin').DataTable({
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