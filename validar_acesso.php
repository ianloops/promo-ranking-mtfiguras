<?php
	session_start();

	require_once('db.class.php');

	$cpf =  $_POST['cpf'];
	$senha = md5($_POST['senha']);
	
	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "SELECT id_usuario, nome, email FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";

	$resultado_id = mysqli_query($link, $sql);

	if(!$resultado_id){
		echo 'Erro no sistema, favor entrar em contato com o administrador do site';
	} else{
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(!isset($dados_usuario['id_usuario'])){
			header('Location: index.php?erro=1');
		} else {
			$_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];
			
			header('Location: home.php');
		}
	}
?>