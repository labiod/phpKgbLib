<?php include ("layouts/header.php"); 	?>
<h2 id="title">Logowanie</h2>  <div class="clear"></div> 
<?php AlertMessage::showMessage($this->msg); ?>
<form id="login_form" action="/login" method="post">
    <label for="login_adr">Login/E-mail</label>
    <input name="login" id="login_adr" type="text" required/> <br />
    <label for="pass">Hasło</label>
    <input type="password" name="password" id="pass" required /> <br />
    <input type="submit" value="Zaloguj" name="submit" />
</form>
<?php include ("layouts/footer.php"); ?>