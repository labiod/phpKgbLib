<?php
include "layouts/header.php";
$gall = $this->gallery;
$photos = $this->photos;
?>
<div id="Content">
	<h2>Galeria <?php echo $gall['name']; ?></h2>
	<div class="box">
		<a class="powrot" href="/multigaleria">&lt;&lt;powrót</a>
		<div class="gallery_descr"><?php echo $gall['description']; ?></div>
		 
<?php
$i = 1;
foreach ( $photos as $photo ) {
	?>
			<div class="gallery_box">
	<?php
	if (isset ( $photo )) {
		?>
				<a href="/<?php echo $photo['path'];?>" class="galeria" rel="g">
				<?php
		
		if (isset ( $photo ['path_mini'] )) {
			echo '<img src="/' . $photo ['path_mini'] . '" alt="foto" />';
		} else {
			echo '<img src="/' . $photo ['path'] . '" alt="foto" />';
		}
		?>
				</a>
			<?php } else "brak zdjęć"; ?>
		</div>
		<?php } ?>

		</div>
</div>
<?php
include "layouts/footer.php";