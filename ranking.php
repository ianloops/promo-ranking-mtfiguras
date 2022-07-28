<!DOCTYPE HTML>
<html lang="pt">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ranking - MT Figuras e Cards</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/styles/styles.css">

		<script type="text/javascript">
			$(document).ready(function(){
				function atualizaRanking(){
					$.ajax({
						url :'get_ranking.php',
						success: function(data){
							$('#ranking').html(data);
						}
					})
				}

				atualizaRanking();
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
	          <img src="assets/images/logo.jpeg" style="height: 10%; width: 10%;"/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
			 	<li><a href="index.php">Início</a></li>
	            <li><a href="inscrevase.php">Inscreva-se</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

		
	    <div class="container">
			<div class="jumbotron">
				
					<h2>Ranking</h2>
					<table border="1" id="ranking">
						<tr>
						<th>Posição</th>
						<th>Nome</th>
						<th>Nº de Códigos</th>
						</tr>
					</table>
			</div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>