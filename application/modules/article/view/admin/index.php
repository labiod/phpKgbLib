<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/article/admin/add" ><img class="icon" src="/public/images/add.png" alt="Dodaj aktualność" title="Dodaj aktualność" /> Dodaj aktualność</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="30px" >Lp.</th><th width="300px">Nazwa</th><th >Autor</th><th >Data</th><th width="70px">Publikuj</th><th width="70px">Archiwum</th><th width="200px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if(!$this->articles->isNull()) {
		$author = new Table("administratorzy");
		$this->articles = $this->articles->toArray();
		foreach($this->articles as $article) {
			$thisAuthor = $author->fetchAll("id_admin = ".$article['author_id']);
			$thisAuthor = $thisAuthor->toArray();
			
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $article['title']; ?></h3></td>
				<td><?php if(sizeof($thisAuthor) > 0)echo $thisAuthor[0]['nazwa'];  else echo "-"; ?></td>
				<td><?php echo $article['date_published']; ?></td>
				<td><input type="checkbox" name="status" id="/article/admin/published/id/<?php echo $article['id_article']; ?>" <?php echo ($article['is_published'] == 1)?  "checked" : ""; ?> /></td>
				<td><input type="checkbox" name="status" id="/article/admin/archive/id/<?php echo $article['id_article']; ?>" <?php echo ($article['archive'] == 1)?  "checked" : ""; ?> /></td>
				<td><a href="/article/admin/edit/id/<?php echo $article['id_article']; ?>" ><img class="icon" src="/public/images/modify_m.png" alt="edytuj" title="edytuj" /> edytuj</a>
				<a href="/article/admin/delete/id/<?php echo $article['id_article']; ?>" name="potwierdz" id="artykuł <?php echo $article['title']; ?>" ><img class="icon" src="/public/images/delete_m.png" alt="usuń" title="usuń" /> usuń</a></td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="7" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Nie ma żadnych artykułów</td>
			</tr>
		<?php 
	}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
