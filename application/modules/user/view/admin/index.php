<?php include ("layouts/aheader.php"); 	?>
<h2 id="title"><?php echo $this->caption; ?></h2>  <div class="clear"></div> 
<?php AlertMessage::showMessage($this->msg); ?>
<table>
    <tr><th>Lp.</th><th>Nazwisko</th><th>Imie</th><th>E-mail</th><th>Miasto</th><th>Aktywny</th><th>Akcje</th></tr>
<?php if($this->users != ""){ $i = 0;
 foreach($this->users as $users){?> 
    <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $users["nazwisko"];?></td>
        <td><?php echo $users["imie"];?></td>
        <td><?php echo $users["email"];?></td>
        <td><?php echo $users["miasto"];?></td>
        <td><?php if($users["active"] == 'Y'){?>
             tak
            <?php }else{ ?>
             nie <a href="/admin/user/confirmUser/id/<?php echo $users["id_user"];?>">uaktywnij</a>
             <?php } ?>
        </td>
        <td>
            <a href="/admin/user/details/id/<?php echo $users["id_user"];?>">podgląd</a> |
            <a href="/admin/user/edit/id/<?php echo $users["id_user"];?>">edytuj</a> |
            <a href="/admin/user/delete/id/<?php echo $users["id_user"];?>" class="potwierdz">usuń</a>
        </td>
    </tr>
 <?php } }else{?>
    <tr><td colspan="5">Brak zarejestrowanych użytkowników.</td></tr>
<?php }
?>
</table>
<?php include ("layouts/footer.php"); ?>