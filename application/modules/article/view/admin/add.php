<?php include ("layouts/aheader.php"); 
?>
		<form action="/article/admin/confirm" method="post" >
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj aktualność</th>		
				</tr>
				<tr>
					<td class="left">Tytuł:</td><td class="right"><input class="itext" type="text" id="title" name="title" value="" /></td>
				</tr>
				<tr>
					<td class="left">Data:</td><td class="right"><input class="itext_short" type="text" id="datepicker" name="date_published" value="<?php echo $this->date; ?>" /></td>
				</tr>
				<tr>
					<td class="left">Treść:</td><td class="right"><textarea id="text" name="body" cols="40" rows="15"></textarea></td>
				</tr>
				<tr>
					<td class="left">Publikuj:</td><td class="right"><input type="checkbox" id="is_published" name="is_published" /></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/article/admin" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
						<input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
					</td>
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); ?>
