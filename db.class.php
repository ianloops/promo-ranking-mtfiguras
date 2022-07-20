<?php
	class Db{
		private $host = 'localhost';
		private $usuario = 'root';
		private $senha = '';
		private $database = 'mt_db';

		public function conecta_mysql(){
			$conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			mysqli_set_charset($conexao, 'utf8');

			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o banco de dados MySQL'.mysqli_connect_error();
			}

			return $conexao;
		}
	}
?>