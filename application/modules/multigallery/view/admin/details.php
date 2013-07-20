<?php include ("layouts/aheader.php"); 
$gall = $this->gallery;
$photos = $this->photos;
?>
		<form name="multigallery" action="/multigallery/admin/confirm" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $gall['id_gallery']; ?>" />
			<table id="tab_edit" cellspacing="0">
				<tr>
					<th colspan="2">Podgląd galerii</th>		
				</tr>
				<tr>
					<td class="left">Nazwa galerii: </td>
					<td class="right"><?php echo $gall['name'];?></td>
				</tr>
				<tr>
					<td class="left">Opis galerii: </td>
					<td class="right"><?php echo $gall['description'];?></td>
				</tr>
				<tr>
					<td class="left">Zdjęcia: </td>
					<td class="right">
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
								<a href="/<?php echo $photo['path']; ?>" class="galeria" rel="g"><img src="/<?php echo $photo['path_mini'];?>" alt="foto" /></a><br />
								<?php if($main) echo "zdjęcie główne";?>
							</div>
							<?php $i++; }
							}?>
						</div>
					</td>
				</tr>
				<tr>
					<td class="left">Widoczność: </td>
					<td class="right"><?php echo ($gall['visible']=="y")? "widoczna" : "niewidoczna";?> </td>
				</tr>
				<tr>
					<td colspan="2" class="cntr">
						<a href="/multigallery/admin" ><input type="button" id="redirect" name="redirect" class="button" value="Wróć" /></a>
					</td>
				</tr>
			</table>
			
		</form>
<?php include ("layouts/afooter.php"); 