$(document).ready(function() {
	$(".register_step").hide();
	$(".register_step").first().show();
	$("#steps_names li").removeClass("selected_step");
	$("#steps_names li").first().addClass("selected_step");

	var nr = 1;
	var changeStep = function () {
		switch (nr) {
			case "1":
				$("#next_btn").show();
				$("#back_btn").hide();
				break;
			case "2":
			case "3":
				$("#next_btn").show();
				$("#back_btn").show();
				break;
			case "4":
				$("#next_btn").hide();
				$("#back_btn").show();
				break;
		}
		$(".register_step").hide();
		$("#" + nr + "_step_box").show();
		$("#steps_names li").removeClass("selected_step");
		$("#" + nr + "_step_name").first().addClass("selected_step");
	}

	$("#next_btn").click(function () {
		validate();
		if (nr < 4) {
			nr++;
			changeStep();
		}
	});
	$("#back_btn").click(function () {
		validate();
		if (nr > 1) {
			nr--;
			changeStep();
		}
	});
	$("#register_form").submit(function () {
		return validate();
	});

	var validate = function() {
		if ($("#password").val() != $("#password_conf").val()) {
			alert("Hasła nie są jednakowe!");
			$("#password_conf").focus();
			return false;
		}
		return true;
	}
	//rejestracja
	/*	
	};
	$("#register_form legend").click(function() {
		nr = $(this).attr("id").split("_")[1];
		changeStep();
	});

	*/
});