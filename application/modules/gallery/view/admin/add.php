<?php include ("layouts/aheader.php"); 
?>
		<form action="/gallery/admin/confirm" method="post" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj zdjęcie</th>		
				</tr>
				<tr>
					<td class="cntr"><input type="file" name="file" size="100" />
						
					</td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/gallery/admin" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
						<input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
					</td>
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); 
