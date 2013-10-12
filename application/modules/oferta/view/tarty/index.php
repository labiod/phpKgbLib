<?php
include "layouts/header.php";
echo "<div id=\"oferta\">";
echo Application::loadComponent ( "OfertaMenu", $this->tarty, $this->zupy, $this->pozostale );
?>
<div id="oferta_box">
	<div id="oferta_main">
			<?php echo $this->oferta;?>
		</div>

</div>
</div>
<?php
include "layouts/footer.php";
?>