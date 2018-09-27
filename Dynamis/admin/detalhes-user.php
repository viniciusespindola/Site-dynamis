<?php
	include_once 'header-admin.php';
	require_once('../config/config.inc.php');


?>
	<h1 class="text-center my-5 text-muted display-3 font">Detalhes do Usuário</h1>
<?php
	if ($_SERVER['REQUEST_METHOD']=='GET') {
		if (isset($_GET['id'])) { 		 
				$confirme_codigo = $_GET['id'];
		}
	}
			
		$ler = new ler;
		$ler->Query("u.cd_usuario,cd_cpf,cd_cnpj, nm_usuario, nm_email,nm_endereco, nm_numero,nm_complemento,cd_cep,mes_cadastro,cd_telefone,cd_telefone_alt", "tb_usuario u"," inner join tb_contato  c on u.cd_usuario = c.cd_usuario where u.cd_usuario = $confirme_codigo");
		$ler->getResultados();
		$codigo = $ler->getResultados()[0]['cd_usuario'];
		$nome = $ler->getResultados()[0]['nm_usuario'];
		$cpf = $ler->getResultados()[0]['cd_cpf'];
		$cnpj = $ler->getResultados()[0]['cd_cnpj'];
		$email = $ler->getResultados()[0]['nm_email'];
		$endereco = $ler->getResultados()[0]['nm_endereco'];
		$numero = $ler->getResultados()[0]['nm_numero'];
		$complemento = $ler->getResultados()[0]['nm_complemento'];
		$cep = $ler->getResultados()[0]['cd_cep'];
		$mes = $ler->getResultados()[0]['mes_cadastro'];
		$telefone = $ler->getResultados()[0]['cd_telefone'];
		$telefone_alternativo = $ler->getResultados()[0]['cd_telefone_alt'];
		?>
	
	<div class="container">
		<table class="table table-striped my-4">
			<thead>
				<th>#</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>CNPJ</th>
				<th>E-mail</th>
				<th>Telefone</th>
			</thead>
			
			<tbody>
				<?php echo "<td>".$codigo."</td>"; ?>
				<?php echo "<td>".$nome."</td>"; ?>
				<?php if($cpf > 0){ ?>
				<?php echo "<td>".$cpf."</td>"; ?>
				<?php } else {
					echo "<td class='text-muted'><i>Nenhum valor encontrado</i></td>";
					}?>
				<?php if($cnpj > 0){ ?>
				<?php echo "<td>".$cnpj."</td>"; ?>
				<?php } else {
					echo "<td class='text-muted'><i>Nenhum valor encontrado</i></td>";
					}?>
				<?php echo "<td>".$email."</td>"; ?>
				<?php echo "<td>".$telefone."</td>"; ?>
			</tbody>

			<thead>
				<th>Endereço</th>
				<th>Número</th>
				<th>Complemento</th>
				<th>CEP</th>
				<th>Telefone Alternativo</th>
				<th>Mês do cadastro</th>
			</thead>

			<tbody>
				<?php echo "<td>".$endereco."</td>"; ?>
				<?php echo "<td>".$numero."</td>"; ?>
				<?php if($complemento > ""){ ?>
				<?php echo "<td>".$complemento."</td>"; ?>
				<?php } else {
					echo "<td class='text-muted'><i>Nenhum valor encontrado</i></td>";
					}?>
				<?php echo "<td>".$cep."</td>"; ?>
				<?php if($telefone_alternativo > ""){ ?>
				<?php echo "<td>".$telefone_alternativo."</td>"; ?>
				<?php } else {
					echo "<td class='text-muted'><i>Nenhum valor encontrado</i></td>";
					}?>
				<?php echo "<td>".$mes."</td>"; ?>
				
			</tbody>
		</table>
		<a href="javascript:history.back()"><p class="d text-right">Voltar</p></a>
	</div>