<?php include ("layouts/aheader.php"); 
?>
		<div id="dodaj" ><a id="add_button" href="/oferta/admin/add/submodule/cennik" ><img class="icon" src="/public/images/add.png" alt="Dodaj grupę cenową" title="Dodaj grupę cenową" /> Dodaj nowy cennik</a></div>
		<table id="tab_list" cellspacing="0">
			<tr>
				<th width="30px" >Lp.</th><th width="200px" >Nazwa grupy</th><th width="130px">Cena małej</th><th width="130px">Cena średniej</th><th width="130px">Cena dużej</th><th width="200px">Akcje</th>
			</tr>
<?php 
	$i = 1;
	if($this->cennik != null && $this->cennik->count() != 0) {
		$this->cennik = $this->cennik->toArray();
		foreach($this->cennik as $cennik) {
		?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><h3><?php echo $cennik['nazwa_grupy']; ?></h3></td>
				<td><h3><?php echo $cennik['cena_16']; ?></h3></td>
				<td><h3><?php echo $cennik['cena_20']; ?></h3></td>
				<td><h3><?php echo $cennik['cena_30']; ?></h3></td>
				<td><a href="/oferta/admin/edit/submodule/cennik/id/<?php echo $cennik['id_grupa_cenowa']; ?>" ><img class="icon" src="/public/images/modify_m.png" alt="edytuj" title="edytuj" /> edytuj</a>
				 <a href="/oferta/admin/delete/submodule/cennik/id/<?php echo $cennik['id_grupa_cenowa']; ?>" name="potwierdz" id="Cennik" ><img class="icon" src="/public/images/delete_m.png" alt="usuń" title="usuń" /> usuń</a></td>
			</tr>	
		<?php 
		}
	} else {
		?>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;" >Lista grup cenowych jest pusta</td>
			</tr>
		<?php 
	}
    if(sizeof($this->content->getData()) == 1) {
        $content = $this->content->getData();
?>
						
		</table>
        <form action="/oferta/admin/contentChange/submodule/cennik" method="post" >
        <table id="tab_edit" cellspacing="0">
            <tr>
                <th colspan="2">Edycja treść</th>		
            </tr>
            <tr>
                <td class="left">Tytuł:</td>
                <td class="right"><input class="itext" type="text" id="title" name="title" value="<?php echo $content[0]['title']; ?>" /></td>
            </tr>

            <tr>
                <td class="left">Treść:</td>
                <td class="right">
                    <textarea id="text" name="text" cols="40" rows="15"><?php echo $content[0]['text']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="cntr"><input class="button" type="submit" id="submit" name="submit" value="Zapisz" />
            <input type="hidden" id="id_content" name="id_content" value="<?php echo $content[0]['id_content']; ?>" /></td>
            </tr>
        </table>		
        </form>
<?php }
include ("layouts/afooter.php"); ?>
