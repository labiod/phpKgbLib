<?php
include ("layouts/aheader.php");
?>
<div id="dodaj">
	<a id="add_button" href="/user/admin/add"><img class="icon"
		src="/public/images/add.png" alt="Dodaj użytkownika"
		title="Dodaj użytkownika" />Dodaj użytkownika</a>
</div>
<table id="tab_list" cellspacing="0">
	<tr>
		<th width="30px">Lp.</th>
		<th width="250px">Nazwa użytkownika</th>
		<th width="400px">login</th>
		<th>email</th>
		<th width="250px">Akcje</th>
	</tr>
<?php
$i = 1;
if ($this->admin != null) {
	$this->admin = $this->admin->toArray ();
	foreach ( $this->admin as $admin ) {
		
		?>
			<tr>
		<td><?php echo $i++; ?></td>
		<td><h3><?php echo $admin['nazwa']; ?></h3></td>
		<td><?php echo $admin['login']; ?></td>
		<td><?php echo $admin['email']; ?></td>
		<td><a href="/user/admin/edit/id/<?php echo $admin['id_admin']; ?>"><img
				class="icon" src="/public/images/modify_m.png" alt="edytuj"
				title="edytuj" /> edytuj</a> <a
			href="/user/admin/delete/id/<?php echo $admin['id_admin']; ?>"
			name="potwierdz" id="użytkownika <?php echo $admin['nazwa']; ?>"><img
				class="icon" src="/public/images/delete_m.png" alt="usuń"
				title="usuń" /> usuń</a></td>
	</tr>	
		<?php
	}
} else {
	?>
			<tr>
		<td colspan="6"
			style="text-align: center; font-weight: bold; font-size: 20px; padding: 3px;">Nie
			ma żadnych promocji</td>
	</tr>
		<?php
}
?>
						
		</table>
<?php include ("layouts/afooter.php"); ?>
