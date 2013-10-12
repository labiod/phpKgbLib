<?php
if (! $this->nalesnik->isNull ())
	$nalesnik = $this->nalesnik->toArray ();
if (! $this->skladniki->isNull ()) {
	$skladniki = $this->skladniki->toArray ();
	$skl_res = "Składniki:<br/>";
	foreach ( $skladniki as $skladnik ) {
		$skl_res .= $skladnik ['nazwa_skladnika'];
		if (++ $i < count ( $skladniki ))
			$skl_res .= "<br/>";
	}
}
$cena_tab = <<<EOD
		<table><tr><th>Cena</th></tr>
			   <tr>										
				 <td class="cena">{$nalesnik[0][cena]}</td>
			   </tr>	
		</table>
EOD;
$img = "";
if ($nalesnik [0] ['zdjecie_url'] != "")
	$img = "<a href=\"/data/nalesnik/" . $nalesnik [0] ['zdjecie_url'] . "\" class=\"galeria\">
				<img src=\"/data/nalesnik/m_" . $nalesnik [0] ['zdjecie_url'] . "\"  /></a>";
$oferta_box = <<<EOD
	<div id="oferta_box">
		<h3 id="oferta_nazwa" >{$nalesnik[0]['nazwa_nalesnika']}</h3>
		<div id="oferta_photo" >
			{$img}
			<div id="oferta_ceny">
				{$cena_tab}
			</div>
		</div>
		<div id="oferta_skl" >
			{$skl_res}
		</div>
	</div>
EOD;
if (isset ( $this->textOnly ) && $this->textOnly == true) {
	echo $oferta_box;
} else {
	include "layouts/header.php";
	?>
<div id="oferta">
	<?php
	
	echo loadModule ( "showOfertaMenu", $this->tarty, $this->zupy, $this->nalesniki, $this->pozostale );
	echo "\n" . $oferta_box;
	?>
	
</div>
<?php
	include "layouts/footer.php";
}
