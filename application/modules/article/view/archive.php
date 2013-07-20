<?php 
	include ("layouts/header.php"); 
	
?>
<?php 
	if(!$this->articles->isNull()) {
		echo "<h2>Archiwum</h2>";
		echo "<ul>";
		$articles = $this->articles->toArray();	
		foreach($articles as $article) {
			list($year, $month) = explode("-", $article['date']);
?>
		<li><a href="/article/showArchive/month/<?php echo $month."/year/".$year; ?>" ><?php echo DateFormat::format($article['date']); ?></a></li>
			
<?php 
		}
		echo "</ul>";
	} else 
		echo "<h3>Archiwum jest puste</h3>";
	include ("layouts/footer.php"); ?>
