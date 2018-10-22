<?php
function inverteData($data, $separar = '-', $juntar = '-'){
	return implode($juntar, array_reverse(explode($separar, $data)));
}
require_once('../../config/config.inc.php');
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { 		 
				$confirme_codigo = $_GET['id'];
		}
	}
		$ler = new ler;
		$ler->Query("cd_orca, u.cd_usuario, nm_usuario, cd_cpf,cd_cnpj, nm_email,nm_endereco, nm_numero,nm_complemento,cd_cep,dt_cadastro_user,cd_telefone,cd_telefone_alt, nm_segmento, nm_tipo_servico, ds_observacoes,ds_frequencia, ds_volume, un_medida, vl_orca, cd_confirmacao","tb_orcamento o","inner join tb_agendamento a on o.cd_agendamento = a.cd_agendamento inner join tb_usuario as u on a.cd_usuario = u.cd_usuario inner join tb_contato c on c.cd_usuario = u.cd_usuario where a.cd_agendamento = $confirme_codigo");
		
			session_start();
			$_SESSION['codigo'] = $ler->getResultados()[0]['cd_orca'];
			$_SESSION['seg'] = $ler->getResultados()[0]['nm_segmento'];
			$_SESSION['tipo'] = $ler->getResultados()[0]['nm_tipo_servico'];
			$_SESSION['obs'] = $ler->getResultados()[0]['ds_observacoes'];
			$_SESSION['frequencia'] = $ler->getResultados()[0]['ds_frequencia'];
			$_SESSION['volume'] = $ler->getResultados()[0]['ds_volume'];
			$_SESSION['un_medida'] = $ler->getResultados()[0]['un_medida'];
			$_SESSION['valor'] = $ler->getResultados()[0]['vl_orca'];
			$_SESSION['confirmacao'] = $ler->getResultados()[0]['cd_confirmacao'];

			$_SESSION['pdfcd_usuario'] = $ler->getResultados()[0]['cd_usuario'];
			$_SESSION['pdfnome'] = $ler->getResultados()[0]['nm_usuario'];
			$_SESSION['pdfcpf'] = $ler->getResultados()[0]['cd_cpf'];
			$_SESSION['pdfcnpj'] = $ler->getResultados()[0]['cd_cnpj'];
			$_SESSION['pdfemail'] = $ler->getResultados()[0]['nm_email'];
			$_SESSION['pdfendereco'] = $ler->getResultados()[0]['nm_endereco'];
			$_SESSION['pdfnumero'] = $ler->getResultados()[0]['nm_numero'];
			$_SESSION['pdfcomplemento'] = $ler->getResultados()[0]['nm_complemento'];
			$_SESSION['pdfcep'] = $ler->getResultados()[0]['cd_cep'];
			$_SESSION['pdfmes'] = inverteData($ler->getResultados()[0]['dt_cadastro_user'],'-','/');
			$_SESSION['pdftelefone'] = $ler->getResultados()[0]['cd_telefone'];
			$_SESSION['pdftelefone_alternativo'] = $ler->getResultados()[0]['cd_telefone_alt'];
			
?>
			<script type='text/javascript'>
				window.setTimeout("location='pdf-agendamento.php';",0000);
			</script>