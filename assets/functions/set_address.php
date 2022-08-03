<?php
    session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}
	require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
	$cep = $_POST['cep'];
	$uf = $_POST['uf'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$num_residencia = $_POST['num_residencia'];

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "UPDATE usuario SET cep = '$cep', uf = '$uf', cidade = '$cidade', bairro = '$bairro', rua = '$rua', num_residencia = '$num_residencia' WHERE id_usuario = '$id_usuario'";

	if(mysqli_query($link, $sql)){

		$_SESSION['num_residencia'] = $num_residencia;
        $_SESSION['rua'] = $rua;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['cidade'] = $cidade;
        $_SESSION['uf'] = $uf;
        $_SESSION['cep'] = $cep;
		
		header('Location: ../../account.php?changed=1');
	} else{
		echo 'Erro ao alterar o endereço!';
	}
?>