<?php include ("layouts/header_log_reg.php"); ?>
<div id="register_box">
	<div class="inside_reg_box">
		<div class="ok_sign">OK!</div>
		<div class="ok_sign">OK!</div>
	</div>
	<div class="inside_reg_box steps">
		<ul id="steps_names">
			<li id="1_step_name" class="selected_step">Rejestracja</li>
			<li id="2_step_name"><?php echo $this->type; ?></li>
			<li id="3_step_name">Em@il</li>
			<li id="4_step_name">Potwierdź</li>
		</ul>
	</div>
	<div class="inside_reg_box">
		<form id="register_form" action="/register/register" method="post">
			<div class="register_step show_selected" id="1_step_box">
				<label><input type="radio" name="role_id" value="1" checked="checked" />Kursant</label><br />
				<label><input type="radio" name="role_id" value="3" />Instruktor</label><br />
				<label><input type="radio" name="role_id" value="2" />OSK</label><br />
			</div>
			<div class="register_step" id="2_step_box">
				<input name="firstname" required placeholder="Podaj swoje imię..." /><br />
				<input name="lastname" required placeholder="Podaj swoje nazwisko..." /><br />
				<input name="birthdate" required pattern="\d{1,2}/\d{1,2}/\d{4}" title="dd/mm/yyyy" placeholder="dd/mm/yyyy"/><br />
			</div>
			<div class="register_step" id="3_step_box">
				<input type="email" name="email" required placeholder="Podaj swój adres email..." /><br />
				<input type="password" name="password" required placeholder="Podaj swoje hasło..." /><br />
				<input type="password" name="password_conf" required placeholder="Potwierdź hasło..." /><br />
			</div>
			<div class="register_step" id="4_step_box">
				<img id="captcha" src="/public/securimage/securimage_show.php" alt="CAPTCHA Image" />
				<input type="text" name="captcha_code" size="10" maxlength="6" required />
				<a href="#" onclick="document.getElementById('captcha').src = '/public/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
				<input type="submit" name="submit" value="Zarejestruj" />
			</div>
			<div class="clear"></div>
			<div id="back_next_btns">
				<a href="#" id="back_btn">&lt;&lt;</a><a href="#" id="next_btn">&gt;&gt;</a>
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<?php include ("layouts/footer.php"); ?>