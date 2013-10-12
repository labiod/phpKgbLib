<?php
include ("layouts/aheader.php");
$meta = $this->_metaTag->toArray ();

?>
<form name="promocje" action="/settings/admin/confirm" method="post"
	enctype="multipart/form-data">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Edytuj Promocje</th>
		</tr>
		<tr>
			<td class="left">Nazwa:</td>
			<td class="right"><input class="itext" type="text" id="meta_name"
				name="meta_name" value="<?php echo $meta[0]['meta_name']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Wartość:</td>
			<td class="right"><textarea id="meta_value" name="meta_value"
					cols="40" rows="12"><?php echo $meta[0]['meta_value']; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><input type="submit" id="submit"
				name="submit" class="button" value="Edytuj" /> <input type="hidden"
				name="id_meta" value="<?php echo $meta[0]['id_meta']; ?>" /> <input
				type="hidden" name="action" value="meta" /></td>
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>
