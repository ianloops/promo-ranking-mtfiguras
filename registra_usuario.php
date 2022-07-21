<?php

	require_once('db.class.php');

	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$cep = $_POST['cep'];
	$num_residencia = $_POST['num_residencia'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
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

	$sql = "insert into usuario(nome, cpf, rua, bairro, cidade, uf, telefone, email, cep, senha, num_residencia) values ('$nome', '$cpf', '$rua', '$bairro', '$cidade', '$uf', '$telefone', '$email', '$cep', '$senha', '$num_residencia')";

	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
		echo "<a href='index.php' class='btn btn-info'>Página Inicial</a>";
	} else{
		echo 'Erro ao registrar o usuário!';
	}
?>