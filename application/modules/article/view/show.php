<?php 
	$article = $this->articles->toArray();
	include ("layouts/header.php"); 
	
?>
		<div class="article">
			<h2><?php echo $article[0]["title"]; ?></h2>
			<span class="date"><?php echo DateFormat::format($article[0]['date']); ?></span>
			<div class="akapit" >
				<?php echo $article[0]["body"];?>
			</div>	
		    
		    <a class="powrot" href="/article">&lt;&lt; Powrót</a>
		</div>
		
		
<?php 
	include ("layouts/footer.php"); ?>
	
	
	
	
