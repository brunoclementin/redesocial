<?php

require_once("processos/dao.registro.php");

function GravarArquivo() {
	if(isset($_FILES["arquivo"])){
		$ext = (new SplFileInfo($_FILES["arquivo"]["name"]))->getExtension();
		$arquivo = md5(uniqid("")) . "." .$ext;
		move_uploaded_file($_FILES['arquivo']['tmp_name'],
						  './fotos/perfil/' . $arquivo) ;
		return $arquivo;
	}
	return null;
}

$usuarioDAO = new RegistroDAO();
$foto = GravarArquivo();
//$foto = $_POST["foto"];
$alterFoto = array($foto, $_POST["usuario"]);
$sucesso = $usuarioDAO->alterarFoto($alterFoto);

	if ($sucesso){
		header("Location: feed.php?alterado=OK");
	} else {
		header("Location: perfil.php?erro=" . $usuarioDAO->Mensagem);
	}

?>
	