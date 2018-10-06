<meta charset="utf-8">
<?php
require_once('../config/config.inc.php');
	
	if ($_POST['nome'] != "") {
		$dado = $_POST['nome'];
		$tabela = "nm_usuario";
		$sessao = "nome";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['cpf'] != "") {
		$dado = $_POST['cpf'];
		$tabela = "ccd_cpf";
		$sessao = "cpf";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['cnpj'] != "") {
		$dado = $_POST['cnpj'];
		$tabela = "cd_cnpj";
		$sessao = "cnpj";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['email'] != "") {
		$dado = $_POST['email'];
		$tabela = "nm_email";
		$sessao = "email";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['telefone'] != "") {
		$dado = $_POST['telefone'];
		$tabela = "cd_telefone";
		$sessao = "telefone";
		$tb_banco = "tb_contato";
	}

	if ($_POST['TAlternativo'] != "") {
		$dado = $_POST['TAlternativo'];
		$tabela = "cd_telefone_alt";
		$sessao = "telefone_alternativo";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['endereco'] != "") {
		$dado = $_POST['endereco'];
		$tabela = "nm_endereco";
		$sessao = "endereco";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['numero'] != "") {
		$dado = $_POST['numero'];
		$tabela = "nm_numero";
		$sessao = "numero";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['complemento'] != "") {
		$dado = $_POST['complemento'];
		$tabela = "nm_complemento";
		$sessao = "complemento";
		$tb_banco = "tb_usuario";
	}
	if ($_POST['cep'] != "") {
		$dado = $_POST['cep'];
		$tabela = "cd_cep";
		$sessao = "cep";
		$tb_banco = "tb_usuario";
	}

$dados = "$tabela = '$dado'";
session_start();
$codigo = $_SESSION['codigo']; 
$termos = "WHERE cd_usuario = $codigo";
$atualizar = new atualizar;
$atualizar->Query($tb_banco, $dados, $termos);
$_SESSION[$sessao] = $dado;
?>
<script type='text/javascript'>
	window.setTimeout("location='../usuario.php#dados';",0000);
</script>

