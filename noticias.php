<link rel="stylesheet" type="text/css" href="css/navbar.css" />

<?php 
	include("inc/topo.php");
	include("xmlnoticias.php");

	
?>
	<div id="noticiaCapa" align="center">
		<h1><?=$elpais->title;?></h1>
		<img src="<?=$imgelpais->url?>">
	</div>
	

	

<?php 
	include("inc/rodape.php");

?>