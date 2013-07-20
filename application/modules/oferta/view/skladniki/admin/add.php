<?php 
	$site =<<<EOD
	<form name="skladniki" action="/oferta/admin/confirm/submodule/skladniki" class="{$this->popup}" method="post" enctype="multipart/form-data">
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Dodaj składnik</th>		
				</tr>
				<tr>
					<td class="left">Nazwa składnika:</td><td class="right"><input class="itext" type="text" id="nazwa_skladnika" name="nazwa_skladnika" value="" /></td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
					<a href="/oferta/admin/index/submodule/skladniki" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
					<input type="submit" id="submit" name="submit" class="button" value="Dodaj" />
				</tr>
			</table>
			
	</form>
EOD;
	if($this->textOnly)
		echo $site;
	else {
		include ("layouts/aheader.php"); 
		echo $site;
		include ("layouts/afooter.php"); 
	}
?>
