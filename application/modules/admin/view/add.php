<?php include ("layouts/aheader.php"); 
?>
		<form name="promocje" action="/admin/admin/confirm" method="post" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj użytkownika</th>		
				</tr>
				<tr>
					<td class="left">Nazwa:</td><td class="right"><input class="itext" type="text" id="nazwa" name="nazwa" value="" /></td>
				</tr>
				<tr>
					<td class="left">Login:</td><td class="right"><input class="itext" type="text" id="login" name="login" value="" /></td>
				</tr>
				<tr>
					<td class="left">Hasło:</td><td class="right"><input class="itext" type="password" id="haslo" name="haslo" value="" /></td>
				</tr>
				<tr>
					<td class="left">E-mail:</td><td class="right"><input class="itext" type="text" id="email" name="email" value="" /></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr"><input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); ?>
