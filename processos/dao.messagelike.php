<?php

	include_once ("inc/conexao.php");

	
	class LikesDAO extends Conexao{
		public $Mensagem = "";
		
		//To show Like or Unlike from message_like table based on message ID.
		function likeID($like){
			$comando = $this->prepare("SELECT like_id FROM message_like 
										WHERE id_fk = ? and msg_id_fk = ? ");
			try{
				$comando->execute($like);
			   return true;
			   }
			catch(Exception $e) {
				$this->Mensagem = $e->getMessage();
				return false;
			}
				if(count($resultado)>=1){
					$usu = $resultado[0];
				}
			}
		
		
		/*This code will display likes users details from users and message_like tables based on message ID. 
		function likeDetails($details){
			$comando = $this->prepare("SELECT U.username,U.uid FROM message_like M, users U 
										WHERE U.uid=M.uid_fk AND M.msg_id_fk='?' LIMIT 3");
			try{
				$comando->execute($details);
			}
		}*/	
	}
?>