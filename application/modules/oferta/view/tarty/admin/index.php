<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/oferta/admin/add/submodule/tarty" ><img class="icon" src="/public/images/add.png" alt="Dodaj tartę" title="Dodaj tartę" /> Dodaj tartę</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="30px" >Lp.</th><th>Nazwa</th><th  width="100px">Typ</th><th  width="200px">Zdjęcie</th><th width="90px">Dostępna</th><th width="270px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if(! $this->tarty->isNull()) {
		$this->tarty = $this->tarty->toArray();
		foreach($this->tarty as $tt) {
			switch ($tt['typ']){
				case 'slona': $typ = 'słona'; break;
				case 'slodka': $typ = 'słodka'; break;
				case 'wykwintna': $typ = 'wykwintna'; break;
			}
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $tt['nazwa_tarty']; ?></h3></td>
				<td class="<?php echo $typ; ?>"><?php echo $typ; ?></td>
				<td>
					<?php if(isset($tt['zdjecie_url'])){
						echo '<a href="/data/tarty/'.$tt['zdjecie_url'].'" class="galeria">';
						echo '<img width="180px" src="/data/tarty/m_'.$tt['zdjecie_url'].'" alt="foto" />';
						echo '</a>';
					}?>
				</td>
				<td><?php if($tt['dostepna'] == 1) echo "tak";
						  else echo "<span class='red'>nie</span>"; ?>
				</td>
				<td><a href="/oferta/admin/details/submodule/tarty/id/<?php echo $tt['id_tarty']; ?>"><img class="icon" src="/public/images/info_m.png" alt="szczegóły" title="szczegóły" /> szczegóły</a> 
				    <a href="/oferta/admin/edit/submodule/tarty/id/<?php echo $tt['id_tarty']; ?>"><img class="icon" src="/public/images/modify_m.png" alt="edytuj" title="edytuj" /> edytuj</a> 
				    <a href="/oferta/admin/delete/submodule/tarty/id/<?php echo $tt['id_tarty']; ?>"  name="potwierdz" id="tarta <?php echo $tt['nazwa_tarty']; ?>"><img class="icon" src="/public/images/delete_m.png" alt="usuń" title="usuń" /> usuń</a>
				</td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Obecnie nie ma żadnych tart.</td>
			</tr>
		<?php 
	}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
