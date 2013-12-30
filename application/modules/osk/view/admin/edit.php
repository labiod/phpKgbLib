<?php include ("layouts/aheader.php"); 	$osk = $this->osk;?>
<h2 id="title">OSK info: <?php echo $osk["nazwa"];?></h2>  <div class="clear"></div> 
<?php AlertMessage::showMessage($this->msg); ?>
<a href="/admin/osk" class="back_link">Powrót do listy OSK</a>
<form id="osk_info" action="<?php echo $this->action_link; ?>" method="post">
    <input type="hidden" value="<?php echo $osk["id_osk"];?>" name="id" />
    <div><label>Nazwa: </label><input type="text" value="<?php echo $osk["nazwa"];?>" name="nazwa" required /></div>
    <div><label>Numer: </label><input type="text" value="<?php echo $osk["nr"];?>" name="nr" required /></div>
    <div><label>Adres: </label><input type="text" value="<?php echo $osk["adres"];?>" name="adres" required /></div>
    <div><label>Kod: </label><input type="text" value="<?php echo $osk["kod"];?>" name="kod" required /></div>
    <div><label>Miasto: </label><input type="text" value="<?php echo $osk["miasto"];?>" name="miasto" required /></div>
    <div><label>Województwo: </label><input type="text" value="<?php echo $osk["wojewodztwo"];?>" name="wojewodztwo" required /></div>
    <div><label>NIP: </label><input type="text" value="<?php echo $osk["nip"];?>" name="nip" required/></div>
    <div><label>REGON: </label><input type="text" value="<?php echo $osk["regon"];?>" name="regon"/></div>
    <label>Aktywny: </label>
    <input name="active" id="osk_act_1" type="radio" value="1" <?php echo $osk["active"] ? "checked" : "" ?>/> tak
    <input name="active" id="osk_act_0" type="radio" value="0" <?php echo $osk["active"] ? "" : "checked" ?>/> nie<br />
    <input type="submit" value="Zapisz zmiany" name="submit" />

</form>
<?php include ("layouts/footer.php"); ?>