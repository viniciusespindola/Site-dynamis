<?php
require_once('../config/config.inc.php');
if ($_SERVER['REQUEST_METHOD']=='GET') {
	if (isset($_GET['id'])) { 
		$confirme_codigo = $_GET['id'];
	}
}
$dados = "cd_confirmacao = 1";
$termos = "WHERE cd_orca = $confirme_codigo";
$atualizar = new atualizar;
$atualizar->Query("tb_orcamento", $dados, $termos);


?>
<script type='text/javascript'>
	window.setTimeout("location='../usuario.php';",0000);
</script>