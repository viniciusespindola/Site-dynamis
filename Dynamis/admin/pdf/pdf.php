<?php

require_once('../../config/config.inc.php');
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { 		 
				$confirme_codigo = $_GET['id'];
		}
	}
		$ler = new ler;
		$ler->Query("nm_usuario","tb_orcamento o","inner join tb_agendamento a on o.cd_agendamento = a.cd_agendamento inner join tb_usuario as u on a.cd_usuario = u.cd_usuario where a.cd_agendamento = $confirme_codigo limit 1");
		
			session_start();
			$_SESSION['usuario'] = $ler->getResultados()[0]['nm_usuario'];
			
?>
			<script type='text/javascript'>
				window.setTimeout("location='pdf-agendamento.php';",0000);
			</script>