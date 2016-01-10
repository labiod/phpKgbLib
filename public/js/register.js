$(document).ready(function() {

	//rejestracja
/*	$("#register_form div").hide();
	$("#stepdiv_1").show();
	var nr = 1;
	var changeStep = function() {
		switch (nr) {
		case "1":
			$("#dalej").show();
			$("#wstecz").hide();
			$("#submit").hide();
			break;
		case "2":
			$("#dalej").show();
			$("#wstecz").show();
			$("#submit").hide();
			break;
		case "3":
			$("#dalej").hide();
			$("#wstecz").show();
			$("#submit").show();
			break;
		}
		$("#register_form div").hide();
		$("#stepdiv_" + nr).show();
	};
	$("#register_form legend").click(function() {
		nr = $(this).attr("id").split("_")[1];
		changeStep();
	});
	$("#dalej").click(function() {
		if (nr < 3) {
			nr++;
			changeStep();
		}

	});
	$("#wstecz").click(function() {
		if (nr > 1) {
			nr--;
			changeStep();
		}
	});

	$("#register_form").submit(function() {
		if ($("#email_adr").val() == null || $("#email_adr").val() == "" || $("#pass").val() == null || $("#pass").val() == "") {
			alert("Wypełnij pola e-mail oraz hasło!");
			return false;
		}
		if (($("#role").val() == "instruktor" || $("#role").val() == "osk") && ($("#nr").val() == null || $("#nr").val() == "")) {
			alert("Musisz podać numer!");
			return false;
		}
		return true;
	});*/
});