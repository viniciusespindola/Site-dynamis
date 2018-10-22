<?php header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php'); ?>


<?php include_once('header-admin.php') ?>

<style type="text/css">
  #estatisticas{
    background-image: url(img-admin/grafico.png);
    background-repeat: no-repeat;
  }
</style>

<?php
	$ler = new ler;
	

	$mes = date("m");
	$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	
  $resultMesAtual = $mes;
  $mesAtualEx = $meses[$mes -1];

	$resultMesAnterior = $mes - 1;
  $mesAnteriorEx = $meses[$mes -2];

	$resultMesAntesAnterior = $mes - 2;
  $mesAnteAnteriorEx = $meses[$mes -3];
	
	
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Qtd registrados", { role: "style" } ],
        ["Usuários", <?php $ler->Query("count(*)", "tb_usuario");
	echo $ler->getResultados()[0]['count(*)']; ?>, "#8B1A1A"],
        ["Agendamentos", <?php $ler->Query("count(*)", "tb_agendamento");
	echo $ler->getResultados()[0]['count(*)']; ?>, "#f00"],
        ["Serviços", <?php $ler->Query("count(*)", "tb_orcamento", "where cd_confirmacao = 1");
	echo $ler->getResultados()[0]['count(*)']; ?>, "silver"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Número de Usúarios / Agendamentos / Serviços",
        width: 1000,
        height: 600,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

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


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Agendamento', 'Serviços'],
          ['<?php echo $mesAnteAnteriorEx; ?>', <?php $ler->Query("count(*)", "tb_agendamento","where MONTH(dt_cadastro_agen) = '$resultMesAntesAnterior'"); echo $ler->getResultados()[0]['count(*)']; ?>, <?php $ler->Query("count(*)", "tb_servico s","inner join tb_agendamento a on a.cd_agendamento = s.cd_agendamento inner join tb_orcamento o on o.cd_agendamento = a.cd_agendamento where cd_confirmacao = 1 and MONTH(dt_cadastro_serv) = '$resultMesAntesAnterior'"); echo $ler->getResultados()[0]['count(*)']; ?>],

          ['<?php echo $mesAnteriorEx; ?>', <?php $ler->Query("count(*)", "tb_agendamento","where MONTH(dt_cadastro_agen) = '$resultMesAnterior'"); echo $ler->getResultados()[0]['count(*)']; ?> , <?php $ler->Query("count(*)", "tb_servico s","inner join tb_agendamento a on a.cd_agendamento = s.cd_agendamento inner join tb_orcamento o on o.cd_agendamento = a.cd_agendamento where cd_confirmacao = 1 and MONTH(dt_cadastro_serv) = '$resultMesAnterior'"); echo $ler->getResultados()[0]['count(*)']; ?>],

          ['<?php echo $mesAtualEx; ?>', <?php $ler->Query("count(*)", "tb_agendamento","where MONTH(dt_cadastro_agen) = '$resultMesAtual'"); echo $ler->getResultados()[0]['count(*)']; ?> , <?php $ler->Query("count(*)", "tb_servico s","inner join tb_agendamento a on a.cd_agendamento = s.cd_agendamento inner join tb_orcamento o on o.cd_agendamento = a.cd_agendamento where cd_confirmacao = 1 and MONTH(dt_cadastro_serv) = '$resultMesAtual'"); echo $ler->getResultados()[0]['count(*)']; ?>]
        ]);

        var options = {
          title: 'Número de serviços marcados nos últimos 3 meses',
          hAxis: {title: '',  titleTextStyle: {color: '#f00'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('servicos'));
        chart.draw(data, options);
      }
    </script>



<h1 class="text-center text-muted display-3 font">Gráficos de Estatísticas do Site</h1>

	<div class="row esta">
		<div id="columnchart_values" class="col-8" style="height: 300px;"></div>

		<div class="row col-4">
			<div id="curve_chart" class="col-12" style="height: 300px;"></div>

			<div id="servicos" class=" col-12" style="height: 300px; color: red;"></div>
		</div>
	</div>