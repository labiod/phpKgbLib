<?php include ("layouts/header.php"); 	?>
<h2 id="title">Rejestracja</h2>  <div class="clear"></div> 
<form id="register_form" action="/register/register" method="post">
    <input type="radio" name="role" value="kursant" checked="checked" id="kur"/>  
    <label for="kur">Kursant</label>
    <input type="radio" name="role" value="osk" id="osk" /> 
    <label for="osk">OSK</label>
    <input type="radio" name="role" value="instruktor" id="ins"/> 
    <label for="ins">Instruktor</label>
    <div id="nr_div">
    <label for="nr">Nr</label>
    <input name="nr" id="nr"/> </div>
    <label for="email_adr">E-mail</label>
    <input name="email" id="email_adr" type="email" required/> <br />
    <label for="pass">Hasło</label>
    <input type="password" name="password" id="pass" required /> <br />
    <input type="submit" value="Rejestruj" name="submit" />
</form>
<?php include ("layouts/footer.php"); ?>