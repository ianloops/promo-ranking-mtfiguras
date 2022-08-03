<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}

	$changed = isset($_GET['changed']) ? $_GET['changed'] : 0;
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
			<?php
				switch ($changed){
					case 1:
						echo '<font color="#00F">Endereço alterado com Sucesso</font>';
						break;
					case 2:
						echo '<font color="#00F">E-mail alterado com Sucesso</font>';
						break;
					case 3:
						echo '<font color="#00F">Senha alterada com Sucesso</font>';
						break;
					case 4:
						echo '<font color="#00F">Telefone alterado com Sucesso</font>';
						break;
					default:
						break;
				}
			?>
            <h3>Minha Conta</h3>
	        <br />
	    	<div class="col-md-4">
				<form method="post" action="assets/functions/registra_usuario.php" id="formCadastrarse">
					<div class="form-group">
						<label>Nome Completo</label>
						<input type="text" class="form-control" id="nome" name="nome" value="<?= $_SESSION['nome'] ?>" readonly>
					</div>

					<div class="form-group">
						<label>Data de Nascimento</label>
						<input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?= $_SESSION['data_nasc'] ?>" readonly>
					</div>
					
					<div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control" id="cpf" value="<?= $_SESSION['cpf'] ?>" readonly>
					</div>

					<div class="form-group">
						<label>E-mail</label>
						<input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['email'] ?>" readonly>
					</div>
                </div>

                <div class="col-md-4">
					<div class="form-group">
						<label>CEP</label>
						<input type="text" class="form-control" id="cep" name="cep" value="<?= $_SESSION['cep'] ?>" readonly>
					</div>

					<div class="form-group">
						<label>UF</label>
						<input type="text" class="form-control" id="uf" name="uf" value="<?= $_SESSION['uf'] ?>" readonly>
					</div>
					<div class="form-group">
						<label>Cidade</label>
						<input type="text" class="form-control" id="cidade" name="cidade" value="<?= $_SESSION['cidade'] ?>" readonly>
					</div>
					<div class="form-group">
						<label>Bairro</label>
						<input type="text" class="form-control" id="bairro" name="bairro" value="<?= $_SESSION['bairro'] ?>" readonly>
					</div>
                    </div>

                    <div class="col-md-4">
					<div class="form-group">
						<label>Rua</label>
						<input type="text" class="form-control" id="rua" name="rua" value="<?= $_SESSION['rua'] ?>" readonly>
					</div>
					<div class="form-group">
						<label>Número da Residência</label>
						<input type="text" class="form-control" id="num_residencia" name="num_residencia" value="<?= $_SESSION['num_residencia'] ?>" readonly>
					</div>

					<div class="form-group">		
						<label>Telefone(Whatsapp)</label>
						<input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $_SESSION['telefone'] ?>" readonly>
					</div>
				</form>
                <label>Alterações</label>
            </div>
            
            <div class="col-md-1">
                <a href="change_address.php"><button>Alterar Endereço</button></a>
            </div>
            <div class="col-md-1">
                <a href="change_email.php"><button>Alterar E-mail</button></a>
            </div>
            <div class="col-md-1">
                <a href="change_passwd.php"><button>Alterar Senha</button></a>
            </div>
            <div class="col-md-1">
                <a href="change_tel.php"><button>Alterar Telefone</button></a>
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