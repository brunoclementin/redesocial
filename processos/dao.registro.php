<?php
	include_once("inc/conexao.php");
	

	class RegistroDAO extends Conexao{
		public $Mensagem = "";
		
		function BuscarEmail($email){
			$comando = $this->prepare("SELECT * FROM users WHERE email= ?");
			
			try{
				$param = array($email);
				$comando->execute($param);
				$comando->setFetchMode(PDO::FETCH_ASSOC);
				$resultado = $comando->fetchAll();
				
			
			}catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return null;
			}
			$usu = null;
			if(count($resultado)>=1){
				$usu = $resultado[0];
				
			}
			
			return $usu;
		}
		
		function Registrar($usuario){
		$comando = $this->prepare("INSERT INTO users (nome,email,password,data) VALUES (?,?,?,now())");
		try{
			$comando->execute($usuario);
			return true;
		}
		catch(Exception $e){
			$this->Mensagem = $e->getMessage();
			return false;
		}
	}
		
		
		
		function Logar($usuario){
			$comando = $this->prepare("SELECT * FROM users WHERE email = ?, password = ?");
			try{
				$comando->execute(array($usuario));
				$comando->setFetchMode(PDO::FETCH_ASSOC);
				$resultado = $comando->fetchAll();
				
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
			$usu = null;
			if(count($resultado) == 1){
				$usu = $resultado[0];
			}
			
			return $usu;
		}
	}

?>