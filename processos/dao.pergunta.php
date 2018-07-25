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
		
		 function ListarDataHora1(){
			$resultado = $this->query("SELECT perguntas, CURDATE(), TIME('07:00:00') FROM pergunta  LIMIT 1 ");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$pergunta = $resultado->fetchAll();
			
			return $pergunta;
		}
		
		function ListarDataHora2(){
			$resultado = $this->query("SELECT perguntas, CURDATE(), TIME('13:00:00') FROM pergunta  LIMIT 1 ");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$pergunta = $resultado->fetchAll();
			
			return $pergunta;
		}
		
		function ListarDataHora3(){
			$resultado = $this->query("SELECT perguntas, CURDATE(), TIME('19:00:00')  FROM pergunta  LIMIT 1 ");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$pergunta = $resultado->fetchAll();
			
			return $pergunta;
		}
		
		function ListarDataHora4(){
			$resultado = $this->query("SELECT perguntas, CURDATE(), TIME('23:00:00') FROM pergunta  LIMIT 1 ");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$pergunta = $resultado->fetchAll();
			
			return $pergunta;
		} 
		
	/*	function ListarDataHora1($codigo){
			$comando = $this->prepare("SELECT perguntas, CURDATE() FROM pergunta WHERE TIME = (?) ");
			
			try{
				$comando->execute(array($codigo));
				$comando->setFetchMode(PDO::FETCH_ASSOC);
				$resultado = $comando->fetchAll();
				
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
			}
								
			$cat = null;
			if (count($resultado)==1){
				$cat = $resultado[0];			
		}
			return $cat;
		
	}
		function ListarDataHora2($codigo){
			$comando = $this->prepare("SELECT perguntas, CURDATE() FROM pergunta WHERE TIME = (?) ");
			
			try{
				$comando->execute(array($codigo));
				$comando->setFetchMode(PDO::FETCH_ASSOC);
				$resultado = $comando->fetchAll();
				
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
			}
								
			$cat = null;
			if (count($resultado)==1){
				$cat = $resultado[0];			
		}
			return $cat;
		
	}
		function ListarDataHora3($codigo){
			$comando = $this->prepare("SELECT perguntas, CURDATE() FROM pergunta WHERE TIME = (?) ");
			
			try{
				$comando->execute(array($codigo));
				$comando->setFetchMode(PDO::FETCH_ASSOC);
				$resultado = $comando->fetchAll();
				
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
			}
								
			$cat = null;
			if (count($resultado)==1){
				$cat = $resultado[0];			
		}
			return $cat;
		
	}
		function ListarDataHora4($codigo){
			$comando = $this->prepare("SELECT perguntas, CURDATE() FROM pergunta WHERE TIME = (?) ");
			
			try{
				$comando->execute(array($codigo));
				$comando->setFetchMode(PDO::FETCH_ASSOC);
				$resultado = $comando->fetchAll();
				
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
			}
								
			$cat = null;
			if (count($resultado)==1){
				$cat = $resultado[0];			
		}
			return $cat;
		
	}
	
	*/
	}
?>