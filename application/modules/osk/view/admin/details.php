<?php include ("layouts/aheader.php"); 	$osk = $this->osk;?>
<h2 id="title">OSK info: <?php echo $osk["nazwa"];?></h2>  <div class="clear"></div> 
<?php AlertMessage::showMessage($this->msg); ?>
<a href="osk" class="back_link">Powrót do listy OSK</a>
<div id="osk_info">
    <div><label>Nazwa: </label><span><?php echo $osk["nazwa"];?></span></div>
    <div><label>Numer: </label><span><?php echo $osk["nr"];?></span></div>
    <div><label>Adres: </label><span><?php echo $osk["adres"];?><br/>
     <?php echo $osk["kod"]." ".$osk["miasto"];?></span></div>
    <div><label>Województwo: </label><span><?php echo $osk["wojewodztwo"];?></span></div>
    <div><label>NIP: </label><span><?php echo $osk["nip"];?></span></div>
    <div><label>REGON: </label><span><?php echo $osk["regon"];?></span></div>
    <div><label>Aktywny: </label><span><?php echo $osk["active"];?></span></div>
    <div><a href="/osk/edit/id/<?php echo $osk["id_osk"];?>">edytuj</a> |
    <a href="/osk/delete/id/<?php echo $osk["id_osk"];?>" class="potwierdz">usuń</a></div>
</div>
<?php include ("layouts/footer.php"); ?>