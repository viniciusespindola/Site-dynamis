<meta charset="utf-8">

<?php 

//Incluindo as classes do CRUD
require_once('../config/config.inc.php');
session_start();

function mes()
{
	$mes = date("Y-m-d");
	$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	return $mes;
}
$codigo = $_SESSION['codigo'];
$segmento = $_POST['segmento'];
$descProblema = $_POST['descProblema'];
$dadosServ = $_POST['dadosServ'];
$frequencia = $_POST['frequencia'];

// Volume da caixa

$caixa = 0;
$unidade = "";

if ($_POST['volume-desinfeccao'] > 0) {
	$caixa = $_POST['volume-desinfeccao'];
	$unidade = $_POST['un-desinfeccao'];
}
else{

	if ($_POST['volume-impermeabilizacao'] > 0) {
		$caixa = $_POST['volume-impermeabilizacao'];
		$unidade = $_POST['un-impermeabilizacao'];
	}
	else{

		if ($_POST['volume-succao'] > 0) {
			$caixa = $_POST['volume-succao'];
			$unidade = $_POST['un-succao'];
		}
		else{
			$caixa = 0;
			$unidade = "";	
		}
	}
}

$mes = mes();

if ($dadosServ != "") {

	//Inserindo dados do usuario
	$criar = new criar;
	$criar->Query("tb_agendamento", "cd_usuario,nm_segmento,nm_tipo_servico,ds_observacoes, ds_volume, un_medida, ds_frequencia,dt_cadastro_agen", "'$codigo','$segmento','$dadosServ','$descProblema','$caixa','$unidade','$frequencia','$mes'");
	$criar->getResultados();
	
	$ler = new ler;
	$ler->Query("cd_agendamento","tb_agendamento","group by cd_agendamento desc limit 1");
	$codigo_agendamento_resultado = $ler->getResultados()[0]['cd_agendamento'];
	
	$criar->Query("tb_orcamento", "cd_func,vl_orca,cd_agendamento,cd_confirmacao", "'1',' ','$codigo_agendamento_resultado','0'");

	$criar->Query("tb_servico", "cd_func,hr_servico_marcado,dt_servico_marcado,cd_agendamento,dt_cadastro_serv,cd_alterar", "'1',' ',' ','$codigo_agendamento_resultado','$mes','0'");
}

//Voltando usuario para tela de cadastro caso não tenha preenchido os campos
else{
	?>
		<script type='text/javascript'>
			window.setTimeout("location='../cadastro.php';"0000);
		</script>
	<?php
}

?>
	<script type='text/javascript'>
		window.setTimeout("location='../usuario.php';"0000);
	</script>
<?php
header("location:../usuario.php");
?>

