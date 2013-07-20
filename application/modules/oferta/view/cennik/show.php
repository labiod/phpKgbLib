<?php
    include "layouts/header.php";
    echo "<div id=\"oferta\">";
	echo Application::loadComponent("OfertaMenu", $this->tarty, $this->zupy, $this->pozostale);
    if($this->cennik->getData() > 0) {
        $cenniki = $this->cennik->getData();
?>
    <div id="oferta_box">
		<div id="oferta_main">
        <h3 id="oferta_nazwa">Cenniki</h3>
        <table id="cennik" cellpadding="0" cellspacing="0">
            <tr>
                <th></th><th>Tarteletki</th><th>Tarta średnia (ok.20cm)</th><th>Tarta duża (ok.30cm)</th>
            </tr>
        <?php
            foreach($cenniki as $cennik) {
        ?>
            <tr>
                <td><?php echo $cennik["nazwa_grupy"];?></td>
                <td><?php echo $cennik["cena_16"];?></td>
                <td><?php echo $cennik["cena_20"];?></td>
                <td><?php echo $cennik["cena_30"];?></td>
            </tr>
        <?php
            }
        ?>
        </table>
<?php
        if($this->cennik->getData() > 0) {
            $cont = $this->content->getData();
?>
        <div class="akapit" >
			<?php echo $cont[0]["text"];?>
		</div>	
<?php   } ?>
        </div>
    </div>
<?php 	
    }
include "layouts/footer.php";
?>
