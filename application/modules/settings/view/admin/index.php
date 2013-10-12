<?php
include ("layouts/aheader.php");
$meta = $this->_metaTag->toArray ();
?>
<form name="promocje" action="/settings/admin/confirm" method="post"
	enctype="multipart/form-data">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Metadane</th>
		</tr>
		<tr>
			<td class="left">Opis wytryny:</td>
			<td class="right"><textarea id="description" name="description"
					cols="40" rows="2"><?php echo $meta[0]['meta_value']; ?></textarea></td>
		</tr>
		<tr>
			<td class="left">Słowa kluczowe:</td>
			<td class="right"><textarea id="keywords" name="keywords" cols="40"
					rows="5"><?php echo $meta[1]['meta_value']; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><input type="submit" id="submit"
				name="submit" class="button" value="Zmień" /> <input type="hidden"
				name="id_meta" value="<?php echo $meta[0]['id_meta']; ?>" /> <input
				type="hidden" name="action" value="meta" /></td>
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>
