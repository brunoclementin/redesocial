<?php

	include_once ("inc/conexao.php");

	
	class LikesDAO extends Conexao{
		public $Mensagem = "";
		
		function queryAll(){
			$comando = $this->prepare("SELECT like_count FROM messages WHERE msg_id = ?");
			$comando->setFetchMode(PDO::FETCH_ASSOC);
			$resultado = $comando->fetchAll();
			
			return $resultado;
		}
		
		function query(){
			$comando = $this->prepare("SELECT U.username, U.uid, M.msg_id, M.message FROM users U, messages M 
										WHERE U.uid=M.uid_fk and U.uid='?'");
			$comando->setFetchMode(PDO::FETCH_ASSOC);
			$resultado = $comando->fetchAll();
			
			
			return $resultado;
		}
		
		
		//To show Like or Unlike from message_like table based on message ID.
		function detectID($idfk, $msgidfk){
			$comando = $this->prepare("SELECT like_id FROM message_like 
										WHERE id_fk = ? and msg_id_fk = ? ");
			$dados = array($idfk, $msgidfk);
			try	{$comando->execute($dados);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
			//$dados = array($idfk, $msg);	
			
			//$comando->execute($msgID);
			$comando->setFetchMode(PDO::FETCH_ASSOC);
			$resultado= $comando->fetchAll();
			
			$idLike = null;
			
			if (count($resultado)!=0){
				$idLike = $resultado[0];
			}
			
			return $idLike;
		}

		
		function buscarIdNome (){
			$resultado = $this->query("SELECT * FROM users WHERE id = ?, nome = ?");
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				$nomeID = $resultado->fetchAll();
			
				return $nomeID;
		}
		
		
		
		function buscarMessageId (){
			$resultado = $this->query("SELECT * FROM messages WHERE msg_id = ?, message = ?");
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				$messageID = $resultado->fetchAll();
			
				return $messageID;
		}
		
		
		function insertID($msg, $idfk){ //Insere os IDs na tabela message_like
			$comando = $this->prepare("INSERT INTO message_like (msg_id_fk,id_fk) VALUES(?,?)");
			$dados = array($msg, $idfk);
			
			try	{$comando->execute($dados);
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

		
		function removeLike($msg, $idfk){ //Remover o Like caso ja tiver curtido
			$comando = $this->prepare("DELETE FROM message_like WHERE msg_id_fk= ? and id_fk= ? ");
			$dados = array($msg, $idfk); //quantia de parametros vao de acordo com os valores
			try{  
				$comando->execute($dados); //execute somente recebe vetor $...
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
		}

		
		function detailsWhoLiked($msg){  //Pegar Nome e ID do usuário que curtiu
			$comando = $this->prepare("SELECT U.nome,U.id FROM message_like M, users U 
										WHERE U.id=M.id_fk AND M.msg_id_fk= ? LIMIT 3");
			$dados = array($msg);
			
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