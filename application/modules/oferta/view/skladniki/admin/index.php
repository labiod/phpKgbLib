<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/oferta/admin/add/submodule/skladniki" ><img class="icon" src="/public/images/add.png" alt="Dodaj składnik" title="Dodaj składnik" /> Dodaj składnik</a> <a id="delete_button" href="/oferta/admin/multidelete/submodule/skladniki" ><img style="float: left;" src="/public/images/delete_m.png" alt="usuń wszystkie" title="usuń wszystkie" /> Usuń zaznaczone</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="25px"></th><th width="30px" >Lp.</th><th>Nazwa składnika</th><th width="100px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if($this->skladniki != null && $this->skladniki->count() != 0) {
		$this->skladniki = $this->skladniki->toArray();
		foreach($this->skladniki as $skladniki) {
		?>
			<tr>
				<td><input type="checkbox" name="id[]" value="<?php echo $skladniki['id_skladnika']; ?>" /> 
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $skladniki['nazwa_skladnika']; ?></h3></td>
				<td><a href="/oferta/admin/delete/submodule/skladniki/id/<?php echo $skladniki['id_skladnika']; ?>" name="potwierdz" id="Składnik <?php echo $skladniki['nazwa_skladnika']; ?>" ><img class="icon" style="float: left;" src="/public/images/delete_m.png" alt="usuń" title="usuń" />usuń</a></td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="3" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Lista składników jest pusta</td>
			</tr>
		<?php 
	}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
