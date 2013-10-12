<?php include ("layouts/header.php"); ?>
<div class="title">
	<h3 class="title">Darmowa wycena</h3>
</div>
<div class="akapit">
	<form action="/other/wycena" method="post">
		<label for="imie_nazwisko">Imię i Nazwisko: <input type="text"
			id="imie_nazwisko" name="imie_nazwisko" value="" />
		</label> <label for="eMail">eMail: <input type="text" id="eMail"
			name="eMail" value="" />
		</label> <label for="telefon">Telefon: <input type="text" id="telefon"
			name="telefon" value="" />
		</label> <label for="jezyk">Język tłumaczenia: <select id="jezyk"
			name="jezyk">
				<option value="pn">polski niemiecki</option>
				<option value="np">niemiecki polski</option>
		</select>
		</label> <label for="termin">Termin realizacji zlecenia: <input
			type="text" id="termin" name="termin" value="" />
		</label> <label for="uwagi" id="area">Uwagi: <textarea id="uwagi"
				name="uwagi" cols="30" rows="10"></textarea>
		</label> <label for="plik1">Załącz plik 1: <input type="file"
			id="plik1" name="plik1" value="" />
		</label> <label for="plik2">Załącz plik 2: <input type="file"
			id="plik2" name="plik2" value="" />
		</label> <label for="plik3">Załącz plik 3: <input type="file"
			id="plik3" name="plik3" value="" />
		</label> <input type="submit" id="submit" name="submit" value="Wyślij" />

	</form>
</div>
<?php include ("layouts/footer.php"); ?>
