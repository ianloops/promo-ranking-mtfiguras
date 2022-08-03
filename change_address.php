<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
	          <img src="assets/images/logo.jpeg" style="height: 10%; width: 10%;"/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
				<li><a href="home.php">Início</a></li>
				<li><a href="account.php">Minha Conta</a></li>
				<li><a href="ranking.php">Ranking</a></li>
	        	<li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Alterar Endereço</h3>
	    		<br />
				<form method="post" action="assets/functions/set_address.php" id="formAddress">

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
					
					<button type="submit" class="btn btn-primary form-control">Alterar</button>
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