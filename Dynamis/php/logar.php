<meta charset="utf-8">
<?php 
error_reporting(E_ALL ^ E_NOTICE);
header("content-type: text/html;charset=utf-8");
session_start();
require_once('../config/config.inc.php');


$postEmail = $_POST['email'];
$postSenha = md5($_POST['senha']);

$ler = new ler;
$ler->Query("*", "tb_usuario","where nm_email = '$postEmail' and nm_senha = '$postSenha'");
$ler->getResultados();

$codigo = $ler->getResultados()[0]['cd_usuario'];
$nome = $ler->getResultados()[0]['nm_usuario'];
$cpf = $ler->getResultados()[0]['cd_cpf'];
$cnpj = $ler->getResultados()[0]['cd_cnpj'];
$email = $ler->getResultados()[0]['nm_email'];
$senha = $ler->getResultados()[0]['nm_senha'];
$endereco = $ler->getResultados()[0]['nm_endereco'];
$numero = $ler->getResultados()[0]['nm_numero'];
$complemento = $ler->getResultados()[0]['nm_complemento'];
$cep = $ler->getResultados()[0]['cd_cep'];

$ler->Query("*", "tb_contato","where cd_usuario = '$codigo'");
$ler->getResultados();

$telefone = $ler->getResultados()[0]['cd_telefone'];
$telefone_alternativo = $ler->getResultados()[0]['cd_telefone_alt'];




if ($ler->getResultados()) {
	$_SESSION['ERROLOGIN'] = false;
	$_SESSION['login'] = true;
	$_SESSION['codigo'] = $codigo;
	$_SESSION['nome'] = $nome;
	$_SESSION['cpf'] = $cpf;
	$_SESSION['cnpj'] = $cnpj;
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;
	$_SESSION['telefone'] = $telefone;
	$_SESSION['telefone_alternativo'] = $telefone_alternativo;
	$_SESSION['endereco'] = $endereco;
	$_SESSION['numero'] = $numero;
	$_SESSION['complemento'] = $complemento;
	$_SESSION['cep'] = $cep;

	?>
			<script type='text/javascript'>
				window.setTimeout("location='../usuario.php';",0000);
			</script>
	<?php
}
else{
		$_SESSION['ERROLOGIN'] = true;
		
	?>
			<script type='text/javascript'>
				window.setTimeout("location='../login.php';",0000);
			</script>
	<?php
}

/*
$termos = "cd_usuario = 3";
$excluir = new deletar;
$excluir->Query("usuarios", $termos);
echo "{$excluir->getResultados()} Resultado(s) Excluido(s)";

$dados = "nm_usuario = 'Sonia Albuquerque'";
$termos = "WHERE cd_usuario = 2";
$atualizar = new atualizar;
$atualizar->Query("usuarios", $dados, $termos);
echo "{$atualizar->getResultados()} Resultado(s) Atulizado(s)";

$ler = new ler;
$ler->Query("*", "usuarios",/*Essa é opcional*//*"where cd_usuario = 1");
$ler->getResultados();
echo "<pre>";
print_r($ler->getResultados());

$criar = new criar;
$criar->Query("usuarios", "nm_usuario, nm_email, nm_senha", "'Marco Antonio','marcoantonio@hotmail.com','".md5($postSenha)."'");
$criar->getResultados();
echo "<pre>";
print_r($criar->getResultados());
*/
?>

