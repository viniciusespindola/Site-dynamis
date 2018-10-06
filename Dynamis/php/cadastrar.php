<meta charset="utf-8">

<?php 

//Incluindo as classes do CRUD
require_once('../config/config.inc.php');

//Função para criar um novo codigo
function codigo(){
	$ler = new ler;
	$ler->Query("cd_usuario", "tb_usuario", "order by cd_usuario desc limit 1");
	$ler->getResultados();
	$codigo = $ler->getResultados()[0]['cd_usuario'];
	$resultado = $codigo + 1;
	return $resultado;
}
function mes()
{
	$mes = date("m");
	$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	$resultMesAtual = $meses[$mes - 1];
	return $resultMesAtual;
}

//Inserindo os dados digitados em variaveis
$postCodigo = codigo();
$postNome = $_POST['nome'];
$postEmail = $_POST['email'];

//conferindo se o dado foi digitado
if (isset($_POST['cpf'])) {
	$postCPF = $_POST['cpf'];	
}
else{
	$postCPF = null;
}

//conferindo se o dado foi digitado
if (isset($_POST['cnpj'])) {
	$postCNPJ = $_POST['cnpj'];
}
else{
	$postCNPJ = null;
}
$postEmail = $_POST['email'];
$postSenha = md5($_POST['senha']);
$postDDD = $_POST['DDDt'];
$postTelefone = $_POST['telefone'];

//conferindo se o dado foi digitado
if (isset($_POST['DDD_alternativo'])) {
	$postDDDAlternativo = $_POST['DDD_alternativo'];
}
else{
	$postDDDAlternativo = null;
}

//conferindo se o dado foi digitado
if (isset($_POST['telefone_alternativo'])) {
	$postTelefoneAlternativo = $_POST['telefone_alternativo'];
}
else{
	$postTelefoneAlternativo = null;
}
$postEndereco = $_POST['endereco'];
$postNumero = $_POST['numero'];

//conferindo se o dado foi digitado
if (isset($_POST['complemento'])) {
	$postComplemento = $_POST['complemento'];
}
else{
	$postComplemento = null;
}
$postCEP = $_POST['cep'];
$postMes = mes();

//Verificando no banco de dados se o E-mail ou o CPF já foi cadastrado
$ler = new ler;
$ler->Query("nm_email,cd_cpf", "tb_usuario", "where nm_email = '$postEmail' or cd_cpf = '$postCPF' limit 1");
$ler->getResultados();


//Verificando se o usuario já existe
if ($ler->getResultados()) {
	
	//Mostrando menssagem de erro caso E-mail já tenha sido cadastrado
	if ($postEmail == $ler->getResultados()[0]['nm_email']){
		echo "Email já cadastrado!";
		?>
			<script type='text/javascript'>
				window.setTimeout("window.history.back()",2500);
			</script>
		<?php
	}
	
	//Mandando menssagem de erro caso CPF já tenha sido cadastrado
	elseif ($postCPF == $ler->getResultados()[0]['cd_cpf']) {
		echo "CPF já cadastrado!";
		?>
			<script type='text/javascript'>
				window.setTimeout("window.history.back()",2500);
			</script>
		<?php
	}
	
}

//Cadastrando novo usuario caso não exista
else{

	//Verificando se o usuario preencheu os campos requeridos
	if ($postEmail != "") {

		//Inserindo dados do usuario
		$criar = new criar;
		$criar->Query("tb_usuario", "cd_usuario,nm_usuario,cd_cpf, cd_cnpj, nm_email, nm_senha, nm_endereco, nm_numero, nm_complemento, cd_cep, mes_cadastro", "'$postCodigo','$postNome','$postCPF','$postCNPJ','$postEmail','$postSenha','$postEndereco','$postNumero','$postComplemento','$postCEP','$postMes'");
		$criar->getResultados();
	}

	//Voltando usuario para tela de cadastro caso não tenha preenchido os campos
	else{
		?>
			<script type='text/javascript'>
				window.setTimeout("location='../cadastro.php';"0000);
			</script>
		<?php
	}

	//Verificando se os dados do usuario foram inseridos com sucesso
	if ($criar->getResultados()) {

		//Criando superglobais de sessão com os dados do usuario
		session_start();
		$_SESSION['codigo'] = $postCodigo;
		$_SESSION['nome'] = $postNome;
		$_SESSION['cpf'] = $postCPF;
		$_SESSION['cnpj'] = $postCNPJ;
		$_SESSION['email'] = $postEmail;
		$_SESSION['senha'] = $postSenha;
		$_SESSION['endereco'] = $postEndereco;
		$_SESSION['numero'] = $postNumero;
		$_SESSION['complemento'] = $postComplemento;
		$_SESSION['cep'] = $postCEP;


		//Inserindo dados de contato do usuario
		$criar->Query("tb_contato", "cd_usuario, cd_telefone, cd_telefone_alt", "'$postCodigo','($postDDD)$postTelefone','($postDDDAlternativo)$postTelefoneAlternativo'");
		$contato = $criar->getResultados();

		//Verificando se os dados de contato do usuario foram inseridos com sucesso
		if ($contato) {

			//Criando superglobais de sessão com os dados de contato do usuario
			$_SESSION['ddd'] = "(".$postDDD.")";
			$_SESSION['telefone'] = $postTelefone;
			$_SESSION['ddd_alternativo'] = "(".$postDDDAlternativo.")";
			$_SESSION['telefone_alternativo'] = $postTelefoneAlternativo;
			$_SESSION['login'] = true;

			//Redirecionando para pagina do usuario
			?>
					<script type='text/javascript'>
						window.setTimeout("location='../usuario.php';",0000);
					</script>
			<?php
		}
	}

	//Voltando para a pagina de cadastro caso os dados não sejam inseridos com sucesso
	else{
		?>
			<script type='text/javascript'>
				window.setTimeout("location='../cadastro.php';",0000);
			</script>
		<?php
	}
}
?>

