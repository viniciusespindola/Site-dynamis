<?php header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php'); ?>


<?php include_once('header-admin.php') ?>

<?php
	$ler = new ler;
	

	$mes = date("m");
	$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	$resultMesAtual = $meses[$mes - 1];
	$resultMesAnterior = $meses[$mes - 2];
	$resultMesAntesAnterior = $meses[$mes - 3];
	
	
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
        ["Serviços", <?php $ler->Query("count(*)", "tb_servico", "where hr_servico_marcado > 0 and dt_servico_marcado > 0");
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
          ['<?php echo $resultMesAntesAnterior; ?>',  <?php $ler->Query("count(cd_usuario)", "tb_usuario u","where mes_cadastro = '$resultMesAntesAnterior'");
echo $ler->getResultados()[0]['count(cd_usuario)']; ?>],
          ['<?php echo $resultMesAnterior; ?>',  <?php $ler->Query("count(cd_usuario)", "tb_usuario u","where mes_cadastro = '$resultMesAnterior'");
echo $ler->getResultados()[0]['count(cd_usuario)']; ?>],
          ['<?php echo $resultMesAtual; ?>',  <?php $ler->Query("count(cd_usuario)", "tb_usuario u","where mes_cadastro = '$resultMesAtual'"); echo $ler->getResultados()[0]['count(cd_usuario)']; ?>]
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
          ['<?php echo $resultMesAntesAnterior; ?>', <?php $ler->Query("count(*)", "tb_agendamento","where mes_agen = '$resultMesAntesAnterior'"); echo $ler->getResultados()[0]['count(*)']; ?>, 0],
          ['<?php echo $resultMesAnterior; ?>', <?php $ler->Query("count(*)", "tb_agendamento","where mes_agen = '$resultMesAnterior'"); echo $ler->getResultados()[0]['count(*)']; ?> , 1],
          ['<?php echo $resultMesAtual; ?>', <?php $ler->Query("count(*)", "tb_agendamento","where mes_agen = '$resultMesAtual'"); echo $ler->getResultados()[0]['count(*)']; ?> , 3]
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



<h1 class="text-center text-muted display-3 font">Gráficos de utilização do site</h1>

	<div class="row">
		<div id="columnchart_values" class="col-7" style="height: 300px;"></div>

		<div class="row col-5">
			<div id="curve_chart" class="w-100 col-12" style="height: 300px;"></div>

			<div id="servicos" class="w-100 col-12" style="height: 300px; color: red;"></div>
		</div>
	</div>