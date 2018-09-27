<meta charset="utf-8">
<?php
require_once('../../config/config.inc.php');

if (isset($_GET['id'])) { 
	$codigo = $_GET['id'];
}


$valor = $_POST['valor'];

$dados = "vl_orca = '$valor'";
$tb_banco = "tb_orcamento";

$atualizar = new atualizar;
$atualizar->Query($tb_banco, $dados, "WHERE cd_orca = $codigo");

?>

<meta http-equiv="refresh" content="5;url=javascript:window.setTimeout('history.go(-1)', 0000);"> 
<script type='text/javascript'>
	window.setTimeout(function(){history.go(-1)},0000);
</script>