<?php
	
	include_once("inc/conexao.php");


	class PostDAO extends Conexao{
		public $Mensagem = "";
	
	
	
		function Postar($post){
			$comando = $this->prepare("INSERT INTO posts (texto,id_user,nome,data) VALUES (?,?,?,now())");
			
			try{$comando->execute($post);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}	
	
		}
		
		function ListarPost(){
			$resultado = $this->query("SELECT * FROM posts ORDER BY data ");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$lista = $resultado->fetchAll();
			
			return $lista;
		}
		
		
		
}


?>