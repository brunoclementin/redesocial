<?php 
	include("inc/topo.php");
	include("xmlnoticias.php");

	
?>
<link rel="stylesheet" href="css/grid.css"/>

	<section id="primeirasNoticias">
	<div class="container-grid">

		<!--uma coluna-->
		<div class="row">
			<div class="col">
				<div class="col1">
						<a href="<?=$elpais->link;?>"><h1><?=$elpais->title;?></h1>
						<img src="<?=$imgelpais->url?>"></a>
				</div>
			</div>
		</div>
	
		<!--duas colunas
		<div class="row">
			<div class="col col-2">
				<div class="teste">col col-2</div>
			</div>
			<div class="col col-2">
				<div class="teste">col col-2</div>
			</div>
		</div>-->
		
		<!--três colunas
		<div class="row">
			<div class="col col-3">
				<div class="teste">col col-3</div>
			</div>
			<div class="col col-3">
				<div class="teste">col col-3</div>
			</div>
			<div class="col col-3">
				<div class="teste">col col-3</div>
			</div>
		</div>-->
		
		<!--quatro colunas-->
		<div class="row">
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$idg->link;?>"><h1><?=$idg->title;?></h1>
						<img src="<?=$imgidg->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$g1->link;?>"><h1><?=$g1->title;?></h1>
						<img src="<?=$imgg1?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$bbc->link;?>"><h1><?=$bbc->title;?></h1>
						<img src="<?=$imgbbc?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$dw->link;?>"><h1><?=$dw->title;?></h1>
						<img src="<?=$imgdw?>"></a>
					</article>
				</div>
			</div>
		</div>
		
				<!--quatro colunas-->
		<div class="row">
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$gazeta->link;?>"><h1><?=$gazeta->title;?></h1>
						<img src="<?=$imggazeta->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$folhasp->link;?>"><h1><?=$folhasp->title;?></h1>
						<img src="<?=$imgfolhasp->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$uol->link;?>"><h1><?=$uol->title;?></h1>
						<img src="<?=$imguol->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$cbn->link;?>"><h1><?=$cbn->title;?></h1>
						<img src="<?=$imgcbn->url?>"></a>
					</article>
				</div>
			</div>
		</div>
		
						<!--quatro colunas-->
		<div class="row">
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$wwf->link;?>"><h1><?=$wwf->title;?></h1>
						<img src="<?=$imgwwf->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$reuters->link;?>"><h1><?=$reuters->title;?></h1>
						<img src="<?=$imgreuters->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$ebc->link;?>"><h1><?=$ebc->title;?></h1>
						<img src="<?=$imgebc->url?>"></a>
					</article>
				</div>
			</div>
			<div class="col col-4">
				<div class="teste">
					<article>
						<a href="<?=$estadao->link;?>"><h1><?=$estadao->title;?></h1>
						<img src="<?=$imgestadao->url?>"></a>
					</article>
				</div>
			</div>
		</div>
		
		<!--coluna com sidebar
				<div class="row">
			<div class="col col-sidebar">
				<div class="teste">col col-4</div>
			</div>
			<div class="col col-content">
				<div class="teste">col col-4</div>
			</div>
			<div class="col col-content">
				<div class="teste">col col-4</div>
			</div>
			<div class="col col-content">
				<div class="teste">col col-4</div>
			</div>
		</div>-->
		
	</div>
	</section>
	

<?php 
	include("inc/rodape.php");

?>