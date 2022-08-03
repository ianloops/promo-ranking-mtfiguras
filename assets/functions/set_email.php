<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}
	require_once('assets/functions/db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
	$email = $_POST['email'];

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "SELECT * FROM usuario WHERE email = '$email'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['email'])){
			header('Location: change_email.php?erro_email=1');
			die();
		}
	} else {
		echo 'Erro ao tentar localizar o registro de email';
	}

	$sql = "UPDATE usuario SET email = '$email' WHERE id_usuario = '$id_usuario'";

	if(mysqli_query($link, $sql)){

		$_SESSION['email'] = $email;
		
		header('Location: account.php?changed=2');
	} else{
		echo 'Erro ao alterar o endereço!';
	}
?>