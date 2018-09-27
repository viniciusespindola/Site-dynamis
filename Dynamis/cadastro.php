<!-- Cabeçalho do site -->
<?php
	include_once('header.php');
?>

	<!-- JavaScript de validação do formulário -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#formulario').validate({
				rules:{
					nome:{
						required: true,
						minlength: 5
					},
					cpf:{
						required: false,
						cpfBR: true
					},
					/*
					cnpj:{
						validar cnpj
					},
					*/
					email:{
						required: true,
						email: true
					},
					senha:{
						required: true,
						minlength: 6
					},
					confirmarsenha:{
						required: true,
						minlength: 6,
						
					},
					DDDt:{
						required: true,
						minlength: 2,
						maxlength: 2
					},
					telefone:{
						required: true,
						minlength: 8,
						maxlength: 9
					},
					DDD_alternativo:{
						minlength: 2,
						maxlength: 2
					},
					telefone_alternativo:{
						minlength: 8,
						maxlength: 9
					},
					endereco:{
						required: true,
						minlength: 5
					},
					numero:{
						required: true
					},
					cep:{
						required: true,
						minlength: 8,
						maxlength: 8
					}
				},
				messages:{
					nome:{
						required: "*Este campo é obrigatório!",
						minlength: "*Digite seu nome completo!"
					},
					cpf:{
						cpfBR: "Por favor digite um número de CPF valido!"
					},
					email:{
						required: "*Este campo é obrigatório!",
						email: "*Digite um endereço de E-mail valido!"
					},
					senha:{
						required: "*Este campo é obrigatório!",
						minlength: "*A senha deve conter no mínimo 6 caracteres!"
					},
					confirmarsenha:{
						required: "*Este campo é obrigatório!",
						minlength: "*A senha deve conter no mínimo 6 caracteres!",
						equalTo: "As senhas devem ser correspondentes!"
					},
					DDDt:{
						required: "*Este campo é obrigatório!",
						minlength: "*Digite um DDD valido!",
						maxlength: "*Digite um DDD valido!"
					},
					telefone:{
						required: "*Este campo é obrigatório!",
						minlength: "*Digite um número de telefone valido!",
						maxlength: "*Digite um número de telefone valido!"
					},
					DDD_alternativo:{
						minlength: "*Digite um DDD valido!",
						maxlength: "*Digite um DDD valido!"
					},
					telefone_alternativo:{
						minlength: "*Digite um número de telefone valido!",
						maxlength: "*Digite um número de telefone valido!"
					},
					endereco:{
						required: "*Este campo é obrigatório!",
						minlength: "*Digite um endereço valido!"
					},
					numero:{
						required: "*Este campo é obrigatório!"
					},
					cep:{
						required: "*Este campo é obrigatório!",
						minlength: "*Digite um C.E.P valido!",
						maxlength: "*Digite um C.E.P valido!"
					}
				}
			});
		});
	</script>

	<!-- Parte vermelha do fundo do cadastro -->
	<div class="fundoCadastro">
		<div class="tamanho-fundo-cadastro"></div>
	</div>	

	<!-- Container que posiciona os itens ao centro da tela -->
	<div class="container">
		
		<!-- Titulo da página -->
		<div class="row">
			<div class="col-12 my-5">
				<h1 class="display-4"><b>Faça seu Cadastro</b></h1>
			</div>
		</div>

		<!-- Formulário de cadastro -->
		<div class="row mb-5">
			
			<div class="col-sm-12 col-md-10 col-lg-8">
				<form name="form" id="formulario" method="POST" action="php/cadastrar.php" >
					<div class="form-row">
						<div class="form-group col-sm-8">
							<label for="inputNome">Nome completo:<b class="d">*</b></label>
							<input type="text" name="nome" class="form-control" id="inputNome">
						</div>

						<div class="form-group col-sm-4">
							<label for="inputCPF">CPF:</label>
							<input type="number" name="cpf" class="form-control" id="inputCPF" placeholder="Digite apenas números">
						</div>

						<div class="form-group col-sm-4">
							<label for="inputCNPJ">CNPJ:</label>
							<input type="number" name="cnpj" class="form-control" id="inputCNPJ" placeholder="Digite apenas números">
						</div>


						<div class="form-group col-sm-8">
							<label for="inputEmail">E-mail:<b class="d">*</b></label>
							<input type="email" name="email" class="form-control" id="inputEmail" placeholder="exemplo@exemplo.com">
						</div>

						<div class="form-group col-sm-6">
							<label for="inputSenha">Senha:<b class="d">*</b></label>
							<input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Mínimo 6 caracteres">
						</div>

						<div class="form-group col-sm-6">
							<label for="inputConfirmarSenha">Confirmar senha:<b class="d">*</b></label>
							<input type="password" name="confirmarsenha" class="form-control" id="inputConfirmarSenha" placeholder="Mínimo 6 caracteres">
						</div>

						<div class="form-group col-sm-1">
							<label for="inputDDD">DDD:<b class="d">*</b></label>
							<input type="number" name="DDDt" class="form-control" id="inputDDD" maxlength="2">
						</div>

						<div class="form-group col-sm-5">
							<label for="inputTelefone">Telefone:<b class="d">*</b></label>
							<input type="number" name="telefone" class="form-control" id="inputTelefone" maxlength="9">
						</div>
						
						<div class="form-group col-sm-1">
							<label for="inputAlDDD">DDD:</label>
							<input type="number" name="DDD_alternativo" class="form-control" id="inputAlDDD" maxlength="2">
						</div>

						<div class="form-group col-sm-5">
							<label for="inputTalternativo">Telefone Alternativo:</label>
							<input type="tel" name="telefone_alternativo" class="form-control" id="inputTalternativo" maxlength="9">
						</div>

						<div class="form-group col-sm-10">
							<label for="inputEndereco">Endereço:<b class="d">*</b></label>
							<input type="text" name="endereco" class="form-control" id="inputEndereco" >
						</div>

						<div class="form-group col-sm-2">
							<label for="inputNumero">Número:<b class="d">*</b></label>
							<input type="number" name="numero" class="form-control" id="inputNumero" >
						</div>

						<div class="form-group col-sm-5">
							<label for="inputComplemento">Complemento:</label>
							<input type="text" name="complemento" class="form-control" id="inputComplemento">
						</div>

						<div class="form-group col-sm-7">
							<label for="inputCEP">C.E.P.:<b class="d">*</b></label>
							<input type="number" name="cep" class="form-control" id="inputCEP" placeholder="Digite apenas números">
						</div>

						<p class="text-muted"><b class="d">*</b> obrigatório</p>
						
						<div class="form-row col-lg-12 my-2">
							<div class="form-group col-sm-6">
								<button type="submit" name="enviar" class="form-control btn btn-white" id="inputSobrenome">Enviar</button>
							</div>

							<div class="form-group col-sm-6">
								<button type="reset" name="reset" class="form-control btn btn-white" id="inputSobrenome">Limpar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			
		</div>

	</div>

<!-- Rodapé do site -->
<?php
	include_once('footer.php');
?>