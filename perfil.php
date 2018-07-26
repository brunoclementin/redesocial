<?php
include("inc/topo.php");
require_once("processos/dao.registro.php");
?>

<?php

$foto="";

?>
		<h1>Insira sua foto</h1>

	<form action="usuario_grava.php" method="post" enctype="multipart/form-data">
		
		<div>
	<label for="foto">Foto</label>
	<input type="file" name="arquivo" id="arquivo">  
	<input type"hidden" name="foto" id="foto" value="<?=$foto?>" />
			<input type="hidden" name="usuario" value="<?=$_SESSION["usuario"]?>" />
		</div>
		
		<button type="submit">Salvar</button>
				
</form>