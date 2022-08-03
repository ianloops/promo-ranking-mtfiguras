<?php
	session_start();

	unset($_SESSION['id_usuario']);
	unset($_SESSION['nome']);
	unset($_SESSION['cpf']);
	unset($_SESSION['data_nasc']);
	unset($_SESSION['num_residencia']);
	unset($_SESSION['rua']);
	unset($_SESSION['bairro']);
	unset($_SESSION['cidade']);
	unset($_SESSION['uf']);
	unset($_SESSION['telefone']);
	unset($_SESSION['email']);
	unset($_SESSION['cep']);
	unset($_SESSION['senha']);	

	header('Location: https://mtfigurinhasecards.com.br/');

?>