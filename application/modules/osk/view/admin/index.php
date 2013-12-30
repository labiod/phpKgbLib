<?php include ("layouts/aheader.php"); 	?>
<h2 id="title">Lista OSK</h2>  <div class="clear"></div> 
<?php AlertMessage::showMessage($this->msg); ?>
<table><caption>Lista OSK zarejestrowanych w serwisie</caption>
    <tr><th>Lp.</th><th>Nazwa</th><th>Numer</th><th>Województwo</th><th>Aktywny</th><th>Akcje</th></tr>
<?php if($this->osk != ""){ $i = 0;
 foreach($this->osk as $osk){?> 
    <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $osk["nazwa"];?></td>
        <td><?php echo $osk["nr"];?></td>
        <td><?php echo $osk["wojewodztwo"];?></td>
        <td><?php echo $osk["active"];?></td>
        <td>
            <a href="/admin/osk/details/id/<?php echo $osk["id_osk"];?>">podgląd</a> |
            <a href="/admin/osk/edit/id/<?php echo $osk["id_osk"];?>">edytuj</a> |
            <a href="/admin/osk/delete/id/<?php echo $osk["id_osk"];?>" class="potwierdz">usuń</a>
        </td>
    </tr>
 <?php } }else{?>
    <tr><td colspan="5">Brak zarejestrowanych OSK.</td></tr>
<?php }
?>
</table>
<?php include ("layouts/footer.php"); ?>