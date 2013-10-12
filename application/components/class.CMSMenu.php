<?php
class CMSMenu extends Component {
	public function show($type = 1) {
		$text = <<<EOD
	<div id="left_div" >
EOD;
		$g_menu = new Table ( "menu_group" );
		$menu = new Table ( "menu" );
		$gm = $g_menu->fetchAll ( "", "order_by" );
		$gm = $gm->toArray ();
		foreach ( $gm as $gmm ) {
			$text .= <<<EOD
		<div class="div_head">{$gmm["group_name"]}</div>
		<ul class="leftmenu" >
EOD;
			$m = $menu->fetchAll ( "group_id = " . $gmm ['id_menu_group'], "kolejnosc" );
			$m = $m->toArray ();
			foreach ( $m as $mm ) {
				$text .= <<<EOD
			<li><a href='{$mm['url']}' >{$mm['name']}</a></li>
EOD;
			}
			$text .= <<<EOD
		</ul>
EOD;
		}
		$text .= <<<EOD
	</div>
EOD;
		return $text;
	}
}