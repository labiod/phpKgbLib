<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/oferta/admin/add/submodule/nalesniki" ><img class="icon" src="/public/images/add.png" alt="Dodaj naleśnik" title="Dodaj naleśnik" /> Dodaj naleśnik</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="30px" >Lp.</th><th>Nazwa naleśnika</th><th width="130px">Cena</th><th width="260px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if($this->nalesniki != null && $this->nalesniki->count() != 0) {
		$nalesniki = $this->nalesniki->toArray();
		foreach($nalesniki as $nalesnik) {
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $nalesnik['nazwa_nalesnika']; ?></h3></td>
				<td><h3><?php echo $nalesnik['cena']; ?></h3></td>
				<td><a href="/oferta/admin/details/submodule/nalesniki/id/<?php echo $nalesnik['id_nalesnik']; ?>" ><img class="icon" src="/public/images/info_m.png" alt="szczegóły" title="szczegóły" /> szczegóły</a>
				<a href="/oferta/admin/edit/submodule/nalesniki/id/<?php echo $nalesnik['id_nalesnik']; ?>" ><img class="icon" src="/public/images/modify_m.png" alt="edytuj" title="edutyj" /> edytuj</a>
				<a href="/oferta/admin/delete/submodule/nalesniki/id/<?php echo $nalesnik['id_nalesnik']; ?>" name="potwierdz" id="Cennik" ><img class="icon" src="/public/images/delete_m.png" alt="usuń" title="usuń" /> usuń</a></td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Lista naleśników jest pusta</td>
			</tr>
		<?php 
	}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
