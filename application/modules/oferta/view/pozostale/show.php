<?php
	if (! $this->poz->isNull())
		$poz = $this->poz->toArray();
		$cena_tab =<<<EOD
		<table><tr><th>Cena</th><th>Ilość</th></tr>
			   <tr>										
				 <td class="cena">{$poz[0][cena]}</td>
				 <td class="cena">{$poz[0][ilosc]}</td>
			   </tr>	
		</table>
EOD;
	$img = "";
	if($poz[0]['zdjecie_url'] != "") 
		$img = "<a href=\"/data/pozostale/".$poz[0]['zdjecie_url']."\" class=\"galeria\">
				<img src=\"/data/pozostale/m_".$poz[0]['zdjecie_url']."\"  /></a>";
	$oferta_box =<<<EOD
	<div id="oferta_box">
		<h3 id="oferta_nazwa" >{$poz[0]['nazwa_pozostale']}</h2>
		<div id="oferta_photo" >
			{$img}
			<div id="oferta_ceny">
				{$cena_tab}
			</div>
		</div>
	</div>
EOD;
	if(isset($this->textOnly) && $this->textOnly == true) {
		echo $oferta_box;
	} else {
	include "layouts/header.php";
?>
<div id="oferta">
	<?php echo loadModule("showOfertaMenu", $this->tarty, $this->zupy, $this->pozostale); 
		echo $oferta_box;
	?>
</div>
<?php 	
include "layouts/footer.php";
}
?>


