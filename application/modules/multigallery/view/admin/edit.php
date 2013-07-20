<?php include ("layouts/aheader.php"); 
$gall = $this->gallery;
$photos = $this->photos;
?>
		<form name="multigallery" action="/multigallery/admin/confirm" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $gall['id_gallery']; ?>" />
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Edytuj galerię</th>		
				</tr>
				<tr>
					<td class="left">Nazwa galerii: </td>
					<td class="right"><input type="text" name="g_name" class="itext" value="<?php echo $gall['name'];?>" /></td>
				</tr>
				<tr>
					<td class="left">Opis galerii: </td>
					<td class="right"><textarea class="itext" name="description"><?php echo $gall['description'];?></textarea></td>
				</tr>
				<tr>
					<td class="left">Zdjęcia: </td>
					<td class="right">
						<input type="file" id="photo" name="file" size="30" />
						<div id="up_photo" class="uploadImg" >
							<?php if(isset($photos)){
								$i = 0;
								foreach($photos as $photo){
									if($photo['id_photo'] == $gall['photo_id'])
										$main = true;
									else 
										$main = false;
							?>
							<div id="ch_photo_<?php echo $i;?>" class="upImage">
								<a href="/<?php echo $photo['path']; ?>" class="galeria" rel="g"><img src="/<?php echo $photo['path_mini'];?>" alt="foto" /></a>
								<input type='hidden' name='file_up[]' value="/<?php echo $photo['path'];?>" /><br/>
								<input id='photo_<?php echo $i;?>' type='button' style='margin-top: 5px;' class='remover button' value='Usuń' />
								<input type='radio' name='main_photo' value="/<?php echo $photo['path'];?>" <?php if($main) echo "checked";?>/> zdjęcie główne
							</div>
							<?php $i++; }
							}?>
						</div>
					</td>
				</tr>
				<tr>
					<td class="left">Widoczność: </td>
					<td class="right"><input name="visible" type="checkbox" class="iradio" <?php if($gall['visible']=="y") echo "checked";?> /> widoczna</td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/multigallery/admin" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
						<input type="submit" id="submit" name="submit" class="button" value="Zatwierdź" />
					</td>
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); 