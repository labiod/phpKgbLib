<?php
include ("layouts/aheader.php");
$zupy = $this->zupy->toArray ();

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
				name="nazwa_zupy" value="<?php echo $zupy[0]['nazwa_zupy']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Cena mała:</td>
			<td class="right"><input class="itext_short" type="text"
				id="cena_mala" name="cena_mala"
				value="<?php echo $zupy[0]['cena_mala']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Cena duża:</td>
			<td class="right"><input class="itext_short" type="text"
				id="cena_duza" name="cena_duza"
				value="<?php echo $zupy[0]['cena_duza']; ?>" /></td>
		</tr>
		<tr>
			<td class="left">Składniki:</td>
			<td class="right">
				<table>
					<tr align="right">
				        <?php
												if (! $this->skladniki->isNull ()) {
													$zlaczenia = null;
													if (! $this->zlaczenia->isNull) {
														$zlaczenia = $this->zlaczenia;
													}
													$liczba = 0;
													$skladniki = $this->skladniki->toArray ();
													foreach ( $skladniki as $skladnik ) {
														$checked = "";
														if (($liczba % 5) == 0) {
															echo "</tr><tr align=\"right\">";
														}
														if ($zlaczenia != null && $test = $zlaczenia->find ( "skladnik_id", $skladnik ['id_skladnika'] ) != null)
															$checked = "checked";
														
														?>
					        <td>
					        	<?php echo $skladnik["nazwa_skladnika"]; ?>: <input
							type="checkbox" <?php echo $checked; ?>
							id="s_<?php echo $skladnik["id_skladnika"]; ?>" name="sklad[]"
							value="<?php echo $skladnik["id_skladnika"]; ?>" />
						</td><?php
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
			<td class="right"><input
				<?php if($zupy[0]['zdjecie_url'] != "") echo "style='display:none;'"; ?>
				type="file" id="zupy" name="file" class="oneTime" size="100" />
				<div id="up_zupy" class="uploadImg">
						<?php if($zupy[0]['zdjecie_url'] != "") { ?>
							<div id="ch_zupy_0" class="upImage">
						<a href="/data/zupy/<?php echo $zupy[0]['zdjecie_url'];?>"><img
							src="/data/zupy/m_<?php echo $zupy[0]['zdjecie_url'];?>"
							alt="foto" /></a> <input id='zupy_0' type='button'
							style='margin-top: 5px;' class='remover button' value='Usuń' />
					</div>
						<?php } ?>
						</div></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><a
				href="/oferta/admin/index/submodule/zupy"><input type="button"
					id="redirect" name="redirect" class="button" value="Wróć" /></a> <input
				type="submit" id="submit" name="submit" class="button"
				value="Edytuj" /> <input type="hidden" name="id_zupa"
				value="<?php echo $zupy[0]['id_zupa']; ?>" />
		
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>

