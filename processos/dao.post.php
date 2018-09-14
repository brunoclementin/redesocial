<?php

	include_once("inc/conexao.php");


	class PostDAO extends Conexao{
		public $Mensagem = "";



		function Postar($post){
			$comando = $this->prepare("INSERT INTO posts (id_pergunta,texto,id_user,nome,data)
									   VALUES (?,?,?,?,now())");

			try{$comando->execute($post);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}

		}

		function ListarPost(){
			$resultado = $this->query("SELECT p.*, ask.perguntas as perg, u.foto as usuariofoto, u.nome as usuarionome,
									  u.fotocapa as usuariocapa
									  FROM posts p inner join pergunta ask ON (p.id_pergunta = ask.id_per)
									  	   inner join users u ON (p.id_user = u.id) ORDER by data ASC
									  ");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$lista = $resultado->fetchAll();

			return $lista;
		}

		function Comentar($comentar){
			$comando = $this->prepare("INSERT INTO comentarios (textocomentario,id_usuario,nome_usuario,id_post,data)
									VALUES (?,?,?,?,now())");

			try	{$comando->execute($comentar);
				return true;
			}
			catch(Exception $e){
				$this->Mensagem = $e->getMessage();
				return false;
			}
		}

		function ListarComentario(){
			$resultado = $this->query("SELECT c.*, u.foto as userfoto
										FROM comentarios c INNER JOIN users u ON
										(c.id_usuario = u.id)");
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$lista = $resultado->fetchAll();

			return $lista;
		}


}
?>