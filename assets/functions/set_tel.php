<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}
	require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
	$telefone = $_POST['telefone'];

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "UPDATE usuario SET telefone = '$telefone' WHERE id_usuario = '$id_usuario'";

	if(mysqli_query($link, $sql)){

		$_SESSION['telefone'] = $telefone;
		
		header('Location: ../../account.php?changed=4');
	} else{
		echo 'Erro ao alterar o endereço!';
	}
?>