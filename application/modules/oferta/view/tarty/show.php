<?php
	if (! $this->tTart->isNull())
		$tTart = $this->tTart->toArray();
	if (! $this->skladniki->isNull()) {
		$skladniki = $this->skladniki->toArray();
		$skl_res = "Składniki:<br/>";
        $i = 0;
		foreach($skladniki as $skladnik) {
			$skl_res .=	$skladnik['nazwa_skladnika'];
			if(++$i < count($skladniki))
				$skl_res .="<br/>"; 
		}
	}

	if($tTart[0]['dostepna']!=1){
		$d = "niedostępna";
	}else{
		$d = "";
	}
	$img = "";
	if($tTart[0]['zdjecie_url'] != "")
		$img = "<a href=\"/data/tarty/".$tTart[0]['zdjecie_url']."\" class=\"galeria\">
					<img src=\"/data/tarty/m_".$tTart[0]['zdjecie_url']."\"  alt=\"Brak zdjęcia\" /></a>";
	$oferta_box =<<<EOD
	<div id="oferta_box">
		<div id="oferta_full">
			<h3 id="oferta_nazwa" >{$tTart[0]['nazwa_tarty']}</h3>
			<div id="oferta_photo" >
				{$img}
			</div>
			<div id="oferta_skl" >
				{$skl_res}
				<div id="ndst">$d</div>
			</div>
		</div>		
	</div>
EOD;

	if(isset($this->textOnly) && $this->textOnly == true) {
        echo "hello";
		echo $oferta_box;
	} else {
        die("dupa");
	include "layouts/header.php";
?>
<div id="oferta">
	<?php echo Application::loadComponent("OfertaMenu", $this->tarty, $this->zupy, $this->pozostale);
	echo "\n".$oferta_box; 
	?>
</div>
<?php 	
include "layouts/footer.php";
}