<?php
	session_start();
	$_SESSION['erro']='';

	require_once('assets/functions/db.class.php');

	$cpf =  $_POST['cpf'];
	$senha = md5($_POST['senha']);
	
	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";

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
			$_SESSION['cpf'] = $dados_usuario['cpf'];
			$_SESSION['data_nasc'] = $dados_usuario['data_nasc'];
			$_SESSION['num_residencia'] = $dados_usuario['num_residencia'];
			$_SESSION['rua'] = $dados_usuario['rua'];
			$_SESSION['bairro'] = $dados_usuario['bairro'];
			$_SESSION['cidade'] = $dados_usuario['cidade'];
			$_SESSION['uf'] = $dados_usuario['uf'];
			$_SESSION['telefone'] = $dados_usuario['telefone'];
			$_SESSION['email'] = $dados_usuario['email'];
			$_SESSION['cep'] = $dados_usuario['cep'];
			$_SESSION['senha'] = $dados_usuario['senha'];
			
			header('Location: home.php');
		}
	}
?>