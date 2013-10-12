<?php
if (! $this->zupa->isNull ())
	$zupa = $this->zupa->toArray ();
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
		<table><tr><th>Cena małej</th><th>Cena dużej</th></tr>
			   <tr>										
				 <td class="cena">{$zupa[0][cena_mala]}</td>
				 <td class="cena">{$zupa[0][cena_duza]}</td>
			   </tr>	
		</table>
EOD;
$img = "";
if ($zupa [0] ['zdjecie_url'] != "")
	$img = "<a href=\"/data/zupy/" . $zupa [0] ['zdjecie_url'] . "\" class=\"galeria\">
				<img src=\"/data/zupy/m_" . $zupa [0] ['zdjecie_url'] . "\"  /></a>";
$oferta_box = <<<EOD
	<div id="oferta_box">
		<h3 id="oferta_nazwa" >{$zupa[0]['nazwa_zupy']}</h3>
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
	
	echo loadModule ( "showOfertaMenu", $this->tarty, $this->zupy, $this->pozostale );
	echo "\n" . $oferta_box;
	?>
	
</div>
<?php
	include "layouts/footer.php";
}
