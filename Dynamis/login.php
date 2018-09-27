<!-- Cabeçalho do site -->
<?php
	include_once('header.php');
?>

	<script type="text/javascript">
			document.getElementById('agende').style.display = "block";
	</script>

	<!-- JavaScript de validação do formulário -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#formulario').validate({
				rules:{
					email:{
						required: true,
						email: true
					},
					senha:{
						required: true,
						minlength: 6
					}
				},
				messages:{
					email:{
						required: "*Este campo é obrigatório!",
						email: "*Digite um endereço de E-mail valido!"
					},
					senha:{
						required: "*Este campo é obrigatório!",
						minlength: "*A senha deve conter no mínimo 6 caracteres!"
					}
				}
			});
		});
		$(document).ready(function() {
			$('#formularioModal').validate({
				rules:{
					email:{
						required: true,
						email: true
					}
				},
				messages:{
					email:{
						required: "*Este campo é obrigatório!",
						email: "*Digite um endereço de E-mail valido!"
					}
				}
			});
		});
	</script>

	
	<!-- Parte vermelha do fundo do login -->
	<div class="fundoLogin">
		<div class="tamanho-fundo-login"></div>
	</div>
	
	<!-- Container que posiciona os itens ao centro da tela -->
	<div class="container">
		
		<!-- Titulo da página -->
		<div class="row">
			<div class="col-12 my-5">
				<h1 class="display-4"><b>Faça seu Login</b></h1>
			</div>
		</div>
		
		<!-- Formulário de login -->
		<div class="row  mb-5">
			<div class="col-sm-12 col-md-10 col-lg-8">
				<form name="formulario" id="formulario" method="POST" action="php/logar.php" >
					<div class="form-row">
						<div class="form-group col-sm-7">
							<label for="inputEmail">E-mail:</label>
							<input type="email" name="email" class="form-control" id="inputEmail">
						</div>

						<div class="form-group col-sm-7">
							<label for="inputSenha">Senha:</label>
							<input type="password" name="senha" class="form-control" id="inputSenha">
						</div>
						<div class="form-row col-lg-7">
							<div class="form-group col-sm-6">
								<button type="submit" name="enviar" class="form-control btn btn-white" >Enviar</button>
							</div>

							<div class="form-group col-sm-6">
								<button type="reset" name="reset" class="form-control btn btn-white">Limpar</button>
							</div>
						</div>
	
						<div class="form-row col-lg-7">
							<div class="form-group col-sm-5">
								<p><a href="#" class="text-muted" data-toggle="modal" data-target="#esqueceuSenha">Esqueci minha senha</a></p>
							</div>

							<div class="form-group col-sm-7">
								<p class="text-muted">Não tem uma conta? <a href="cadastro.php" class="d">Crie uma!</a></p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>


	<div class="modal fade" id="esqueceuSenha" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h6 class="modal-title">Esqueci minha senha:</h6>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				
				<div class="modal-body">
					<form name="formulario" id="formularioModal" method="POST" action="exemplo.html">
						<label for="esqueciEmail" class="">E-mail:</label>
						<input type="email" id="esqueciEmail" name="email" class="form-control" placeholder="Obs: Digite seu E-mail já cadastrado">
						<p class="text-muted"></p>
				</div>
				<div class="modal-footer">
					<p class="text-muted mr-auto">Não tem uma conta? <a href="cadastro.html" class="d">Crie uma!</a></p>

					<button type="submit" class="btn btn-outline-white">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- Rodapé do site -->
<?php
	include_once('footer.php');
?>