<?php
$cont = $this->content->toArray ();
include ("layouts/header.php");

?>
<div id="Content">
		
			<?php if ($cont[0]["title"] != "") echo "<div class='Offer bx'><h2>".$cont[0]["title"]."</h2>"; ?>
			<div class="akapit">
				<?php echo $cont[0]["text"];?>
			</div>	
		    <?php if ($cont[0]["title"] != "") echo "</div>"; ?>
	
	</div>
<?php
include ("layouts/footer.php");
?>
	
	
	
	