<?php include ("layouts/login_header.php"); ?>
<div id="Content">
	<form action="/other/upload" method="post"
		enctype="multipart/form-data">

		<label for="plik3">Załaduj plik: <input type="file" id="plik"
			name="plik" value="" />
		</label> <input type="submit" id="submit" style="color: black;"
			name="submit" value="Wyślij" />

	</form>
</div>

<?php include ("layouts/footer.php"); ?>

