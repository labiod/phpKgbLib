<?php include ("layouts/login_header.php"); 	?>
<div class="clear"></div>
<?php AlertMessage::showMessage($this->msg); ?>
<fieldset id="login_fieldset">
    <legend>Logowanie</legend>
<form id="register_form" action="/user/login" method="post">
	<label for="email_adr">em@il</label>
        <input name="login" id="email_adr" type="text" required /> <br />
        <label for="pass">Hasło</label>
	<input type="password" name="password" id="pass" required /> <br />
        <input type="submit" value="Zaloguj" name="submit" id="submit" class="orange_button_big"/>
</form>
</fieldset>
<?php include ("layouts/footer.php"); ?>