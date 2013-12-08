<?php include ("layouts/header.php"); 	?>
<h2 id="title">Logowanie</h2>
<div class="clear"></div>
<?php AlertMessage::showMessage($this->msg); ?>
<form id="login_form" action="/user/oskSite" method="post">
	<label for="osk_id">Wybierz OSK</label> 
        <select id="osk_id" type="select" required >   
            <?php if(isset($this->oskList) ){ ?>
            <option name="" value="Brak przypisanych OSK" /> 
            <?php } else{?>
            <?php foreach ($this->oskList as $osk) {?>
                 <option name="" value="Brak przypisanych OSK" /> 
            <?php } }?>
            
        </select> 
        <input type="submit" value="Zaloguj" name="submit" />
</form>
<?php include ("layouts/footer.php"); ?>