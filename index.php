<!doctype html>
<html>
<head>	
<meta charset="utf-8">
	<link rel="stylesheet" href="css/indexlogin.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Documento sem título</title>
</head>

<body>
	<h1>Bem-Vindo(a)</h1>
	<form action="login.php" method="POST" id="login" class="log">
		<p>Login</p>
		<input type="email" name="email_login" class="field" placeholder="E-mail" required="required" />
		<input type="password" name="pass_login" class="field" placeholder="Password" required="required"/>
		<input type="submit" class="btn" value="Entrar"/>
		<a onClick="$('#registrar').fadeIn(); $('#login').hide();">Não tenho uma conta</a>
	
	</form>
	<form action="registro_grava.php" method="POST" id="registrar" class="log">
		
		<p>Criar uma conta</p>
		<input type="text" name="nome" class="field" placeholder="Nome" required="required" />
		<input type="email" name="email_registro" class="field" placeholder="E-mail" required="required" />
		<input type="password" name="pass_registro" class="field" placeholder="Password" required="required" />
		<input type="password" name="pass_repetir" class="field" placeholder="Repetir password" required="required" />
		<input type="submit" class="btn" value="Criar Conta"/>
		<a onClick="$('#login').fadeIn(); $('#registrar').hide();">Já tenho uma conta</a>	
	</form>
	<p id="credits">&copy; Freedom Mouth, <?php date_default_timezone_set('America/Sao_Paulo'); echo date("Y");?>, Todos os direitos reservados.</p>
	
</body>
</html>