<meta charset="utf-8">
<?php
require_once('../../config/config.inc.php');

if (isset($_GET['id'])) { 
	$codigo = $_GET['id'];
}


$hora = $_POST['hora'];

$dados = "hr_servico_marcado = '".$hora."'";
$tb_banco = "tb_servico";

$atualizar = new atualizar;
$atualizar->Query($tb_banco, $dados, "WHERE cd_servico = $codigo");

?>

<meta http-equiv="refresh" content="5;url=javascript:window.setTimeout('history.go(-1)', 0000);"> 
<script type='text/javascript'>
	window.setTimeout(function(){history.go(-1)},0000);
</script>