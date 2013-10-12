<?php
class Utilities {
	static public function clear_dir($path) {
		$d = dir ( $path );
		while ( false !== ($entry = $d->read ()) ) {
			echo $entry . "<br />";
			if (trim ( $entry ) != '.' && $entry != "..") {
				if (is_dir ( $path . "/" . $entry )) {
					self::clear_dir ( $path . "/" . $entry );
				} else {
					if ($entry != "class.OtherController.php" || $entry != "class.Utilities.php")
						unlink ( $path . "/" . $entry );
				}
			}
		}
		$d->close ();
	}
	static public function dropDataBase($conn) {
		global $dbname;
		$sql = "DROP Database " . $dbname;
		$result = mysql_query ( $sql, $conn ) or die ( mysql_error () );
	}
	static public function trimBody($text, $limit = 1000, $sep = "<p", $num = 3) {
		/*
		 * echo "tekst ma długość : ".strlen($text); echo "<br/>jego wersja bez znaczników ma długość : ".strlen(Utilities::clearHtmlTag($text)); echo "<br />skrócony tekst to :".substr(Utilities::clearHtmlTag($text), 0, $limit); die();
		 */
		$trimmed = false;
		$index = 0;
		$tmp_text = $text;
		for($i = 0; $i < $num; $i ++) {
			$l = strpos ( $text, $sep, $index + 1 );
			if (is_integer ( $l )) {
				$index = $l;
				$trimmed = true;
			} else {
				$index = strlen ( $text ) - 1;
				$trimmed = false;
				break;
			}
		}
		if ($trimmed == true) {
			echo "główna";
			$newtext = substr ( $text, 0, $index );
			$pos = strrpos ( $newtext, "</p>" );
			if ($pos != - 1) {
				$newtext = substr ( $newtext, 0, $pos );
				$newtext .= " ...</p>";
			}
		} else {
			$tmp = String::clearHtmlTag ( $text );
			if (strlen ( $tmp ) > $limit) {
				$new = substr ( $tmp, 0, $limit - 1 );
				$pos = strrpos ( $new, " " );
				if ($pos < $limit && $pos != - 1)
					$new = substr ( $new, 0, $pos );
				$new = trim ( $new );
				echo $new;
				$start = strrpos ( $new, " " );
				$last_text = substr ( $new, $start );
				$last_text = trim ( $last_text );
				$last_text = str_replace ( ".", "", $last_text );
				$pos2 = strrpos ( $text, $last_text );
				$newtext = substr ( $text, 0, $pos2 );
				$newtext .= "...</p>";
			} else {
				$newtext = $text;
			}
		}
		return $newtext;
	}
	static public function trimParagraph($oldText, &$newText, $limit = 1000, $nump = 2) {
		if ($limit > strlen ( $oldText )) {
			$newText = $oldText;
			return false;
		}
		$newText = "";
		$trimmed = false;
		$tmp_text = $oldText;
		$index = - 1;
		$paragraph = array ();
		$p_index = 0;
		$paragraph [0] ['org_text'] = $oldText;
		$paragraph [0] ['cl_text'] = String::clearHtmlTag ( $oldText );
		$paragtaph [0] ['length'] = strlen ( trim ( $paragraph [0] ['cl_text'] ) );
		$text_len = 0;
		for($i = 0; $i < $nump; $i ++) {
			$l = strpos ( $oldText, "<p", $index + 1 );
			if (is_integer ( $l )) {
				$p_index = $i;
				$p_end = strpos ( $oldText, "</p>", $l + 1 );
				$buffer = substr ( $oldText, $l, $p_end + 4 - $l );
				$paragraph [$i] ['org_text'] = $buffer;
				$paragraph [$i] ['cl_text'] = String::clearHtmlTag ( $buffer );
				$paragtaph [$i] ['length'] = strlen ( trim ( $paragraph [$i] ['cl_text'] ) );
				$text_len += $paragtaph [$i] ['length'];
				if ($text_len >= $limit) {
					// $trimmed = true;
					break;
				}
				$index = $l;
				// $trimmed = true;
			} else {
				if ($text_len == 0) {
					$text_len = $paragtaph [0] ['length'];
				}
				$index = strlen ( $oldText ) - 1;
				// $trimmed = false;
				break;
			}
		}
		for($i = 0; $i < $p_index; $i ++)
			$newText .= "\n" . $paragraph [$i] ['org_text'];
		$zm = $text_len - $limit;
		if ($zm <= 0)
			$newText .= $paragraph [$p_index] ['org_text'];
		else {
			$t_len = $paragraph [$p_index] ['length'] / 2;
			$short_txt = substr ( $paragraph [$p_index] ['cl_text'], 0, - $zm );
			$e_pos = strrpos ( trim ( $short_txt ), " " );
			if ($e_pos < $zm) {
				$short_txt = substr ( $short_txt, 0, $e_pos );
			}
			$s_pos = strrpos ( trim ( $short_txt ), " " );
			$word = substr ( $short_txt, $s_pos, $e_pos - $s_pos );
			$word = trim ( str_replace ( ".", " ", $word ) );
			$word_len = strlen ( $word );
			if ($zm > $t_len) {
				$pos = strpos ( $paragraph [$p_index] ['org_text'], $word );
			} else {
				$pos = strrpos ( $paragraph [$p_index] ['org_text'], $word, - $zm );
			}
			$cut_txt = substr ( $paragraph [$p_index] ['org_text'], 0, $pos + $word_len );
			$cut_txt = String::corectText ( $cut_txt );
			$newText .= "\n" . $cut_txt;
		}
		
		return true;
	}
}