<?php
	include_once 'header-admin.php';
	require_once('../config/config.inc.php');
	function inverteData($data, $separar = '-', $juntar = '-'){
		return implode($juntar, array_reverse(explode($separar, $data)));
	}

?>
	<h1 class="text-center my-5 text-muted display-3 font">Detalhes do Usuário</h1>
<?php
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { 		 
				$cd_serv = $_GET['id'];
		}
	}
			
		$ler = new ler;
		$ler->Query("cd_servico, nm_usuario, nm_segmento, hr_servico_marcado, dt_servico_marcado, nm_tipo_servico, ds_observacoes", "tb_agendamento a","inner join tb_servico s on a.cd_agendamento = s.cd_agendamento inner join tb_usuario  u on a.cd_usuario = u.cd_usuario where cd_servico = $cd_serv");
		$ler->getResultados();
		$codigo = $ler->getResultados()[0]['cd_servico'];
		$nome = $ler->getResultados()[0]['nm_usuario'];
		$segmento = $ler->getResultados()[0]['nm_segmento'];
		$hora = $ler->getResultados()[0]['hr_servico_marcado'];
		$data = $ler->getResultados()[0]['dt_servico_marcado'];
		$tipo = $ler->getResultados()[0]['nm_tipo_servico'];
		$obs = $ler->getResultados()[0]['ds_observacoes'];
		
		?>
	
	<div class="container">
		<table class="table table-striped my-4">
			<thead>
				<th>#</th>
				<th>Nome</th>
				<th>Segmento</th>
				<th>Hora <label onclick="mostrar('hora')"><img class="editar" src="../img/Sem Título-1.png"></label></th>
				<th>Data <label onclick="mostrar('data')"><img class="editar" src="../img/Sem Título-1.png"></label></th>
				<th>Tipo</th>
				<th>Descrição</th>
			</thead>
			
			<tbody>
				<?php echo "<td>".$codigo."</td>"; ?>
				<?php echo "<td>".$nome."</td>"; ?>
				<?php echo "<td>".$segmento."</td>"; ?>
				<?php echo "<form action='php/alterar_hora.php?id=$codigo' method='POST'>"?>
				<?php if($hora > 0){ ?>
				<td>
					<?php echo "".$hora.""; ?>
					
					<div id="hora" class="my-2" >
						<input type="text" name="hora" class="form-control" placeholder="Ex.: XX:XX"><?php echo "<a href='php/alterar_hora.php?id=".$codigo."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
					</div>	
				</td>
				<?php } else { ?>
				<td class='text-muted'>
					<?php echo "<i>Nenhum valor encontrado</i>"; ?>
					
					<div id="hora" class="my-2" >
						<input type="text" name="hora" class="form-control" placeholder="Ex.: XX:XX"><?php echo "<a href='php/alterar_hora.php?id=".$codigo."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
					</div>	
				</td>
				<?php } ?>
				</form>

				<?php echo "<form action='php/alterar_data.php?id=$codigo' method='POST'>"?>
				<?php if($data > 0){ ?>
				
				<td>
					<?php echo "".inverteData($data,'-','/').""; ?>
				
					<div id="data" class="my-2" >
						<input type="text" name="data" class="form-control" placeholder="Ex.: XX-XX-XXXX"><?php echo "<a href='php/alterar_data.php?id=".$codigo."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
					</div>	
				</td>
				<?php } else { ?>
					<td class='text-muted'>
						<?php echo "<i>Nenhum valor encontrado</i>"; ?>
					
						<div id="data" class="my-2" >
							<input type="text" name="data" class="form-control" placeholder="Ex.: XX-XX-XXXX"><?php echo "<a href='php/alterar_data.php?id=".$codigo."'>" ?><button type="submit" name="enviar" class="btn btn-outline-white w-100">Alterar</button></a>
						</div>
					</td>
				
					<?php } ?>
				</form>
				<?php echo "<td>".$tipo."</td>"; ?>
				<?php echo "<td>".$obs."</td>"; ?>
			</tbody>
		</table>
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