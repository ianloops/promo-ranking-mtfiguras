<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
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
	
		<script>
			// código javascript

			$(document).ready(function(){
				$('#btn_login').click(function(){

					var campo_vazio = false;

					if($('#campo_cpf').val() == ''){
						$('#campo_cpf').css({'border-color':'#A94442'});
						campo_vazio = true;
					} else{
						$('#campo_cpf').css({'border-color':'#CCC'});
					}
					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color':'#A94442'});
						campo_vazio = true;
					} else{
						$('#campo_senha').css({'border-color':'#CCC'});
					}
					if(campo_vazio){
						return false;
					}
				})
			});
		</script>
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
	          <img src="imagens/logo.jpeg" style="height: 50px; width: 50px;"/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
			  	<li><a href="ranking.php">Ranking</a></li>
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
	            <li class="<?=$erro==1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_cpf" name="cpf" placeholder="CPF" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>
							<?php
								if($erro==1){
									echo '<font color="#F00">CPF e/ou senha inválido(s)</font>';
								}
							?>
						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Promoção Cards Premiados</h1>
	        <p>Regulamento</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>