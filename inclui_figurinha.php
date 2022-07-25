<?php
	session_start();
	$_SESSION['erro']='';

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

	$sql = "SELECT * FROM codigos WHERE codigo = '$codigo' ";
	if($resultado_codigo = mysqli_query($link, $sql)){
		$dados_codigo = mysqli_fetch_array($resultado_codigo);
		if(isset($dados_codigo['codigo'])){
			$codigo_existe=true;
			if($dados_codigo['cadastrado']==1){
				$codigo_cadastrado=true;
			}
		} else {
			$codigo_existe=false;
		}
	} else {
		echo 'Erro ao tentar localizar o registro de codigo';
	}


	if($codigo_cadastrado || $codigo_existe==false){
		if($codigo_cadastrado){
			$_SESSION['erro'] = "Erro: Código já cadastrado";
		}
		if($codigo_existe==false){
			$_SESSION['erro'] = "Erro: Código inexistente";
		}
		header('Location: inscrevase.php');
		die();
	}

	

	$sql = "INSERT INTO figurinha(id_usuario, codigo) values ($id_usuario, '$codigo')";

	mysqli_query($link, $sql);

	$sql = "UPDATE codigos SET cadastrado=1 WHERE codigo='$codigo'";

	mysqli_query($link, $sql);
?>