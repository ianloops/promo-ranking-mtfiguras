<?php
	require_once('db.class.php');

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "SELECT * FROM usuarios";

	$resultado_id = mysqli_query($link, $sql);

	if(!$resultado_id){
		echo 'Erro no sistema, favor entrar em contato com o administrador do site';
	} else{
		$dados_usuario = array();
		while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$dados_usuario[] = $linha;
		}
		foreach ($dados_usuario as $usuario) {
			echo $usuario['email']	;
			echo '<br><br>';
		}
	}
?>