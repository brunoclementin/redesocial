<?php
include_once("inc/conexao.php");


class likesDao extends Conexao {
    public $Mensagem = "";

    function IncluiLike($incluir){
        $comando = $this->prepare("INSERT INTO message_like (msg_id_fk, id_fk, created) VALUES (?,?,?)");

        try{
            $comando->execute($incluir);
            return true;
        }
        catch(Exception $e){
            $this->Mensagem = $e->getMessage();
            return false;
        }
    }

    function DeleteLike($deletelike){
        $comando = $this->prepare("DELETE FROM message_like WHERE like_id = ?");

        try{
            $comando->execute($deletelike);
            return true;
        }
        catch(Exception $e){
            $this->Mensagem = $e->getMessage();
            return false;
        }
                          }

    function ListarLike(){
        $resultado= $this->query("SELECT * FROM message_like");
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $lista = $resultado->fetchAll();

        return $lista;
    }

    function CountLike(){
        $resultado = $this->query("SELECT COUNT(like_id) FROM message_like");
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $likenumber = $resultado->fetchAll();

        return $likenumber;
    }

    function LikeUpdate($likeupdate){
        $comando = $this->prepare("UPDATE message_like SET created = ? WHERE like_id = ?");

        try{
            $comando->execute($likeupdate);
            return true;
        }
        catch(Exception $e){
            $this->Mensagem = $e->getMessage();
			return false;
        }
    }

	function IncreaseLike($increaselike){
		$comando = $this->prepare("UPDATE message_like SET like_count = like_count+1
									WHERE msg_id_fk = ?");
		try{
			$comando->execute($increaselike);
			return true;
		}
		catch(Exception $e){
			$this->Mensagem = $e->getMessage();
			return false;
		}
	}

	function SelectQuery(){
		$resultado = $this->query("SELECT id_post, texto, likes FROM posts");
		$resultado->setFetchMode(PDO::FETCH_ASSOC);
        $lista = $resultado->fetchAll();

        return $lista;
	}

	function verificar_clicado($id_post, $id_user){
		$resultado = $this->query("SELECT like_id FROM message_like
									WHERE id_fk = ? AND msg_id_fk = ?");
		return($resultado >= 1) ? true : false;
	}

	function adicionar_click($id_post, $id_user){
		$comando = $this->prepare("UPDATE posts SET likes+1 WHERE id_post = ?");
		if($comando){
			$inserirlike = prepare("INSERT INTO likes (id_user, id_post) VALUES ('?','?')");
			if($inserirlike){
				return true;
			}else{
				return false;
			}
			}
		}

	function retornar_likes($id_post){
		$resultado = $this->query("SELECT likes FROM posts WHERE id_post = ?");
		$fetch_likes = $resultado;
		return $fetch_likes->likes;
	}

	}
?>