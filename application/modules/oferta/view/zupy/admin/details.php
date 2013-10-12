<?php
include ("layouts/aheader.php");
$zupy = $this->zupy->toArray ();
?>
<table id="tab_edit" cellspacing="0">
	<tr>
		<th colspan="2">Szczegóły zupy</th>
	</tr>
	<tr>
		<td class="left">Nazwa zupy:</td>
		<td class="right"><?php echo $zupy[0]['nazwa_zupy']; ?></td>
	</tr>
	<tr>
		<td class="left">Cena mała:</td>
		<td class="right"><?php echo $zupy[0]['cena_mala']; ?></td>
	</tr>
	<tr>
		<td class="left">Cena duża:</td>
		<td class="right"><?php echo $zupy[0]['cena_duza']; ?></td>
	</tr>
	<tr>
		<td class="left">Składniki:</td>
		<td class="right">
				        <?php
												if (! $this->zlaczenia->isNull ()) {
													$liczba = 0;
													$skladniki = $this->zlaczenia->toArray ();
													foreach ( $skladniki as $skladnik ) {
														echo $skladnik ["nazwa_skladnika"];
														if ($liczba < $this->zlaczenia->count () - 1)
															echo ", ";
														$liczba ++;
													}
												} else {
													echo "<h3>Do tej zupy nie dodano jeszcze składników, aby dodać składnik <a href=' /zupy/admin/edit/id/" . $zupy [0] ['id_zupa'] . "' >kliknij tutaj</a></h3>";
												}
												?>
					</td>
	</tr>

	<tr>
		<td colspan="2" class="cntr"><a
			href="/oferta/admin/index/submodule/zupy"><input type="button"
				id="redirect" name="redirect" class="button" value="Wróć" /></a>
	
	</tr>
</table>
<?php include ("layouts/afooter.php"); ?>