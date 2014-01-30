<?php include ("layouts/header.php"); ?>
<h2 id="title">Rejestracja</h2>
<div class="clear"></div>
<ul id="inner_left_menu">
    <li><button id="kursantBtn">Kursant</button></li>
    <li><button id="instruktorBtn">Instruktor</button></li>
    <li><button id="oskBtn">OSK</button></li>
</ul>
<fieldset>
    <legend>Kursant</legend>
    <form id="register_form" action="/register/register" method="post">
            <input type="hidden" name="role" value="kursant" id="role"/> 
        <div id="nr_div">
            <label for="nr">Nr</label> <input name="nr" id="nr" />
        </div>
        <label for="email_adr">em@il</label> 
        <input name="email" id="email_adr" type="email" required /> <br /> 
        <label for="pass">Hasło</label>
        <input type="password" name="password" id="pass" required /> <br /> 
        <input type="submit" value="Rejestruj" name="submit" id="submit" />
    </form>
</fieldset>
<?php include ("layouts/footer.php"); ?>