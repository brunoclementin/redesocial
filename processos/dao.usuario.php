<?php
	
	include_once("inc/conexao.php");


	class UsuarioDAO extends Conexao{
		public $Mensagem = "";
	
	
		function listarUsuario(){
			$resultado = $this->query("SELECT * FROM users");
			
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$lista = $resultado->fetchAll();
			
			return $lista;
		}
	}