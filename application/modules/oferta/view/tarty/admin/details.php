<?php include ("layouts/aheader.php"); 
$this->tarta = $this->tarta->toArray();
$tarta = $this->tarta[0];
switch ($tarta['typ']){
				case 'slona': $typ = 'słona'; break;
				case 'slodka': $typ = 'słodka'; break;
				case 'wykwintna': $typ = 'wykwintna'; break;
			}
switch ($tarta['rodzaj']){
				case 'wdl': $r = 'z wędliną'; break;
				case 'k': $r = 'z kurczakiem'; break;
				case 'r': $r = 'z rybą'; break;
				case 'weg': $r = 'wegetariańska'; break;
			}
?>
		<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Szczegóły tarty</th>		
				</tr>
				<tr>
					<td class="left">Nazwa tarty :</td>
					<td class="right"><h3><?php echo $tarta['nazwa_tarty'];?></h3></td>
				</tr>
				<tr>
					<td class="left">Typ :</td>
					<td class="right"><?php echo $typ;?>
					</td>
				</tr>
				<?php if($typ == 'słona'){?>
				<tr>
					<td class="left">Rodzaj :</td>
					<td class="right"><?php echo $r;?>
					</td>
				</tr>
				<?php }?>
				<tr>
					<td class="left">Składniki :</td>
					<td class="right">
						<table><tr>
 					<?php 
				        	if(!$this->zlaczenia->isNull()) {
				        		$skladniki = $this->zlaczenia->toArray();
				        		$liczba = 0;
				        		foreach($skladniki as $skladnik) {
									echo $skladnik["nazwa_skladnika"];
									if($liczba < $this->zlaczenia->count() - 1)
										echo ", ";
					                $liczba++;
					                
				        		}
				        	} else {
				       			echo "<th>Nie wybrano składników tej tarty, aby zedytować tartę <a href='/tarty/admin/edit/id/".$tarta['id_tarty']."' >kliknij tutaj</a></th>";
				        	}  ?>
				        </tr></table>
					</td>
				</tr>
				<tr><td class="left">Ceny :</td>
					<td class="right">
						<table><tr><td class="cena_th">Cena małej</td><td class="cena_th">Cena średniej</td><td class="cena_th">Cena dużej</td></tr>
						<?php 
							if((!$this->ceny->isNull())){
								$ceny = $this->ceny->toArray();
								$ceny = $ceny[0];	?>
									<tr>
										
										<td class="cena"><?php echo $ceny['cena_16']; ?></td>
										<td class="cena"><?php echo $ceny['cena_20']; ?></td>
										<td class="cena"><?php echo $ceny['cena_30']; ?></td>
									</tr>	
						<?php 										
							}else{
								echo "<td colspan='3'>Nie ma grup cenowych do wyboru, aby dodać grupę cenową <a href='/cennik/admin/add'>kliknij tutaj</a></td>";
							}
						?>
						</table>
					</td>
				</tr>
				<tr>
					<td class="left">Dostępność :</td>
					<td class="right">
					<?php if($tarta['dostepna'] == 1) echo "dostępna";
						  else echo "<span class='red'>niedostępna</span>"; ?>
					</td>
				</tr>
				<tr><td class="left">Zdjęcie :</td>
					<td class="right"><?php if(isset($tarta['zdjecie_url'])){
						echo '<a href="/data/tarty/'.$tarta['zdjecie_url'].'" class="galeria" >';
						echo '<img src="/data/tarty/m_'.$tarta['zdjecie_url'].'" alt="foto" />';
						echo '</a>';
					}?></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
					<a href="/oferta/admin/index/submodule/tarty"><input type="button" id="redirect" class="button" value="Wróć" /></a>
				</tr>
			</table>

<?php include ("layouts/afooter.php"); 