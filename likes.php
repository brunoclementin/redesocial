<?php
include_once("processos/dao.likes.php");
session_start();

$like = $_POST["likeup"];
$idpost = $_POST["post"];
$iduser = $_POST["userid"];
$contador = $_POST["contador"];
$idfk = $_POST["userfk"];
$likeid = $_POST["likeid"];

$likepost = new likesDao;

if($contador < 1 && $iduser == $_SESSION["usuario"]){
    $contador = $contador + 1;
    $like = array($idpost,$iduser,$contador);
    $sucesso = $likepost->IncluiLike($like);
    if($sucesso){
        header("Location: feed.php");
        exit();
    }else{
        header("Location: feed.php?erro". $likepost->Mensagem);
    }
}

   elseif($contador > 0 &&  $iduser == $_SESSION["usuario"]){
        $contador = $contador +1;
        $curtir = array($contador, $likeid);
        $sucesso = $likepost->LikeUpdate($curtir);
            if($sucesso){
                header("Location: feed.php");
                exit();

            }else{
                    header("Location: feed.php?erro". $likepost->Mensagem);
                }
    }


?>