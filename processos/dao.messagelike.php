<?php

	include_once ("inc/conexao.php");

	
	class LikesDAO extends Conexao{
		public $Mensagem = "";
		
		//To show Like or Unlike from message_like table based on message ID.
		function detectID($msg){
			$comando = $this->prepare("SELECT like_id FROM message_like 
										WHERE id_fk = ? and msg_id_fk = ? ");
			//$dados = array($idfk, $msg);
			
			$comando->execute($msg);
			$comando->setFetchMode(PDO::FETCH_ASSOC);
			$resultado= $comando->fetchAll();
			
			$idLike = null;
			
			if (count($resultado)!=0){
				$idLike = $resultado[0];
			}
			
			return $idLike;
		}

		
		function insertID($msg){ //Insere os IDs na tabela message_like
			$comando = $this->prepare("INSERT INTO message_like (msg_id_fk,id_fk) VALUES(?,?)");
			try	{$comando->execute($msg);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
		}
		
		
		function giveLike($msg){ //Dar Like caso nao tiver feito ainda
			$comando = $this->prepare("UPDATE messages SET like_count=like_count+1 WHERE msg_id= ? ");
			try{
				$comando->execute($msg);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
		}

		
		function removeLike($msg){ //Remover o Like caso ja tiver curtido
			$comando = $this->prepare("DELETE FROM message_like WHERE msg_id_fk= ? and id_fk= ? ");
			//$dados = array($msg, $idfk);
			try{
				$comando->execute($msg);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
		}

		
		function detailsWhoLiked($users, $msg){  //Pegar Nome e ID do usuário que curtiu
			$comando = $this->prepare("SELECT U.nome,U.id FROM message_like M, users U 
										WHERE U.id=M.id_fk AND M.msg_id_fk= ? LIMIT 3");
			$dados = array($users, $msg);
			
			$comando->execute($dados);
			$comando->setFetchMode(PDO::FETCH_ASSOC);
			$resultado = $comando->fetchAll();
			
			$nameAndId = null;
			
			if (count($resultado)!=0){
				$nameAndId = $resultado[0];
			}
			
			return $nameAndId;
			
			}
		}
?>