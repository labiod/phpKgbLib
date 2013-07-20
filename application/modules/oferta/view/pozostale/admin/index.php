<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/oferta/admin/add/submodule/pozostale" ><img class="icon" src="/public/images/add.png" alt="Dodaj produkt" title="Dodaj produkt" /> Dodaj produkt</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="30px" >Lp.</th><th>Nazwa</th><th width="200px">Zdjęcie</th><th  width="100px">Ilość</th><th width="100px">Cena</th><th width="180px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if(! $this->pozostale->isNull()) {
		$this->pozostale = $this->pozostale->toArray();
		foreach($this->pozostale as $p) {
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $p['nazwa_pozostale']; ?></h3></td>
				<td><?php if(isset($p['zdjecie_url'])){
						echo '<a href="/data/pozostale/'.$p['zdjecie_url'].'" class="galeria">';
						echo "<img src='/data/pozostale/m_".$p['zdjecie_url']."' alt='foto' />";
						echo '</a>';	}?>
				</td>
				<td><?php echo $p['ilosc']; ?></td>
				<td class="cena"><?php echo $p['cena']; ?></td>
				<td><a href="/oferta/admin/edit/submodule/pozostale/id/<?php echo $p['id_pozostale']; ?>"><img class="icon" src="/public/images/modify_m.png" alt="edytuj" title="edutyj" /> edytuj</a>
				    <a href="/oferta/admin/delete/submodule/pozostale/id/<?php echo $p['id_pozostale']; ?>"  name="potwierdz" id="<?php echo $p['nazwa_pozostale']; ?>"><img class="icon" src="/public/images/delete_m.png" alt="usuń" title="usuń" /> usuń</a>
				</td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Obecnie nie ma pozostałych produktów.</td>
			</tr>
		<?php 
	}
?>					
		</table>
<?php include ("layouts/afooter.php"); ?>
