<?php
function pr($var) {
	if (gettype ( $var ) == "object" || gettype ( $var ) == "array") {
		foreach ( $var as $key => $value ) {
			echo "(" . $key . ") => [<br />";
			pr ( $value );
			echo "<br />]<br />";
		}
	} else if (gettype ( $var ) == "resource") {
		var_dump ( $var );
	} else {
		echo $var;
	}
}

if (! function_exists ( 'getallheaders' )) {
	function getallheaders() {
		foreach ( $_SERVER as $name => $value ) {
			$headers [eregi_replace ( "_", "-", $name )] = $value;
		}
		return $headers;
	}
}
