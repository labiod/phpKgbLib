<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/oferta/admin/add/submodule/zupy" ><img class="icon" src="/public/images/add.png" alt="Dodaj zupę" title="Dodaj zupę" /> Dodaj zupę</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="30px" >Lp.</th><th>Nazwa zupy</th><th width="130px">Cena małej</th><th width="130px">Cena dużej</th><th width="260px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if($this->zupy != null && $this->zupy->count() != 0) {
		$zupy = $this->zupy->toArray();
		foreach($zupy as $zupa) {
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $zupa['nazwa_zupy']; ?></h3></td>
				<td><h3><?php echo $zupa['cena_mala']; ?></h3></td>
				<td><h3><?php echo $zupa['cena_duza']; ?></h3></td>				
				<td><a href="/oferta/admin/details/submodule/zupy/id/<?php echo $zupa['id_zupa']; ?>" ><img class="icon" src="/public/images/info_m.png" alt="szczegóły" title="szczegóły" /> szczegóły</a>
				<a href="/oferta/admin/edit/submodule/zupy/id/<?php echo $zupa['id_zupa']; ?>" ><img class="icon" src="/public/images/modify_m.png" alt="edytuj" title="edutyj" /> edytuj</a>
				<a href="/oferta/admin/delete/submodule/zupy/id/<?php echo $zupa['id_zupa']; ?>" name="potwierdz" id="Cennik" ><img class="icon" src="/public/images/delete_m.png" alt="usuń" title="usuń" /> usuń</a></td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Lista zup jest pusta</td>
			</tr>
		<?php 
	}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
