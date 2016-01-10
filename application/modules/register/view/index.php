<?php include ("layouts/header_log_reg.php"); ?>
<div id="register_box">
	<div class="inside_reg_box">
		<div class="ok_sign">OK!</div>
	</div>
	<div class="inside_reg_box steps">
		<ul>
			<li id="1_step_name">Rejestracja</li>
			<li>&dArr;</li>
			<li id="2_step_name" class="selected_step"><?php echo $this->type; ?></li>
			<li>&dArr;</li>
			<li id="3_step_name">Em@il</li>
			<li>&dArr;</li>
			<li id="4_step_name">Potwierdź</li>
		</ul>
	</div>
	<div class="inside_reg_box">
		<form id="register_form" action="/register/register" method="post">
			<div class="register_step">
				przyciski
			</div>
			<div class="register_step" id="1_step_box">
				<label><input type="radio" name="role_id" value="1" />Kursant</label><br />
				<label><input type="radio" name="role_id" value="3" />Instruktor</label><br />
				<label><input type="radio" name="role_id" value="2" />OSK</label><br />
			</div>
			<div class="register_step selected_step_box" id="2_step_box">
				<input name="firstname" placeholder="Podaj swoje imię..." /><br />
				<input name="lastname" placeholder="Podaj swoje nazwisko..." /><br />
				<input type="date" name="birthdate" /><br />
			</div>
			<div class="register_step" id="3_step_box">
				<input type="email" name="email" placeholder="Podaj swój adres email..." /><br />
				<input type="password" name="password" placeholder="Podaj swoje hasło..." /><br />
				<input type="password" name="password_conf" placeholder="Podaj swoją datę urodzienia..." /><br />
			</div>
		</form>
	</div>
	<div class="clear"></div>

	<div class="clear"></div>
	<div id="back_next">
		<a href="#">&lt;&lt;</a><a href="#">&gt;&gt;</a>
	</div>
</div>
<div class="clear"></div>
<!--<fieldset>
    <form id="register_form" action="/register/register" method="post">
        <legend id="step_1">Krok 1</legend><legend id="step_2">Krok 2</legend><legend id="step_3">Krok 3</legend>
        <div class="clear"></div>
    <div id="stepdiv_1">
        <label for="imie">Imię</label> 
        <input name="imie" id="imie" type="text" required /> <br /> 
        <label for="nazwisko">Nazwisko</label>
        <input name="nazwisko" id="nazwisko" type="text" required /> <br /> 
    </div>    
    <div id="stepdiv_2">
        <label for="email_adr">em@il</label> 
        <input name="email" id="email_adr" type="email" required /> <br /> 
        <label for="pass">Hasło</label>
        <input type="password" name="password" id="pass" required /> <br /> 
    </div>   
    <div id="stepdiv_3">
       <img id="captcha" src="/public/securimage/securimage_show.php" alt="CAPTCHA Image" />
       <input type="text" name="captcha_code" size="10" maxlength="6" />
       <a href="#" onclick="document.getElementById('captcha').src = '/public/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
    </div> 
    <input type="button" value="Wstecz" id="wstecz" class="blue_button_big" hidden/>
    <input type="button" value="Dalej" id="dalej" class="blue_button_big" />
    <input type="submit" value="Rejestruj" name="submit" id="submit" class="blue_button_big" hidden/>
    </form>
</fieldset>-->


<?php include ("layouts/footer.php"); ?>