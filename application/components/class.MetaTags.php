<?php
class MetaTags extends Component {
	public function show() {
		$meta = new Table ( "metatags" );
		$result = $meta->fetchAll ( "status = 1" );
		$res = "";
		if (! $result->isNull ()) {
			$res = "\n";
			foreach ( $result->getData () as $value ) {
				if ($value ["meta_key"] == "title") {
					$res .= "<title>" . $value ['meta_value'] . "</title>\n";
				}
				$res .= "<meta name=\"" . $value ['meta_key'] . "\" content=\"" . $value ['meta_value'] . "\" />\n";
			}
		}
		return $res;
	}
}