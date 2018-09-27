<meta charset="utf-8">

<?php 

//Incluindo as classes do CRUD
require_once('../config/config.inc.php');
session_start();

function mes()
{
	$mes = date("m");
	$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	$resultMesAtual = $meses[$mes - 1];
	return $resultMesAtual;
}
$codigo = $_SESSION['codigo'];
$segmento = $_POST['segmento'];
$descProblema = $_POST['descProblema'];
$dadosServ = $_POST['dadosServ'];
$frequencia = $_POST['frequencia'];

// Unidade de medida da caixa
if (isset($_POST['tamanho-f-un1'])) {
	$tamanho_frente = $_POST['tamanho-f-un1'];
}
else{
	$tamanho_frente = "";	
}
if (isset($_POST['tamanho-l-un1'])) {
	$tamanho_lado = $_POST['tamanho-l-un1'];
}
else{
	$tamanho_lado = "";	
}
if (isset($_POST['tamanho-a-un1'])) {
	$tamanho_altura = $_POST['tamanho-a-un1'];
}
else{
	$tamanho_altura = "";	
}

// Valor do tamnho da caixa
if (isset($_POST['tamanho-f1'])) {
	$tamanho_frente_vl = $_POST['tamanho-f1'];
}
else{
	$tamanho_frente_vl = 0;	
}
if (isset($_POST['tamanho-l1'])) {
	$tamanho_lado_vl = $_POST['tamanho-l1'];
}
else{
	$tamanho_lado_vl = 0;	
}
if (isset($_POST['tamanho-a1'])) {
	$tamanho_altura_vl = $_POST['tamanho-a1'];
}
else{
	$tamanho_altura_vl = 0;	
}
$mes = mes();

if ($dadosServ != "") {

	//Inserindo dados do usuario
	$criar = new criar;
	$criar->Query("tb_agendamento", "cd_usuario,nm_segmento,nm_tipo_servico,ds_observacoes, ds_tf, ds_tl, ds_alt, un_medida, ds_frequencia,mes_agen", "'$codigo','$segmento','$dadosServ','$descProblema','$tamanho_frente_vl','$tamanho_lado_vl','$tamanho_altura_vl','$tamanho_frente','$frequencia','$mes'");
	$criar->getResultados();
	
	$ler = new ler;
	$ler->Query("cd_agendamento","tb_agendamento","group by cd_agendamento desc limit 1");
	$codigo_agendamento_resultado = $ler->getResultados()[0]['cd_agendamento'];
	
	$criar->Query("tb_orcamento", "cd_func,vl_orca,cd_agendamento,cd_confirmacao", "'1',' ','$codigo_agendamento_resultado','0'");
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