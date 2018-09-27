<meta charset="utf-8">
<?php 
header("content-type: text/html;charset=utf-8");
session_start();
require_once('../../config/config.inc.php');


$postEmail = $_POST['email-adm'];
$postSenha = md5($_POST['senha-adm']);

$ler = new ler;
$ler->Query("*", "tb_adm","where nm_email = '$postEmail' and nm_senha = '$postSenha'");
$ler->getResultados();

if ($ler->getResultados()) {
	$_SESSION['admin'] = true;
	$_SESSION['email-adm'] = $ler->getResultados()[0]['nm_email'];
	$_SESSION['senha-adm'] = $ler->getResultados()[0]['nm_senha'];

	?>
			<script type='text/javascript'>
				window.setTimeout("location='../index.php';",0000);
			</script>
	<?php
}
else{
		session_destroy();
	?>
			<script type='text/javascript'>
				window.setTimeout("location='../admin.php';",0000);
			</script>
	<?php
}