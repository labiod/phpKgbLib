<?php
include "layouts/header.php";
?>
<div id="Content">
	<h2>Galeria</h2>
	<div class="box">	
<?php
if (! $this->gallery->isNull ()) {
	$this->gallery = $this->gallery->toArray ();
	foreach ( $this->gallery as $photo ) {
		echo '<div class="gall"><a href="/' . $photo ['path'] . '" rel="lightbox[gal]">';
		if (isset ( $photo ['path_mini'] )) {
			echo '<img src="/' . $photo ['path_mini'] . '" alt="foto" /></a>';
		} else {
			echo '<img src="/' . $photo ['path_mini'] . '" alt="foto" />';
		}
		echo '</a></div>';
	}
}
?>

		</div>
</div>
<?php
include "layouts/footer.php";
?>