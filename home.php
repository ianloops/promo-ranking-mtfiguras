<?php
	session_start();
	if(!isset($_SESSION['nome'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$id_usuario = $_SESSION['id_usuario'];

	$sql = "SELECT COUNT(*) AS qtde_figurinhas FROM figurinha WHERE id_usuario = '$id_usuario'";

	$qtde_figurinhas = 0;
	$resultado_id = mysqli_query($link, $sql);
	
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_figurinhas = $registro['qtde_figurinhas'];
	} else{
		echo 'Erro ao executar a query';
	}
?>

<!DOCTYPE HTML>
<html lang="pt">
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

		<script type="text/javascript">
			$(document).ready(function(){
				$('#btn_figurinha').click(function(){
					if($('#codigo').val().length > 0){
						$.ajax({
							url: 'inclui_figurinha.php',
							method: 'post',
							data: $('#form_figurinha').serialize(),
							success: function(data){
								$('#codigo').val('');
								atualizafigurinha();
							}
						});
					}
				});

				function atualizafigurinha(){
					$.ajax({
						url :'get_figurinha.php',
						success: function(data){
							$('#figurinhas').html(data);
						}
					})
				}

				atualizafigurinha();
			});
		</script>
		<script type="text/javascript" src="assets/js/html5-qrcode.min.js"></script>
	
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
			 	<li><a href="ranking.php">Ranking</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<div class="col-md-3">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h4><?= $_SESSION['nome'] ?></h4>

	    				<hr>
	    				<div class="col-md-6">
	    					Figurinhas<br> <?= $qtde_figurinhas ?>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="col-md-9">
	    		<div class="panel panel-default">
	    			<div class="panel-body jumbotron">
	    				<form id="form_figurinha" class="input-group">
							<?php
							if(isset($_GET['codigo'])){
								echo '<input type="text" class="form-control" placeholder="Digite o código premiado" maxlength="140" id="codigo" name="codigo" value="'.$_GET['codigo'].'">';
							} else {
								echo '<input type="text" class="form-control" placeholder="Digite o código premiado" maxlength="140" id="codigo" name="codigo" value="">';
							}
							?>
	    					<span class="input-group-btn">
								<button class="btn btn-default" id="btn_figurinha">Cadastrar</button>
								<a href="scan.php" class="btn btn-default">QR Code</a>
	    					</span>
	    				</form>
						<?php
							if($_SESSION['erro']){
								echo '<font style="color:#F00">'.$_SESSION['erro'].'</font>';
							}
						?>
	    			</div>
				
				<div class="panel-body">
					<div><h2>Meus códigos</h2><br/><br/></div>
						<div id="figurinhas" class="list-group">
							
						</div>
					</div>
				</div>
			</div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>