<?php
include ("layouts/aheader.php");
$pp = $this->prod;
?>
<form action="/oferta/admin/confirm/submodule/pozostale" name="oferta"
	method="post" enctype="multipart/form-data">
	<input type="hidden" name="id"
		value="<?php echo $pp['id_pozostale']; ?>" />
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Edytuj produkt</th>
		</tr>
		<tr>
			<td class="left">Nazwa produktu :</td>
			<td class="right"><input type="text" name="nazwa_pozostale"
				class="itext" value="<?php echo $pp['nazwa_pozostale']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Ilość :</td>
			<td class="right"><input type="text" name="ilosc" class="itext_short"
				value="<?php echo $pp['ilosc']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Cena :</td>
			<td class="right"><input type="text" name="cena" class="itext_short"
				value="<?php echo $pp['cena']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Zdjęcie :</td>
			<td class="right"><input
				<?php if($pp['zdjecie_url'] != "") echo "style='display:none;'"; ?>
				type="file" id="pozostale" name="file" class="oneTime" size="100" />
				<div id="up_pozostale" class="uploadImg">
					<div id="ch_pozostale_0" class="upImage">
						<a href="/data/pozostale/<?php echo $pp['zdjecie_url'];?>"
							class="galeria"> <img
							src="/data/pozostale/m_<?php echo $pp['zdjecie_url'];?>"
							alt="foto" />
						</a> <input id='pozostale_0' type='button'
							style='margin-top: 5px;' class='remover button' value='Usuń' />
					</div>
				</div></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><a
				href="/oferta/admin/index/submodule/pozostale"><input type="button"
					id="redirect" class="button" value="Wróć" /></a> <input
				type="submit" id="submit" name="submit" class="button"
				value="Edytuj" />
		
		</tr>
	</table>

</form>
<?php

include ("layouts/afooter.php"); 
