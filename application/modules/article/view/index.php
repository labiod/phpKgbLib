<?php 
	include ("layouts/header.php"); 
	
?>
<?php 
	if(!$this->articles->isNull()) {
		$articles = $this->articles->toArray();	
		foreach($articles as $article) {
			$newBody = "";
			$isTrim = Utilities::trimParagraph($article['body'], $newBody, 1000);
?>
		<div class="article">
			<h2><?php echo $article['title']; ?></h2>
			<span class="date"><?php echo DateFormat::format($article['date']); ?></span>
			<div class="akapit" >
				<?php echo $newBody; ?>		
			</div>
			<?php if($isTrim) {?>
			<span class="readMore"><a href="/article/show/id/<?php echo $article['id_article']; ?>" >Czytaj dalej &gt;&gt;</a></span>
			<?php }?>
		</div>
<?php 
		}
	} else {
?>
<div class="article"><h3 class="message">Brak aktualności</h3></div>
<?php 
	}
	
	include ("layouts/footer.php"); ?>