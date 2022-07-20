<?php
	session_start();

	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDB = new Db();
	$link = $objDB->conecta_mysql();
	$i = 0;

	$sql = "SELECT u.nome, COUNT(f.id_figurinha) AS qtd_codigos FROM usuario AS u JOIN figurinha AS f WHERE f.id_usuario=u.id_usuario GROUP BY u.nome ORDER BY qtd_codigos DESC";

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		
		echo '<tr>
			<th>&nbspPosição&nbsp</th>
			<th>&nbspNome&nbsp</th>
			<th>&nbspNº de Códigos&nbsp</th>
			</tr>';

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$i++;
			echo '<tr>
			<td>&nbsp'.$i.'&nbsp</td>
			<td>&nbsp'.$registro['nome'].'&nbsp</td>
			<td>&nbsp'.$registro['qtd_codigos'].'&nbsp	</td>         
		  </tr>';
		}

	} else {
		echo 'Erro na consulta de figurinhas no banco de dados.';
	}
?>