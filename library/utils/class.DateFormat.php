<?php
class DateFormat {
	static public function getMonth($month, $lang= "pl") {
		switch($month) {
			case 1: $res = "Styczeń"; break;
			case 2: $res = "Luty"; break;
			case 3: $res = "Marzec"; break;
			case 4: $res = "Kwiecień"; break;
			case 5: $res = "Maj"; break;
			case 6: $res = "Czerwiec"; break;
			case 7: $res = "Lipiec"; break;
			case 8: $res = "Sierpień"; break;
			case 9: $res = "Wrzesień"; break;
			case 10: $res = "Październik"; break;
			case 11: $res = "Listopad"; break;
			case 12: $res = "Grudzień"; break;
			default:
				$res = "Styczeń"; break;	
		}
		return $res;
	}
	static public function format($date, $function = "") {
		if($function != "") {
			$res = $function($date);
			return $res;
		}
		$tab = explode("-", $date);
		if(count($tab) > 2)
			return $tab[2]." ".DateFormat::getMonth($tab[1])." ".$tab[0];
		return DateFormat::getMonth($tab[1])." ".$tab[0];
	}
}