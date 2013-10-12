<?php
include "layouts/header.php";

if (! $this->tarty->isNull ()) {
	$tarty = $this->tarty->toArray ();
	$slone = "<ul>";
	$slodkie = "<ul>";
	foreach ( $tarty as $t ) {
		if ($t ['typ'] == 'slona') {
			$slone .= <<<EOD
			<li>{$t[nazwa_tarty]}</li>
EOD;
		} else {
			$slodkie .= <<<EOD
			<li>{$t[nazwa_tarty]}</li>
EOD;
		}
	}
	$slone .= "</ul>";
	$slodkie .= "</ul>";
} else {
	$slone = "";
	$slodkie = "";
}
?>
<h2>Oferta</h2>
<div id="oferta_menu">
	<ul>
		<li id="link_slone">Tarty słone<?php echo $slone;?></li>
		<li id="link_slodkie">Tarty słodkie<?php echo $slodkie;?></li>
		<li id="link_inne">Pozostałe</li>
	</ul>
</div>
<div id="oferta_box"></div>
<?php
include "layouts/footer.php";
?>