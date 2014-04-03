<?php include ("layouts/header.php"); ?>
<h2 id="title" class="orange_button_big">Rejestracja</h2>
<div class="clear"></div>
<fieldset>
    <form id="register_form" action="/register/register" method="post">
        <legend id="step_1">Krok 1</legend><legend id="step_2">Krok 2</legend><legend id="step_3">Krok 3</legend>
        <div class="clear"></div>
    <div id="stepdiv_1">
        <label for="email_adr">em@il</label> 
        <input name="email" id="email_adr" type="email" required /> <br /> 
        <label for="pass">Hasło</label>
        <input type="password" name="password" id="pass" required /> <br /> 
    </div>    
    <div id="stepdiv_2">
        Miałeś mi powiedzieć, co tu ma być...
    </div>   
    <div id="stepdiv_3">
       I tu też!
    </div> 
    <input type="button" value="Wstecz" id="wstecz" class="blue_button_big" hidden/>
    <input type="button" value="Dalej" id="dalej" class="blue_button_big" />
    <input type="submit" value="Rejestruj" name="submit" id="submit" class="blue_button_big" hidden/>
    </form>
</fieldset>
<?php include ("layouts/footer.php"); ?>