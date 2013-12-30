<?php include ("layouts/uheader.php"); 	?>
<h2 id="title">Logowanie</h2>
<div class="clear"></div>
<?php AlertMessage::showMessage($this->msg); ?>
<form id="login_form" action="/user/oskSite" method="post">
	<label for="osk_id">Wybierz OSK</label> 
        <select id="osk_id" type="select" name="osk_id" required >   
            <?php if(!isset($this->oskList) ){ ?>
            <option  value="" >Brak przypisanych OSK</option> 
            <?php } else{?>
            <?php foreach ($this->oskList as $osk) {?>
            <option value="<?php echo $osk['id_osk'];?>" ><?php echo $osk['nazwa'];?></option> 
            <?php } }?>
            
        </select> <br/>
        <input type="submit" value="Zaloguj" name="submit" />
</form>
<?php include ("layouts/footer.php"); ?>