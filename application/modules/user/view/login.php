<?php include ("layouts/header.php"); 	?>
<h2 id="title" class="blue_button_big">Logowanie</h2>
<div class="clear"></div>
<ul id="inner_left_menu">
    <li class="orange_button_big"><button id="kursantBtn">Kursant</button></li>
    <li class="orange_button_big"><button id="instruktorBtn">Instruktor</button></li>
    <li class="orange_button_big"><button id="oskBtn">OSK</button></li>
</ul>
<div class="clear"></div>
<?php AlertMessage::showMessage($this->msg); ?>
<fieldset>
    <legend>Kursant</legend>
<form id="register_form" action="/user/login" method="post">
	<label for="login_adr">em@il</label> 
        <input name="login" id="login_adr" type="text" required /> <br />
        <label for="pass">Hasło</label>
	<input type="password" name="password" id="pass" required /> <br /> 
        <input type="submit" value="Zaloguj" name="submit" id="submit" class="orange_button_big"/>
</form>
</fieldset>
<?php include ("layouts/footer.php"); ?>