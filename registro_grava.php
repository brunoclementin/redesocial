<?php
	require_once("processos/dao.registro.php");

		$nome = $_POST["nome"];
		$email = $_POST["email_registro"];
		$senha = md5($_POST["pass_registro"]);
		$senha2 = md5($_POST["pass_repetir"]);

		$usuDAO = new RegistroDAO();		
			
		$verifica = $usuDAO->BuscarEmail($email);
		echo $verifica==null;
		echo $usuDAO->Mensagem;
		if($verifica != null){
			header("Location: index.php?erro=emailjacadastrado");
			exit();
		}

		$registro = array($nome,$email,$senha);
		if($senha == $senha2){
			
			$sucesso = $usuDAO->Registrar($registro);
			
			if($sucesso){
				header("Location: paginainicial.php");
			}
			else{
				header("Location: index.php?erro=". $usuDAO->Mensagem);
			}
		}
?>