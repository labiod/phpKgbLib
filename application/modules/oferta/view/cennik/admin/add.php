<?php include ("layouts/aheader.php"); 
?>
		<form name="skladniki" action="/oferta/admin/confirm/submodule/cennik" method="post" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj grupe cenową</th>		
				</tr>
				<tr>
					<td class="left">Nazwa grupy:</td><td class="right"><input class="itext" type="text" id="nazwa_grupy" name="nazwa_grupy" value="" /></td>
				</tr>
				<tr>
					<td class="left">Cena małej:</td><td class="right"><input class="itext_short" type="text" id="cena_16" name="cena_16" value="0.00" /></td>
				</tr>
				<tr>
					<td class="left">Cena średniej:</td><td class="right"><input class="itext_short" type="text" id="cena_20" name="cena_20" value="0.00" /></td>
				</tr>
				<tr>
					<td class="left">Cena dużej:</td><td class="right"><input class="itext_short" type="text" id="cena_30" name="cena_30" value="0.00" /></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
					<a href="/oferta/admin/index/submodule/cennik" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
					<input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); ?>
