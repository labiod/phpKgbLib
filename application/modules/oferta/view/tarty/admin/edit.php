<?php
include ("layouts/aheader.php");
$tarta = $this->tarta;
?>
<form action="/oferta/admin/confirm/submodule/tarty" name="oferta"
	method="post" enctype="multipart/form-data">
	<input type="hidden" name="id"
		value="<?php echo $tarta['id_tarty']; ?>" />
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Edytuj tartę</th>
		</tr>
		<tr>
			<td class="left">Nazwa tarty :</td>
			<td class="right"><input type="text" name="nazwa_tarty" class="itext"
				value="<?php echo $tarta['nazwa_tarty'];?>" /></td>
		</tr>
		<tr>
			<td class="left">Typ :</td>
			<td class="right" id="td_typ"><input type="radio" name="typ"
				value="slona" class="iradio"
				<?php if($tarta['typ']=='slona') echo "checked"; ?> /> słona <input
				type="radio" name="typ" value="slodka" class="iradio"
				<?php if($tarta['typ']=='slodka') echo "checked"; ?> /> słodka <input
				type="radio" name="typ" value="wykwintna" class="iradio"
				<?php if($tarta['typ']=='wykwintna') echo "checked"; ?> /> wykwintna
			</td>
		</tr>

		<tr id="tr_rodzaj"
			<?php if($tarta['typ']!='slona') echo "style='display: none'"; ?>>
			<td class="left">Rodzaj :</td>
			<td class="right"><input type="radio" name="rodzaj" value="wdl"
				class="iradio" <?php if($tarta['rodzaj']=='wdl') echo "checked"; ?> />
				z wędliną <input type="radio" name="rodzaj" value="k" class="iradio"
				<?php if($tarta['rodzaj']=='k') echo "checked"; ?> /> z kurczakiem <input
				type="radio" name="rodzaj" value="r" class="iradio"
				<?php if($tarta['rodzaj']=='r') echo "checked"; ?> /> z rybą <input
				type="radio" name="rodzaj" value="weg" class="iradio"
				<?php if($tarta['rodzaj']=='weg') echo "checked"; ?> />
				wegetariańska</td>
		</tr>
		<tr>
			<td class="left">Składniki :</td>
			<td class="right">				
 					<?php
						if (! $this->skladniki->isNull ()) {
							echo "<table id='skladniki'><tr>";
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
								if ($zlaczenia != null && $test = $zlaczenia->find ( "skladnika_id", $skladnik ['id_skladnika'] ) != null)
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
							echo "</tr></table>";
						} else {
							// echo "Nie ma składników do wyboru, aby dodać składnik <a href='/skladniki/admin/index' >kliknij tutaj</a>";
						}
						?>   
				        <a href="/oferta/admin/add/submodule/skladniki"
				id="showPopup">Dodaj składnik</a>
			</td>
		</tr>
		<tr>
			<td class="left">Ceny :</td>
			<td class="right">
				<table>
					<tr>
						<td>&nbsp;</td>
						<td class="cena_th">Nazwa grupy</td>
						<td class="cena_th">Cena małej</td>
						<td class="cena_th">Cena średniej</td>
						<td class="cena_th">Cena dużej</td>
					</tr>
						<?php
						if ((! $this->ceny->isNull ())) {
							$ceny = $this->ceny->toArray ();
							foreach ( $ceny as $c ) {
								?>
									<tr>
						<td><input type="radio" name="ceny_id"
							value="<?php echo $c['id_grupa_cenowa']; ?>" class="iradio"
							<?php if($tarta['ceny_id']==$c['id_grupa_cenowa']) echo "checked"; ?> />
						</td>
						<td class="cena"><?php echo $c['nazwa_grupy']; ?></td>
						<td class="cena"><?php echo $c['cena_16']; ?></td>
						<td class="cena"><?php echo $c['cena_20']; ?></td>
						<td class="cena"><?php echo $c['cena_30']; ?></td>
					</tr>	
								<?php
							}
						} else {
							echo "<td colspan='4'>Nie ma grup cenowych do wyboru, aby dodać grupę cenową <a href='/cennik/admin/add'>kliknij tutaj</a></td>";
						}
						?>
						</table>
			</td>
		</tr>
		<tr>
			<td class="left">Dostępność :</td>
			<td class="right"><input type="checkbox" name="dostepna"
				class="iradio" <?php if($tarta['dostepna']==1) echo "checked"; ?> />
				dostępna</td>
		</tr>
		<tr>
			<td class="left">Zdjęcie :</td>
			<td class="right"><input id="tarty" type="file" name="file" style="<?php if(isset($tarta['zdjecie_url'])) echo "display: none;"; ?>" class="oneTime" size="100" />
				<div id="up_tarty" class="uploadImg">
							<?php
							
							if (isset ( $tarta ['zdjecie_url'] )) {
								?>
							<div id="ch_tarty_0" class="upImage">
						<a href="/data/tarty/<?php echo $tarta['zdjecie_url']; ?>"
							class="galeria"><img
							src="/data/tarty/m_<?php echo $tarta['zdjecie_url'];?>"
							alt="foto" /></a> <input id='tarty_0' type='button'
							style='margin-top: 5px;' class='remover button' value='Usuń' />
					</div>
							<?php
							}
							?>
						</div></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><a
				href="/oferta/admin/index/submodule/tarty"><input type="button"
					id="redirect" class="button" value="Wróć" /></a> <input
				type="submit" id="submit" name="submit" class="button"
				value="Edytuj" />
		
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); 