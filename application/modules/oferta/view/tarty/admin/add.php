<?php include ("layouts/aheader.php"); 
?>
		<form action="/oferta/admin/confirm/submodule/tarty" name="oferta" method="post" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj tartę</th>		
				</tr>
				<tr>
					<td class="left">Nazwa tarty :</td>
					<td class="right"><input type="text" name="nazwa_tarty" class="itext" /></td>
				</tr>
				<tr>
					<td class="left">Typ :</td>
					<td class="right" id="td_typ"><input type="radio" name="typ" value="slona" class="iradio" checked /> słona 
									  <input type="radio" name="typ" value="slodka" class="iradio" /> słodka
									  <input type="radio" name="typ" value="wykwintna" class="iradio" /> wykwintna
					</td>
				</tr>
				<tr id="tr_rodzaj">
					<td class="left">Rodzaj :</td>
					<td class="right"><input type="radio" name="rodzaj" value="wdl" class="iradio" /> z wędliną
									  <input type="radio" name="rodzaj" value="k" class="iradio" /> z kurczakiem
									  <input type="radio" name="rodzaj" value="r" class="iradio" /> z rybą
									  <input type="radio" name="rodzaj" value="weg" class="iradio" /> wegetariańska 
					</td>
				</tr>
				<tr>
					<td class="left">Składniki :</td>
					<td class="right">			
 					<?php 
				        	if(!$this->skladniki->isNull()) {
				        		echo "<table id='skladniki'><tr>";
				        		$liczba = 0;
				        		$skladniki = $this->skladniki->toArray();
				        		foreach($skladniki as $skladnik) {
									if(($liczba % 6) == 0) {
					                    echo "</tr>\n<tr align=\"right\">";
					                }
					                ?>
					        <td><?php echo $skladnik["nazwa_skladnika"]; ?>: <input type="checkbox" id="s_<?php echo $skladnik["skladnika_id"]; ?>" name="sklad[]" value="<?php echo $skladnik["id_skladnika"]; ?>" /></td><?php 
					                $liczba++;
				        		}
				        		echo "</tr></table>";
				        	} else {
				       			echo "Nie ma składników do wyboru, aby dodać składnik <a href='/skladniki/admin/index' >kliknij tutaj</a>";
				        	}  ?>	
				     <a href="/oferta/admin/add/submodule/skladniki" id="showPopup" >Dodaj składnik</a>   
					</td>
				</tr>
				<tr><td class="left">Ceny :</td>
					<td class="right">
						<table><tr><td>&nbsp;</td><td class="cena_th">Nazwa grupy</td><td class="cena_th">Cena małej</td><td class="cena_th">Cena średniej</td><td class="cena_th">Cena dużej</td></tr>
						<?php 
							if((!$this->ceny->isNull())){
								$ceny = $this->ceny->toArray();
								foreach($ceny as $c){ ?>
									<tr>
										<td>
											<input type="radio" name="ceny_id" value="<?php echo $c['id_grupa_cenowa']; ?>" class="iradio" />
										</td>
										<td class="cena"><?php echo $c['nazwa_grupy']; ?></td>
										<td class="cena"><?php echo $c['cena_16']; ?></td>
										<td class="cena"><?php echo $c['cena_20']; ?></td>
										<td class="cena"><?php echo $c['cena_30']; ?></td>
									</tr>	
								<?php 
								}								
							}else{
								echo "<td colspan='4'>Nie ma grup cenowych do wyboru, aby dodać grupę cenową <a href='/cennik/admin/add'>kliknij tutaj</a></td>";
							}
						?>
						</table>
					</td>
				</tr>
				<tr>
					<td class="left">Dostępność :</td>
					<td class="right"><input type="checkbox" name="dostepna" class="iradio" checked /> dostępna</td>
				</tr>
				<tr><td class="left">Zdjęcie :</td>
					<td class="right"><input type="file" id="tarty" name="file" class="oneTime" size="100" />
						<div id="up_tarty" class="uploadImg" ></div>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/oferta/admin/index/submodule/tarty"><input type="button" id="redirect" class="button" value="Wróć" /></a>
						<input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); 
