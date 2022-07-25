<?php

	$erro_cpf = isset($_GET['erro_cpf']) ? $_GET['erro_cpf'] : 0;
	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>MT Figuras e Cards</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/styles/styles.css">
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="assets/images/logo.jpeg" style="height: 50px; width: 50px;"/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
				<li><a href="ranking.php">Ranking</a></li>
	            <li><a href="index.php">Voltar para Home</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="post" action="registra_usuario.php" id="formCadastrarse">
					<div class="form-group">
						<label>Nome Completo</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required="requiored">
					</div>

					<div class="form-group">
						<label>Data de Nascimento</label>
						<input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
					</div>
					
					<div class="form-group">
					<label>CPF</label>
					<input type="text" name="cpf" class="form-control" id="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" title="Digite o CPF no formato nnn.nnn.nnn-nn" placeholder="CPF" maxlength="14">
					<script>
						function valida() {
							if (document.cadastro3.cpf.validity.patternMismatch) {
								alert("O CPF está incorreto");
							}
							return false;
						}
					</script>
						<?php
							if($erro_cpf){
								echo '<font style="color:#F00"> CPF já existe</font>';
							}
						?>
					</div>

					<div class="form-group">
						<label>E-mail</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
						<?php
							if($erro_email){
								echo '<font style="color:#F00"> Email já existe </font>';
							}
						?>
					</div>
					
					<div class="form-group">
						<label>Senha</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
					</div>

					<div class="form-group">
						<label>CEP</label>
						<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required maxlength="10" maxlength="9" onblur="pesquisacep(this.value);">
					</div>

					<div class="form-group">
						<label>UF</label>
						<input type="text" class="form-control" id="uf" name="uf" placeholder="UF" maxlength="2" required readonly>
					</div>
					<div class="form-group">
						<label>Cidade</label>
						<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" maxlength="40" required readonly>
					</div>
					<div class="form-group">
						<label>Bairro</label>
						<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" maxlength="40" required readonly>
					</div>
					<div class="form-group">
						<label>Rua</label>
						<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" maxlength="60" required readonly>
					</div>
					<div class="form-group">
						<label>Número da Residência</label>
						<input type="text" class="form-control" id="num_residencia" name="num_residencia" placeholder="Número da Residência" maxlength="5" required>
					</div>

					<div class="form-group">
						<label>Telefone(Whatsapp)</label>
						<input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<!-- Adicionando busca endereço por CEP -->
		<script>
    
			function limpa_formulário_cep() {
					//Limpa valores do formulário de cep.
					document.getElementById('rua').value=("");
					document.getElementById('bairro').value=("");
					document.getElementById('cidade').value=("");
					document.getElementById('uf').value=("");
			}

			function meu_callback(conteudo) {
				if (!("erro" in conteudo)) {
					//Atualiza os campos com os valores.
					document.getElementById('rua').value=(conteudo.logradouro);
					document.getElementById('bairro').value=(conteudo.bairro);
					document.getElementById('cidade').value=(conteudo.localidade);
					document.getElementById('uf').value=(conteudo.uf);
				} //end if.
				else {
					//CEP não Encontrado.
					limpa_formulário_cep();
					alert("CEP não encontrado.");
				}
			}
				
			function pesquisacep(valor) {

				//Nova variável "cep" somente com dígitos.
				var cep = valor.replace(/\D/g, '');

				//Verifica se campo cep possui valor informado.
				if (cep != "") {

					//Expressão regular para validar o CEP.
					var validacep = /^[0-9]{8}$/;

					//Valida o formato do CEP.
					if(validacep.test(cep)) {

						//Preenche os campos com "..." enquanto consulta webservice.
						document.getElementById('rua').value="...";
						document.getElementById('bairro').value="...";
						document.getElementById('cidade').value="...";
						document.getElementById('uf').value="...";

						//Cria um elemento javascript.
						var script = document.createElement('script');

						//Sincroniza com o callback.
						script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

						//Insere script no documento e carrega o conteúdo.
						document.body.appendChild(script);

					} //end if.
					else {
						//cep é inválido.
						limpa_formulário_cep();
						alert("Formato de CEP inválido.");
					}
				} //end if.
				else {
					//cep sem valor, limpa formulário.
					limpa_formulário_cep();
				}
			};

    	</script>
	
	</body>
</html>