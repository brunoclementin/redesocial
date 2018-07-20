<?php
	session_start();
	require_once("processos/dao.registro.php");
	
	$email = $_POST["email_login"];
	$senha = ($_POST["pass_login"]);
	
	$logarDAO = new RegistroDAO();
	$logar = $logarDAO->BuscarEmail($email);
	if($logar != null){
		if(md5($senha) == $logar["password"]){
			
			$_SESSION["usuario"] = $logar["id"];
			$_SESSION["usuario.nome"] = $logar["nome"];
			$_SESSION["usuario.email"] = $logar["email"];
			
			header("Location: paginainicial.php");
			exit();
			
		}
		
	}
	$mensagem = "Login ou senha invalidos";
	header("Location: index.php?mensagem=$mensagem");
	

?>
	
	
		
		
		
	<!--	// if(isset($email) && isset($senha)){
	// $loginDAO = new RegistroDAO();
	// $login = $loginDAO->Logar($email,$senha);
	// if($login){
	// 	session_start();
	// 	$_SESSION["usuario"] = $email;
	// 	header("Location: paginainicial.php");
	// }
	// 
	
			
		
	

	

	
?>

