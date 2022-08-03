<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
	$senha_atual = md5($_POST['senha_atual']);
	$nova_senha = md5($_POST['nova_senha']);
	$confirma_nova_senha = md5($_POST['confirma_nova_senha']);

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	if($nova_senha!=$confirma_nova_senha){
		header('Location: change_passwd.php?erro_passwd=1');
		die();
	}

	$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' AND senha= '$senha_atual'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(!isset($dados_usuario['senha'])){
			header('Location: change_passwd.php?erro_passwd=2');
			die();
		}
	} else {
		echo 'Erro ao tentar localizar o registro de senha';
	}


	$sql = "UPDATE usuario SET senha = '$nova_senha' WHERE id_usuario = '$id_usuario'";

	if(mysqli_query($link, $sql)){

		$_SESSION['senha'] = $senha;
		
		header('Location: ../../account.php?changed=3');
	} else{
		echo 'Erro ao alterar a senha!';
	}
?>