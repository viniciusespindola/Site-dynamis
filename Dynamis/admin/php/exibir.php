<meta charset="utf-8">
<?php
require_once('../../config/config.inc.php');

if (isset($_GET['id'])) { 
	$codigo = $_GET['id'];
}

$dados = "ds_display = '1'";
$tb_banco = "tb_msg";

$atualizar = new atualizar;
$atualizar->Query($tb_banco, $dados, "WHERE cd_msg = $codigo");

?>

<meta http-equiv="refresh" content="5;url=javascript:window.setTimeout('history.go(-1)', 0000);"> 
<script type='text/javascript'>
	window.setTimeout(function(){history.go(-1)},0000);
</script>