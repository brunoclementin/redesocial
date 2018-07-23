<?php 
	include_once("inc/conexao.php");


	class PerguntaDAO extends Conexao{
		public $Mensagem = "";
	
	
		function ListarPergunta(){
			$resultado = $this->query("SELECT * FROM pergunta ORDER BY data");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$lista = $resultado->fetchAll();
			
			return $lista;
		}
	
	
	}
?>