<?php
include ("layouts/aheader.php");
?>
<form name="oferta" action="/oferta/admin/confirm/submodule/zupy"
	method="post" enctype="multipart/form-data">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Dodaj zupę</th>
		</tr>
		<tr>
			<td class="left">Nazwa zupy:</td>
			<td class="right"><input class="itext" type="text" id="nazwa_zupy"
				name="nazwa_zupy" value="" /></td>
		</tr>
		<tr>
			<td class="left">Cena małej:</td>
			<td class="right"><input class="itext_short" type="text"
				id="cena_mala" name="cena_mala" value="6.00" /></td>
		</tr>
		<tr>
			<td class="left">Cena dużej:</td>
			<td class="right"><input class="itext_short" type="text"
				id="cena_duza" name="cena_duza" value="9.00" /></td>
		</tr>
		<tr>
			<td class="left">Składniki:</td>
			<td class="right">
				<table>
					<tr align=\"right\">
				        <?php
												if (! $this->skladniki->isNull ()) {
													$liczba = 0;
													$skladniki = $this->skladniki->toArray ();
													foreach ( $skladniki as $skladnik ) {
														if (($liczba % 5) == 0) {
															echo "</tr><tr align=\"right\">";
														}
														?>
					        <td width="25%"><?php echo $skladnik["nazwa_skladnika"]; ?>: <input
							type="checkbox" id="s_<?php echo $skladnik["id_skladnika"]; ?>"
							name="sklad[]" value="<?php echo $skladnik["id_skladnika"]; ?>" /></td><?php
														$liczba ++;
													}
												} else {
													echo "<th>Nie ma składników do wyboru, aby dodać składnik <a href='/skladniki/admin/index' >kliknij tutaj</a></th>";
												}
												?>
				            </tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="left">Zdjęcie :</td>
			<td class="right"><input type="file" id="zupy" name="file"
				class="oneTime" size="100" />
				<div id="up_zupy" class="uploadImg"></div></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><a
				href="/oferta/admin/index/submodule/zupy"><input type="button"
					id="redirect" class="button" value="Wróć" /></a> <input
				type="submit" id="submit" name="submit" class="button" value="Dodaj" />
		
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>
