<?php
	
	include_once("inc/conexao.php");


	class PostDAO extends Conexao{
		public $Mensagem = "";
	
	
	
		function Postar($post){
			$comando = $this->prepare("INSERT INTO posts (texto,id_user,nome,id_pergunta,data) VALUES (?,?,?,?,now())");
			
			try{$comando->execute($post);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}	
	
		}
		
		function ListarPost(){
			$resultado = $this->query("SELECT p.*, ask.perguntas as perg FROM posts p inner join pergunta ask ON (p.id_pergunta = ask.id_per)");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$lista = $resultado->fetchAll();
			
			return $lista;
		}		
		
}
?>