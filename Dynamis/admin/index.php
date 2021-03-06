<?php 
header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php');

$mes = date("m");
$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");


$resultMesAtual = $mes;
$mesAtualEx = $meses[$mes -1];

$resultMesAnterior = $mes - 1;
$mesAnteriorEx = $meses[$mes -2];

$resultMesAntesAnterior = $mes - 2;
$mesAnteAnteriorEx = $meses[$mes -3];

$ler = new ler;
$ler->Query("count(cd_usuario)", "tb_usuario u","where mes_cadastro = '$resultMesAntesAnterior'");
?>

<?php include_once('header-admin.php') ?>

<style type="text/css">
	#bem-vindo{
		background-image: url(img-admin/porta.png);
		background-repeat: no-repeat;
	}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Usuários'],
          ['<?php echo $mesAnteAnteriorEx; ?>',  <?php $ler->Query("count(cd_usuario)", "tb_usuario u","where MONTH(dt_cadastro_user) = '$resultMesAntesAnterior'");
echo $ler->getResultados()[0]['count(cd_usuario)']; ?>],
          ['<?php echo $mesAnteriorEx; ?>',  <?php $ler->Query("count(cd_usuario)", "tb_usuario u","where MONTH(dt_cadastro_user) = '$resultMesAnterior'");
echo $ler->getResultados()[0]['count(cd_usuario)']; ?>],
          ['<?php echo $mesAtualEx; ?>',  <?php $ler->Query("count(cd_usuario)", "tb_usuario u","where MONTH(dt_cadastro_user) = '$resultMesAtual'"); echo $ler->getResultados()[0]['count(cd_usuario)']; ?>]
        ]);

        var options = {
          title: 'Número de usuários cadastrados nos últimos 3 meses',
          curveType: 'none',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
</script>


<h1 class="text-center my-5 text-muted display-3 font">Bem-Vindo Administrador</h1>

<div class="container">
	
	<div class="row">
		<div class="col-4" style="color:white;border-radius: 1px;padding: 10px;border-left:1px solid red;border-right:1px solid red; background-color: tranparent;">
			<?php
				$ler = new ler;
				$ler->Query("*", "hit_counter");
				echo "<p class='text-muted'>Total de cliques no site: ".$ler->getResultados()[0]['total_hits']."</p>";
				echo "<p class='text-muted'>Total de acessos ao site: ".$ler->getResultados()[0]['unique_hits']."</p>";
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-4">
			<hr class="my-5"/>
			<h4 class="text-muted text-center">Últimos usuários cadastrados</h4>
			<?php 
				$ler->Query("u.cd_usuario, nm_usuario, nm_email, cd_telefone", "tb_usuario u"," inner join tb_contato  c on u.cd_usuario = c.cd_usuario order by cd_usuario desc limit 2");
				$ler->getResultados(); 
			?>
				<table class="table my-4">
					<thead>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Detalhes</th>
					</thead>
					
					<tbody>
					<?php
					
					$numero_agendamento = 0;
					while (isset($ler->getResultados()[$numero_agendamento])) {
							$cd_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_usuario']);
							$nome_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_usuario']);
							$email_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_email']);
							$tel_user = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['cd_telefone']);
						?>

						<tr>
							
							<?php echo "<td>".$nome_user[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$tel_user[$numero_agendamento]."</td>";	?>
							<td><?php echo "<a href='detalhes-user.php?id=".$cd_user[$numero_agendamento]."'><button class='btn btn-outline-white'>Detalhes</button></a>" ?></td>
						</tr>


						<?php
							$numero_agendamento++;
					}
					?>
					</tbody>
				</table>
				<a href="usuarios-admin.php"><p class="text-muted mr-3 text-right">Ver todos</p></a>
		</div>

		<div class="col-4">
			<hr class="my-5"/>
			<h4 class="text-muted text-center">Cadastros nos últimos 3 meses</h4>
			<div id="curve_chart" class="w-100" style="height: 300px"></div>
		</div>

		<div class="col-4">
			<hr class="my-5"/>
			<h4 class="text-muted text-center">Últimos pedidos de orçamento</h4>
			<?php 
				$ler->Query("cd_agendamento, nm_usuario, nm_segmento, nm_tipo_servico, ds_observacoes", "tb_agendamento a","inner join tb_usuario u on a.cd_usuario = u.cd_usuario order by cd_agendamento desc limit 2");
				$ler->getResultados(); 
			?>
				<table class="table my-4">
					<thead>
						<th>Nome</th>
						<th>Tipo</th>
						<th>Detalhes</th>
					</thead>
					
					<tbody>
					<?php
					
					$numero_agendamento = 0;
					while (isset($ler->getResultados()[$numero_agendamento])) {
							$cd_agend = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['cd_agendamento']);
							$nome_user = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_usuario']);
							$segmento_orca = array($numero_agendamento => $ler->getResultados()[$numero_agendamento]['nm_segmento']);
							$tipo_serv = array($numero_agendamento =>$ler->getResultados()[$numero_agendamento]['nm_tipo_servico']);
						?>

						<tr>
							
							<?php echo "<td>".$nome_user[$numero_agendamento]."</td>"; ?>
							<?php echo "<td>".$tipo_serv[$numero_agendamento]."</td>";	?>
							<td><?php echo "<a href='detalhes-agend.php?id=".$cd_agend[$numero_agendamento]."'><button class='btn btn-outline-white'>Detalhes</button></a>" ?></td>
						</tr>


						<?php
							$numero_agendamento++;
					}
					?>
					</tbody>
				</table>
			<a href="orcamentos-admin.php"><p class="text-muted mr-3 text-right">Ver todos</p></a>
		</div>
	</div>
</div>



