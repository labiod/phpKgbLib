<?php include ("layouts/aheader.php"); 	?>
<h2 id="title">Rejestracja OSK</h2>  <div class="clear"></div> 
<?php AlertMessage::showMessage($this->msg); ?>
<form id="osk_info" action="<?php echo $this->action_link; ?>" method="post">
    <label for="osk_name">Nazwa ośrodka: </label>
    <input name="osk_name" id="osk_name" type="text" required/> <br />
    <label for="osk_nr">Numer ośrodka: </label>
    <input name="osk_nr" id="osk_nr" type="text" required/> <br />
    <label for="osk_adr">Adres: </label>
    <input name="osk_adr" id="osk_adr" type="text" required/> <br />
    <label for="osk_miasto">Miasto: </label>
    <input name="osk_miasto" id="osk_miasto" type="text" required/><br/>
    <label for="osk_kod">Kod: </label>
    <input name="osk_kod" id="osk_kod" type="text" required/> <br />
    <label for="osk_woj">Województwo: </label>
    <input name="osk_woj" id="osk_woj" type="text" required/> <br />
    <label for="osk_nip">NIP: </label>
    <input name="osk_nip" id="osk_nip" type="text" size="11" required/> <br />
    <label for="osk_reg">REGON: </label>
    <input name="osk_reg" id="osk_reg" type="text" size="14" /> <br />
    <label>Aktywny: </label>
    <input name="osk_act" id="osk_act_1" type="radio" value="1"/> tak
    <input name="osk_act" id="osk_act_0" type="radio" value="0" checked/> nie<br />
    <input type="submit" value="Rejestruj" name="submit" />
</form>
<?php include ("layouts/footer.php"); ?>