<?php

	require_once('db.class.php');

	session_start();

	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	$nome = $_POST['nome'];
	$data_nasc = $_POST['data_nasc'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$cep = $_POST['cep'];
	$uf = $_POST['uf'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$num_residencia = $_POST['num_residencia'];
	$telefone = $_POST['telefone'];

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$cpf_existe=false;
	$email_existe=false;

	$sql = "SELECT * FROM usuario WHERE cpf = '$cpf' ";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['cpf'])){
			$cpf_existe=true;
		}
	} else {
		echo 'Erro ao tentar localizar o registro de cpf';
	}

	$sql = "SELECT * FROM usuario WHERE email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['email'])){
			$email_existe=true;
		}
	} else {
		echo 'Erro ao tentar localizar o registro de email';
	}

	if($cpf_existe || $email_existe){
		$retorno_get = '';
		if($cpf_existe){
			$retorno_get.="erro_cpf=1&";
		}
		if($email_existe){
			$retorno_get.="erro_email=1&";
		}
		header('Location: inscrevase.php?'.$retorno_get);
		die();
	}

	$sql = "insert into usuario(nome, data_nasc, cpf, rua, bairro, cidade, uf, telefone, email, cep, senha, num_residencia) values ('$nome', '$data_nasc', '$cpf', '$rua', '$bairro', '$cidade', '$uf', '$telefone', '$email', '$cep', '$senha', '$num_residencia')";

	if(mysqli_query($link, $sql)){
		
		$sql = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";
		$resultado_id = mysqli_query($link, $sql);
		$dados_usuario = mysqli_fetch_array($resultado_id);

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
		
		header('Location: ../../home.php');
		//header('Location: index.php?cadastrado=1');
	} else{
		echo 'Erro ao registrar o usuário!';
	}
?>