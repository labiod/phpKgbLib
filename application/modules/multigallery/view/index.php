<?php
include "layouts/header.php";
?>
<div id="Content">
	<h2>Wszystkie galerie</h2>
	<div class="box">	
<?php
$i = 1;
if (! $this->gallery->isNull ()) {
	$this->gallery = $this->gallery->toArray ();
	foreach ( $this->gallery as $gall ) {
		?>
			<div class="gallery_box">
			<a href="/multigallery/show/id/<?php echo $gall['id_gallery']; ?>">
	<?php
		
		if (isset ( $gall ['photo_id'] )) {
			$photo = $this->photo->find ( "id_photo = " . $gall ['photo_id'] );
			$photo = $photo->toArray ();
			$photo = $photo [0];
		}
		if (isset ( $photo )) {
			?>
				<?php
			
			if (isset ( $photo ['path_mini'] )) {
				echo '<img src="/' . $photo ['path_mini'] . '" alt="foto" />';
			} else {
				echo '<img src="/' . $photo ['path'] . '" alt="foto"/>';
			}
		} else
			"brak zdjęcia";
		?>
		 	</a>
			<h3 class="gallery_name">
				<a href="/multigallery/show/id/<?php echo $gall['id_gallery']; ?>">
			<?php echo $gall['name']; ?>
		</a>
			</h3>
			<div class="gallery_descr"><?php echo $gall['description']; ?></div>
		</div>
		<?php
	}
} else {
	?>
		<div>Nie ma żadnej galerii.</div>
		<?php
}
?>

		</div>
</div>
<?php
include "layouts/footer.php";