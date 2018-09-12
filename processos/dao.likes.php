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

    function LikeUpdate($likeupdate){
        $comando = $this->prepare("UPDATE message_like set created = ? WHERE like_id = ?");

        try{
            $comando->execute($likeupdate);
            return true;
        }
        catch(Exception $e){
            $this->Mensagem = $e->getMessage();
			return false;
        }
    }


}
?>