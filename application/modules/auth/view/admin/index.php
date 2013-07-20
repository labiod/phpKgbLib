<?php
	include "layouts/uheader.php";
?>
	<?php if(isset($this->message)) {
	?><h3 id="message" ><?php echo $this->message; ?></h3>
	<?php } ?>
	<div id="logowanie" >
			<div class="div_head" >Logowanie</div>
			<form action="/auth/admin/login" method="post" >
				<table>
					<tr>
						<td class="left">Login: </td>
						<td class="right"><input class="itext" type="text" name="user_name" id="user_name" value="" /></td>
					</tr>
					<tr>
						<td class="left">Hasło: </td>
						<td class="right"><input class="itext" type="password" name="user_pass" id="user_pass" value="" /></td>
					</tr>
					<tr>
						<td colspan="2" ><input type="submit" class="button" name="submit" id="submit" value="Zaloguj" /></td>
					</tr>
				</table>
			</form>
	</div>
<?php 
	include "layouts/afooter.php";
?>