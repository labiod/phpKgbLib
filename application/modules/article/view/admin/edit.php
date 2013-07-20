<?php include ("layouts/aheader.php"); 
$article = $this->articles->toArray();
if($article[0]['is_published'] == 1)
	$checked = "checked";
else 
	$checked = "";

?>	
		<form action="/article/admin/confirm" method="post" >
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Edytuj aktualność</th>		
				</tr>
				<tr>
					<td class="left">Tytuł:</td><td class="right"><input class="itext" type="text" id="title" name="title" value="<?php echo $article[0]['title']; ?>" /></td>
				</tr>
				<tr>
					<td class="left">Data:</td><td class="right"><input class="itext_short" type="text" id="datepicker" name="date_published" value="<?php echo $article[0]['date_published']; ?>" /></td>
				</tr>
				<tr>
					<td class="left">Treść:</td><td class="right"><textarea id="text" name="body" cols="40" rows="15"><?php echo $article[0]['body']; ?></textarea></td>
				</tr>
				<tr>
					<td class="left">Publikuj:</td><td class="right"><input type="checkbox" id="is_published" name="is_published" <?php  echo $checked; ?> /></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/article/admin" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
						<input type="submit" id="submit" name="submit" class="button" value="Edytuj" />
						<input type="hidden" name="id_article" value="<?php echo $article[0]['id_article']; ?>" />
					</td>
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); ?>
