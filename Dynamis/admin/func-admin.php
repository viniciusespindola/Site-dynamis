<?php 
header("content-type: text/html;charset=utf-8");

require_once('../config/config.inc.php');
	
function inverteData($data, $separar = '-', $juntar = '-'){
	return implode($juntar, array_reverse(explode($separar, $data)));
} 
?>

<?php include_once('header-admin.php') ?>

<!-- Título da página -->
<h1 class="text-center my-5 text-muted display-3 font">Funcionários Cadastrados</h1>

<div class="container">
	<!-- todos os pedidos de orçamentos -->
	<div class="mb-5">

		<?php
			
			$ler = new ler;
			$ler->Query("*","tb_funcionario f");
			$ler->getResultados();

			$codigo = $ler->getResultados()[0]['cd_func'];
			$nome = $ler->getResultados()[0]['nm_func'];
			$email = $ler->getResultados()[0]['nm_email'];
			$esp = $ler->getResultados()[0]['nm_especialidade'];
			
			if ($ler->getResultados()){ ?>
				<table class="table table-hover mb-5" id="funcionarios">
					<thead>
						<th>#</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Especialidade</th>
						<th>Detalhes</th>
					</thead>
					
					<tbody>
					<?php
					$numero_agendamento = 0;
						while (isset($ler->getResultados()[$numero_agendamento])) {
							$cd_func = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_func']);
							$nome = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_func']);
							$email = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_email']);
							$esp = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_especialidade']);
						?>

						<tr>
							
							<?php echo "<td>".$cd_func[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$nome[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$email[$numero_agendamento]."</td>";	?>
							<?php echo "<td>".$esp[$numero_agendamento]."</td>"; ?>
							<td><?php echo "<a href='detalhes-func.php?id=".$cd_func[$numero_agendamento]."'><button class='btn btn-outline-white'>Detalhes</button></a>" ?></td>
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
				<p class="text-muted col-8">Nenhum funcionário cadastrado.</p>
			<?php } ?>
			

			<a href="#" data-toggle="modal" data-target="#exampleModal"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAhCAYAAABX5MJvAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAJ9SURBVFhH7ZfHihVBGEZbMKxMKAojCKalT2FeO+Bs1YVhIQbGsNDHEMPKMM6o29mZdyomfAh9Dc/p7oKmb1dN1fV6BfGDQ+W/qv+KXf3XhLQGtrXh1LQHrsAb+AZf4QV8adPmW269iWsvPIfXcAZmIGhVGyrzLXcwS2C735Yd3ICPcKBNbwHdPw/qZhuaNt9y6x2C93AVxtZaeAy3QeObYQOcgJTmYD1sAtvdgYegvSL5JQ7gUp2qqnVwuolmy/q2U3rJgRTpGugB5XR0571EtrveRGuPZE/NPnAudZ/EBmDZ7g4pdwdbrq2sneMucBG6BlJTsB9+glvU0HRMJ2EjuFjdNUn5Ra+aaL0IU7LThSZah6lBqGDvLdhPVB407vOtcNyMhEoHoT3tnoOw4AflIeOBk3MMlw5CaVf7wduD+t6G7o6uVkN3Ecox6A7CdL+O7boKdkM/I3KUn5voiHbCD3jW4wIow36Z9W03pE8w6G1vw5fglux7QmPLTTRb1u8PQrvatx/7G9E0PWE/0XX319eECruj33hI4+wO7e4AD7ioLsNZ+JPnxHm4aEZMulBvuHg8ZlMqHYT2tPsOdpmR0lM4CN4dp8yIyE5z7w7vIN8XR+CJGSvJW+4DhJsvJsu6izBW168PtrxFrZsl733vf+V7QEPjyHZhR9wH76YiPYL5Jlq/kLyOS+RUhpeVH/KgiZZJ9/kkuwseLM6pb8dZSMny8MbUxj1wALHpypLecI0cBt27HRxUeKrdakPT5ltuvaPgGnDbT0T+PyyC29f3gAdOUHe9mO854MPFXZC9CEukUR8kDqb7B2YY/sA8iFY8ByYp3T/1f9F/VVX1C6OmexMZvp70AAAAAElFTkSuQmCC"></a> <span class="text-muted">Adicionar funcionário</span>
			
	</div>
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
	    $('#funcionarios').DataTable({
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<link rel="stylesheet" type="text/css" href="../css/style.css">

					 <h6 class="modal-title text-center text-muted display-3 font">Adicionar Funcionário</h6>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				
				<div class="modal-body">
					<form method="POST">
						<div class="form-row">
							<div class="form-group col-sm-7">
								<label for="nm-func">Nome do funcionário:</label>
								<input type="text" name="nm-func" class="form-control" id="nm-func">
							</div>

							<div class="form-group col-sm-7">
								<label for="mail-func">Email do funcionário:</label>
								<input type="email" name="mail-func" class="form-control" id="mail-func">
							</div>

							<div class="form-group col-sm-7">
								<label for="esp-func">Especialidade do funcionário:</label>
								<input type="text" name="esp-func" class="form-control" id="esp-func">
							</div>

						</div>
					
				</div>
				<div class="modal-footer">
						<div class="form-group col-sm-6">
							<button type="submit" name="enviar" class="form-control btn btn-white" >Enviar</button>
						</div>

						<div class="form-group col-sm-6">
							<button type="reset" name="reset" class="form-control btn btn-white">Limpar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>