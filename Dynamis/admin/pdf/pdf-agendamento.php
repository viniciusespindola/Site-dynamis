<?php

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">PDF de Teste</h1>
			<p>Isto é um PDF de teste.</p>

			
		
		<div class="container">
			<table class="table table-striped my-4">
				<thead>
					<th>Nome</th>
				</thead>
				
				<tbody>
					<td></td>
				</tbody>
			</table>
		</div>
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"teste.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>