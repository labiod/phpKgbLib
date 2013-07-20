<?php include ("layouts/aheader.php"); 
?>
		<table id="tab_list" cellspacing="0">
			<caption>Lista mailingowa</caption>
			<tr>
				<th width="30px" >Lp.</th><th width="200px">Email</th><th width="200px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if($this->newsletter != null) {
		$this->newsletter = $this->newsletter->toArray();
		foreach($this->newsletter as $newsletter) {
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $newsletter['email']; ?></h3></td>
				<td><a href="/admin/newsletter/delete/id/<?php echo $newsletter['id_user']; ?>" name="potwierdz" id="Email" >usuń</a></td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Lista mailingowa jest pusta</td>
			</tr>
		<?php 
	}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>

