<?php 
	include ("layouts/aheader.php"); 
	$content = $this->content;
?>
			<form action="/content/admin/confirm" method="post" >
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Edycja treść</th>		
				</tr>
				<tr>
					<td class="left">Tytuł:</td>
					<td class="right"><input class="itext" type="text" id="title" name="title" value="<?php echo $content[0]['title']; ?>" /></td>
				</tr>

				<tr>
					<td class="left">Treść:</td>
					<td class="right">
						<textarea id="text" name="text" cols="40" rows="15"><?php echo $content[0]['text']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="cntr"><input class="button" type="submit" id="submit" name="submit" value="Zapisz" />
				<input type="hidden" id="id_content" name="id_content" value="<?php echo $content[0]['id_content']; ?>" /></td>
				</tr>
			</table>		
			</form>
<?php include ("layouts/afooter.php"); ?>
