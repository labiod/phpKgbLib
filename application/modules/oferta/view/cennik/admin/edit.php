<?php
include ("layouts/aheader.php");
$cennik = $this->cennik->toArray ();

?>
<form action="/oferta/admin/confirm/submodule/cennik" method="post">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Edytuj Grupę cenową</th>
		</tr>
		<tr>
			<td class="left">Nazwa grupy:</td>
			<td class="right"><input class="itext" type="text" id="nazwa_grupy"
				name="nazwa_grupy" value="<?php echo $cennik[0]['nazwa_grupy']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Cena małej:</td>
			<td class="right"><input class="itext_short" type="text" id="cena_16"
				name="cena_16" value="<?php echo $cennik[0]['cena_16']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Cena średniej:</td>
			<td class="right"><input class="itext_short" type="text" id="cena_20"
				name="cena_20" value="<?php echo $cennik[0]['cena_20']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Cena dużej:</td>
			<td class="right"><input class="itext_short" type="text" id="cena_30"
				name="cena_30" value="<?php echo $cennik[0]['cena_30']; ?>" /></td>
		</tr>
		<tr>

			<td colspan="2" class="cntr"><a
				href="/oferta/admin/index/submodule/cennik"><input type="button"
					id="redirect" name="redirect" class="button" value="Wróć" /></a> <input
				type="submit" id="submit" name="submit" class="button"
				value="Edytuj" /> <input type="hidden" name="id_grupa_cenowa"
				value="<?php echo $cennik[0]['id_grupa_cenowa']; ?>" /></td>
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>
