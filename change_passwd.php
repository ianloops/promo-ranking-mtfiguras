<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}
	$erro_passwd = isset($_GET['erro_passwd']) ? $_GET['erro_passwd'] : 0;
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
	    		<h3>Alterar Senha</h3>
	    		<br />
				<form method="post" action="assets/functions/set_passwd.php" id="formPasswd">
					
					<div class="form-group">
						<label>Senha Atual</label>
						<input type="password" class="form-control" id="senha_atual" name="senha_atual" placeholder="Senha Atual" required>
						<?php
							if($erro_passwd==2){
								echo '<font style="color:#F00"> Senha atual incorreta </font>';
							}
						?>
					</div>

                    <div class="form-group">
						<label>Nova Senha</label>
						<input type="password" class="form-control" id="nova_senha" name="nova_senha" placeholder="Nova Senha" required>
					</div>

                    <div class="form-group">
						<label>Confime a Nova Senha</label>
						<input type="password" class="form-control" id="confirma_nova_senha" name="confirma_nova_senha" placeholder="Confirme a Nova Senha" required>
						<?php
							if($erro_passwd==1){
								echo '<font style="color:#F00"> A senhas não conferem </font>';
							}
						?>
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
	</body>
</html>