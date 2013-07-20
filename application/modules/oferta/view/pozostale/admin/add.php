<?php include ("layouts/aheader.php"); 
?>
		<form action="/oferta/admin/confirm/submodule/pozostale" method="post" name="oferta" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj produkt</th>		
				</tr>
				<tr>
					<td class="left">Nazwa produktu :</td>
					<td class="right"><input type="text" name="nazwa_pozostale" class="itext" /></td>
				</tr>
				<tr>
					<td class="left">Ilość :</td>
					<td class="right"><input type="text" name="ilosc" class="itext_short" /></td>
				</tr>
				<tr>
					<td class="left">Cena :</td>
					<td class="right"><input type="text" name="cena" class="itext_short" /></td>
				</tr>
				<tr><td class="left">Zdjęcie :</td>
					<td class="right"><input id="pozostale" type="file" class="oneTime" name="file" size="100" />
						<div id="up_pozostale" class="uploadImg" ></div>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/oferta/admin/index/submodule/pozostale"><input type="button" id="redirect" class="button" value="Wróć" /></a>
						<input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); 
