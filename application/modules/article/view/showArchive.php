<?php 
	include ("layouts/header.php"); 
	
?>
<?php 
	if(!$this->articles->isNull()) {
		$articles = $this->articles->toArray();	
		foreach($articles as $article) {
			$text = $article['body'];
?>
		<div class="article">
			<h2><?php echo $article['title']; ?></h2>
			<span class="date"><?php echo DateFormat::format($article['date']); ?></span>
			<div class="akapit" >
				<?php echo $text; ?>		
			</div>
		</div>
<?php 
		}
	} else {
?>
<div class="article"><h3 class="message">Brak artykułów</h3></div>
<?php 
	}
	
	include ("layouts/footer.php"); ?>