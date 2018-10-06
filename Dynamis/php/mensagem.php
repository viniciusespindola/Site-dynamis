<meta charset="utf-8">
<?php 
header("content-type: text/html;charset=utf-8");
require_once('../config/config.inc.php');

$postNome = $_POST['nome'];
$postEmail = $_POST['email'];
$postAssunto = $_POST['assunto'];
$postMsg = $_POST['mensagem'];

$data = date("Y-m-d");

$criar = new criar;
$criar->Query("tb_msg", "nm_msg, nm_email, nm_assunto, ds_msg, dt_msg", "'$postNome','$postEmail','$postAssunto','$postMsg','$data'");
$criar->getResultados();
if ($criar->getResultados()) {
	?>
		<script type='text/javascript'>
			window.setTimeout("location='../contato.php';",0000);
		</script>
	<?php
}
else{
	echo "Não foi possivel enviar a mensagem!";
  ?>
    <script type='text/javascript'>
      window.setTimeout("location='../contato.php';",5000);
    </script>
  <?php
}
?>
