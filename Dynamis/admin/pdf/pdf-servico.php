<?php
session_start();
	$codigo_serv = $_SESSION['codigo'];

	$cd_func = $_SESSION['cd_func'];
	$nm_func = $_SESSION['nm_func'];
	$hr_serv = $_SESSION['hr_serv'];
	$if_hr_serv = $hr_serv > 0 ? $hr_serv : "<i class='text-muted'>Ainda não marcado</i>";
	$dt_serv = $_SESSION['dt_serv'];
	$if_dt_serv = $dt_serv > 0 ? $dt_serv : "<i class='text-muted'>Ainda não marcado</i>";
	$mes_serv = $_SESSION['mes_serv'];

	$seg = $_SESSION['seg'];
	$tipo = $_SESSION['tipo'];
	$obs = $_SESSION['obs'];
	$frequencia = $_SESSION['frequencia'];
	$volume = $_SESSION['volume'];
	$un_medida = $_SESSION['un_medida'];
	$if_volume = $volume > 0 ? $volume.$un_medida : "<i class='text-muted'>Não necessário</i>";
	$valor = $_SESSION['valor'];
	$if_valor = $valor > 0 ? "R$".$valor : "<i class='text-muted'>Orçamento sendo realizado</i>";
	$confirmacao = $_SESSION['confirmacao'];
	$if_confirmacao = $confirmacao == 0 ? "<i class='text-muted'>Não confirmado</i>" : "<i class='text-muted'>Confirmado</i>";

	$cd_usuario = $_SESSION['pdfcd_usuario'];
	$nome = $_SESSION['pdfnome'];
	$cpf = $_SESSION['pdfcpf'];
	$if_cpf = $cpf > 0 ? $cpf : "<i class='text-muted'>Não informado</i>";
	$cnpj = $_SESSION['pdfcnpj'];
	$if_cnpj = $cnpj > 0 ? $cnpj : "<i class='text-muted'>Não informado</i>";
	$email = $_SESSION['pdfemail'];
	$endereco = $_SESSION['pdfendereco'];
	$numero = $_SESSION['pdfnumero'];
	$complemento = $_SESSION['pdfcomplemento'];
	$if_complemento = $complemento !== "" ? $complemento : "<i class='text-muted'>Não informado</i>";
	$cep = $_SESSION['pdfcep'];
	$mes = $_SESSION['pdfmes'];
	$tel = $_SESSION['pdftelefone'];
	$tel_alternativo = $_SESSION['pdftelefone_alternativo'];
	$if_tel_alternativo = $tel_alternativo > 0 ? $tel_alternativo : "<i class='text-muted'>Não informado</i>";
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
			
			<h1 style="text-align: center;">Informações de pedido de Serviço</h1>
		
			<div class="container my-5">
				
				<p>Informações do pedido de serviço.</p>

				<table class="table table-bordered">
					<thead class="bg-dark" style="color: white;">
						<tr>
							<th>Código do Serviço</th>
							<th>Código do Funcionário</th>
							<th>Nome do Funcionário</th>
							<th>Data do Serviço</th>
							<th>Hora do Serviço</th>
							<th>Segmento</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>'.$codigo_serv.'</td>
							<td>'.$cd_func.'</td>
							<td>'.$nm_func.'</td>
							<td>'.$if_hr_serv.'</td>
							<td>'.$if_dt_serv.'</td>
							<td>'.$seg.'</td>
							
							
						</tr>
					</tbody>
					<thead class="bg-dark" style="color: white;">
						<tr>
							<th>Tipo</th>
							<th>Descrição<>
							<th>Frequência</th>
							<th>Volume</th>
							<th>Valor do Serviço</th>
							<th>Confirmação</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>'.$tipo.'</td>
							<td>'.$obs.'</td>
							<td>'.$frequencia.'</td>
							<td>'.$if_volume.'</td>
							<td>'.$if_valor.'</td>
							<td>'.$if_confirmacao.'</td>
						</tr>
					</tbody>
				</table>
				
				<p class="mt-5">Informações do cliente.</p>

				<table class="table table-bordered">
					<thead class="bg-dark" style="color: white;">
						<tr>
							<th>Código do Usuário</th>
							<th>Nome</th>
							<th>CPF</th>
							<th>CNPJ</th>
							<th>E-mail</th>
							<th>Telefone</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>'.$cd_usuario.'</td>
							<td>'.$nome.'</td>
							<td>'.$if_cpf.'</td>
							<td>'.$if_cnpj.'</td>
							<td>'.$email.'</td>
							<td>'.$tel.'</td>
						</tr>
					</tbody>
					<thead class="bg-dark" style="color: white;">
						<tr>
							<th>Endereço</th>
							<th>Número</th>
							<th>Complemento</th>
							<th>CEP</th>
							<th>Telefone Alternativo</th>
							<th>Data do Cadastro</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>'.$endereco.'</td>
							<td>'.$numero.'</td>
							<td>'.$if_complemento.'</td>
							<td>'.$cep.'</td>
							<td>'.$if_tel_alternativo.'</td>
							<td>'.$mes.'</td>
						</tr>
					</tbody>
				</table>
			</div>
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"PDF_agendamento.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

?>