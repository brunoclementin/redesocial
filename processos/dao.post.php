<?php
	
	include_once("inc/conexao.php");


	class PostDAO extends Conexao{
		public $Mensagem = "";
	
	
	
		function Postar($post){
			$comando = $this->prepare("INSERT INTO posts (user,nome,texto,email,data) VALUES (?,?,?,?,now())");
			
			try{$comando->execute($post);
				return true;
		}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
		}	
	
	}
		
}


?>