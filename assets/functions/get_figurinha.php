<?php
	session_start();

	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('assets/functions/db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "SELECT codigo FROM figurinha WHERE id_usuario = $id_usuario";

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<h4 class="list-group-item-header">'.$registro['codigo'].'</h4>';
		}

	} else {
		echo 'Erro na consulta de figurinhas no banco de dados.';
	}
?>