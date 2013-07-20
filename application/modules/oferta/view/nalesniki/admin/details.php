<?php include ("layouts/aheader.php"); 
$nalesniki = $this->nalesniki->toArray();
?>
	<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Szczegóły naleśnika</th>		
				</tr>
				<tr>
					<td class="left">Nazwa naleśnika:</td><td class="right"><?php echo $nalesniki[0]['nazwa_nalesnika']; ?></td>
				</tr>
				<tr>
					<td class="left">Cena:</td><td class="right"><?php echo $nalesniki[0]['cena']; ?></td>
				</tr>
				<tr>
					<td class="left">Składniki:</td>
					<td class="right">
				        <?php 
				        	if(!$this->zlaczenia->isNull()) {
				        		$liczba = 0;
				        		$skladniki = $this->zlaczenia->toArray();
				        		foreach($skladniki as $skladnik) {
									echo $skladnik["nazwa_skladnika"];
									if($liczba < $this->zlaczenia->count() - 1)
										echo ", ";
					                $liczba++;
					                
				        		}
				        	} else {
				       			echo "<h3>Do tego naleśnika nie dodano jeszcze składników, aby dodać składnik <a href=' /oferta/admin/edit/submodule/nalesniki/id/".$nalesniki[0]['id_nalesnik']."' >kliknij tutaj</a></h3>";
				        	}	
				        ?>
					</td>
				</tr>
				
				<tr>
					<td colspan="2" class="cntr">
					<a href="/oferta/admin/index/submodule/nalesniki" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
				</tr>
	</table>
<?php include ("layouts/afooter.php"); ?>

