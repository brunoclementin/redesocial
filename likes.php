<?php
include_once("processos/dao.likes.php");


$like = $_POST["likeup"];
$idpost = $_POST["post"];
$iduser = $_POST["userid"];

$likepost = new likesDao;

?>