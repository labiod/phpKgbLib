<?php 
	$cont = $this->content->toArray();
	include ("layouts/header.php"); 	
?>
	<div id="Content">
		<h2><?php echo $cont[0]["title"]; ?></h2>
		<div class="akapit" >
			<?php echo $cont[0]["text"];?>
		</div>	
	</div>
<?php include ("layouts/footer.php"); ?>