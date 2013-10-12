<?php
include ("layouts/aheader.php");
?>
<form name="multigallery" action="/multigallery/admin/confirm"
	method="post" enctype="multipart/form-data">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Dodaj galerię</th>
		</tr>
		<tr>
			<td class="left">Nazwa galerii:</td>
			<td class="right"><input type="text" name="g_name" class="itext" /></td>
		</tr>
		<tr>
			<td class="left">Opis galerii:</td>
			<td class="right"><textarea class="itext" name="description"></textarea></td>
		</tr>
		<tr>
			<td class="left">Zdjęcia:</td>
			<td class="right"><input type="file" id="photo" name="file" size="30" />
				<div id="up_photo" class="uploadImg"></div></td>
		</tr>
		<tr>
			<td class="left">Widoczność:</td>
			<td class="right"><input name="visible" type="checkbox"
				class="iradio" checked /> widoczna</td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><a href="/multigallery/admin"><input
					type="button" id="redirect" name="redirect" class="button"
					value="Wróć" /></a> <input type="submit" id="submit" name="submit"
				class="button" value="Dodaj" /></td>
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); 