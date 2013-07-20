<?php include ("layouts/aheader.php"); 
$admin = $this->admin->toArray();

?>	
		<form name="promocje" action="/admin/admin/confirm" method="post" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Edytuj Promocje</th>		
				</tr>
				<tr>
					<td class="left">Nazwa:</td>
					<td class="right"><input class="itext" type="text" id="nazwa" name="nazwa" value="<?php echo $admin[0]['nazwa']; ?>" /></td>
				</tr>
				<tr>
					<td class="left">Login:</td>
					<td class="right"><input class="itext" type="text" id="login" name="login" value="<?php echo $admin[0]['login']; ?>" /></td>
				</tr>
				<tr>
					<td class="left">Hasło:</td>
					<td class="right"><input class="itext" type="password" id="haslo" name="haslo" value="<?php echo $admin[0]['haslo']; ?>" /></td>
				</tr>
				<tr>
					<td class="left">E-mail:</td>
					<td class="right"><input class="itext" type="text" id="email" name="email" value="<?php echo $admin[0]['email']; ?>" /></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr"><input type="submit" id="submit" name="submit" class="button" value="Edytuj" />
						<input type="hidden" name="id_admin" value="<?php echo $admin[0]['id_admin']; ?>" />
					</td>
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); ?>
