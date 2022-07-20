<?php
	session_start();

	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$codigo = $_POST['codigo'];
	$id_usuario = $_SESSION['id_usuario'];

	if($codigo == '' || $id_usuario == ''){
		die();
	}

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "INSERT INTO figurinha(id_usuario, codigo) values ($id_usuario, '$codigo')";

	mysqli_query($link, $sql);
?>