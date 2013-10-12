<?php
include ("layouts/aheader.php");
?>
<div id="dodaj">
	<a id="add_button" href="/multigallery/admin/add"><img class="icon"
		src="/public/images/add.png" alt="Dodaj nową galerię"
		title="Dodaj nową galerię" /> Dodaj nową galerię</a>
</div>
<table id="tab_list" cellspacing="0">
	<tr>
		<th width="30px">Lp.</th>
		<th>Nazwa</th>
		<th width="500px">Opis</th>
		<th width="150px">Zdjęcie główne</th>
		<th width="80px">Widoczna</th>
		<th width="250px">Akcje</th>
	</tr>
<?php
$i = 1;
if (! $this->gallery->isNull ()) {
	$this->gallery = $this->gallery->toArray ();
	foreach ( $this->gallery as $gall ) {
		if (isset ( $gall ['photo_id'] )) {
			$photos = $this->photo->find ( "id_photo = " . $gall ['photo_id'] );
			if (! $photos->isNull ()) {
				$photos = $photos->toArray ();
				$photo = $photos [0];
			}
		}
		?>
			<tr>
		<td><?php echo $i++; ?></td>
		<td><h3><?php echo $gall['name']; ?></h3></td>
		<td><?php echo $gall['description']; ?></td>
		<td>
					<?php if(isset($photo)){?>
						<a href="/<?php echo $photo['path'];?>" class="galeria">
						<?php
			
			if (isset ( $photo ['path_mini'] )) {
				echo '<img src="/' . $photo ['path_mini'] . '" alt="foto" />';
			} else {
				echo '<img src="/' . $photo ['path'] . '" alt="foto" />';
			}
			?></a>
					<?php } else echo "brak zdjęcia"; ?>
				</td>
		<td><?php echo $gall['visible']=="y" ? "tak" : "<span class='red'>nie</span>";?></td>
		<td><a
			href="/multigallery/admin/details/id/<?php echo $gall['id_gallery']; ?>"><img
				class="icon" src="/public/images/info_m.png" alt="szczegóły"
				title="szczegóły" /> przeglądaj</a> <a
			href="/multigallery/admin/edit/id/<?php echo $gall['id_gallery']; ?>"><img
				class="icon" src="/public/images/modify_m.png" alt="edytuj"
				title="edytuj" /> edytuj</a> <a
			href="/multigallery/admin/delete/id/<?php echo $gall['id_gallery']; ?>"
			name="potwierdz_galeria" id="galerię: <?php echo $gall['name']; ?>"><img
				class="icon" src="/public/images/delete_m.png" alt="usuń"
				title="usuń" /> usuń</a></td>
	</tr>	
		<?php
	}
} else {
	?>
			<tr>
		<td colspan="6"
			style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;">Nie
			ma żadnej galerii.</td>
	</tr>
		<?php
}
?>
						
		</table>
<?php include ("layouts/afooter.php");