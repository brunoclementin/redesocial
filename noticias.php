

<?php 
	include("inc/topo.php");
	include("xmlnoticias.php");

	
?>
	<section id="primeirasNoticias">
		<div class="noticiaCapa" align="center">
			<a href="<?=$elpais->link;?>"><h1><?=$elpais->title;?></h1>
			<img src="<?=$imgelpais->url?>"></a>
		</div>
		
		<div class="noticiaCapa" align="center">
			<a href="<?=$g1->link;?>"><h1><?=$g1->title;?></h1>
			<img src="<?=$imgg1?>"></a>
		</div>
		
		<div class="noticiaCapa" align="center">
			<a href="<?=$uol->link;?>"><h1><?=$uol->title;?></h1>
			<img src="<?=$imguol?>"></a>
		</div>
		
		<div class="noticiaCapa" align="center">
			<a href="<?=$folhasp->link;?>"><h1><?=$folhasp->title;?></h1>
			<img src="<?=$imgfolhasp?>"></a>
		</div>
		
		
	</section>
	

	

<?php 
	include("inc/rodape.php");

?>