<?php
include ("layouts/aheader.php");
?>
<div id="dodaj">
	<a id="add_button" href="/gallery/admin/add">Dodaj zdjęcie</a>
</div>
<table id="tab_list" cellspacing="0">
	<tr>
		<th width="30px">Lp.</th>
		<th>Nazwa</th>
		<th width="400px">Link</th>
		<th width="150px">Podgląd</th>
		<th width="100px">Akcje</th>
	</tr>
<?php
$i = 1;
if (! $this->gallery->isNull ()) {
	$this->gallery = $this->gallery->toArray ();
	foreach ( $this->gallery as $photo ) {
		?>
			<tr>
		<td><?php echo $i++; ?></td>
		<td><h3><?php echo $photo['name']; ?></h3></td>
		<td><?php echo $photo['path']; ?></td>
		<td><a href="/<?php echo $photo['path'];?>">
					<?php
		
		if (isset ( $photo ['path_mini'] )) {
			echo '<img src="/' . $photo ['path_mini'] . '" alt="foto" />';
		} else {
			echo '<img src="/' . $photo ['path'] . '" alt="foto" />';
		}
		?></a></td>
		<td><a
			href="/gallery/admin/delete/id/<?php echo $photo['id_photo']; ?>"
			name="potwierdz" id="zdj_<?php echo $photo['name']; ?>">usuń</a></td>
	</tr>	
		<?php
	}
} else {
	?>
			<tr>
		<td colspan="5"
			style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;">Nie
			ma żadnych zdjęć w galerii</td>
	</tr>
		<?php
}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
