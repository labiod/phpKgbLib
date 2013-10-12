<?php
include ("layouts/aheader.php");
?>
<form name="promocje" action="/settings/admin/confirm" method="post"
	enctype="multipart/form-data">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Dodaj Meta Tag</th>
		</tr>
		<tr>
			<td class="left">Nazwa:</td>
			<td class="right"><input class="itext" type="text" id="meta_name"
				name="meta_name" value="" /></td>
		</tr>
		<tr>
			<td class="left">Wartość:</td>
			<td class="right"><textarea id="meta_value" name="meta_value"
					cols="40" rows="12"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><input type="hidden" name="action"
				value="meta" /> <input type="submit" id="submit" name="submit"
				class="button" value="Dodaj" />
		
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>
