<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OfertaMenu
 *
 * @author admin
 */
class OfertaMenu extends Component {
    //put your code here
    public function show($tarty = null, $zupy = null, $pozostale = null, $nalesniki = null) {
        if (!$tarty->isNull()){
            $tarty = $tarty->toArray();
            $wdl[] = "<li><a href='' class='rozwijalne' >z wędliną</a><ul style='display: none;' >\n";
            $k[] = "<li><a href='' class='rozwijalne' >z kurczakiem</a><ul style='display: none;' >\n";
            $r[] = "<li><a href='' class='rozwijalne' >z rybą</a><ul style='display: none;' >\n";
            $weg[] = "<li><a href='' class='rozwijalne' >wegetariańska</a><ul style='display: none;' >\n";
            $slodkie[] = "<ul style='display: none;' >\n";
            $wykwintne[] = "<ul style='display: none;' >\n";
            foreach ($tarty as $t){
                if($t['typ'] == 'slona'){
                    if($t['rodzaj'] == "wdl") {
                        $wdl[]= "<li><a href=\"/oferta/show/submodule/tarty/id/".$t['id_tarty']."\" >".$t['nazwa_tarty']."</a></li>";
                        continue;
                    }
                    if($t['rodzaj'] == "k") {
                        $k[] ="<li><a href=\"/oferta/show/submodule/tarty/id/".$t['id_tarty']."\" >".$t['nazwa_tarty']."</a></li>";
                        continue;
                    }
                    if($t['rodzaj'] == "r") {
                        $r[]="<li><a href=\"/oferta/show/submodule/tarty/id/".$t['id_tarty']."\" >".$t['nazwa_tarty']."</a></li>\n";
                        continue;
                    }
                    if($t['rodzaj'] == "weg") {
                        $weg[]="<li><a href=\"/oferta/show/submodule/tarty/id/".$t['id_tarty']."\" >".$t['nazwa_tarty']."</a></li>";
                        continue;
                    }
                } else if($t['typ'] == 'slodka'){
                    $slodkie[] ="<li><a href=\"/oferta/show/submodule/tarty/id/".$t['id_tarty']."\" >".$t['nazwa_tarty']."</a></li>";
                } else {
                    $wykwintne[]="<li><a href=\"/oferta/show/submodule/tarty/id/".$t['id_tarty']."\" >".$t['nazwa_tarty']."</a></li>";
                }
            }
            $wdl = implode("\n", $wdl)."</ul></li>";
            $k = implode("\n", $k)."</ul></li>";
            $r = implode("\n", $r)."</ul></li>";
            $weg = implode("\n", $weg)."</ul></li>";
            $slone = "\n<ul style='display: none;' >\n".$wdl.$k.$r.$weg."</ul>";
            $slodkie = implode("\n", $slodkie)."</ul>";
            $wykwintne = implode("\n", $wykwintne)."</ul>";
        }else {
            $slone = "";
            $slodkie = "";
            $wykwintne = "";
        }
        if($nalesniki != null && !$nalesniki->isNull()) {
            $nalesnik = "<ul style='display: none;' >\n";
            $nalesniki = $nalesniki->toArray();
            foreach ($nalesniki as $n){
                $nalesnik[]="<li><a href=\"/oferta/show/submodule/nalesniki/id/".$n['id_nalesnik']."\" >".$n['nazwa_nalesnika']."</a></li>";
            }
            $nalesnik = implode("\n", $nalesniki)."</ul>\n";
        } else {
            $nalesnik = "";
        }
        if($zupy != null && !$zupy->isNull()) {
            $zupa[] = "<ul style='display: none;' >\n";
            $zupy = $zupy->toArray();
            foreach ($zupy as $z){
                $zupa[]="<li><a href=\"/oferta/show/submodule/zupy/id/".$z['id_zupa']."\" >".$z['nazwa_zupy']."</a></li>";
            }
            $zupa = implode("\n", $zupa)."</ul>\n";
        } else {
            $zupa = "";
        }
        if($pozostale != null && !$pozostale->isNull()) {
            $poz[] = "<ul style='display: none;' >\n";
            $pozostale = $pozostale->toArray();
            foreach ($pozostale as $p){
                $poz[]="<li><a href=\"/oferta/show/submodule/pozostale/id/".$p['id_pozostale']."\" >".$p['nazwa_pozostale']."</a></li>";
            }
            $poz = implode("\n", $poz)."</ul>\n";
        } else {
            $poz = "";
        }
        $menu =<<<EOD
	<div id="oferta_menu">
		<ul id="oferta_ul">
			<li id="link_slone">
				<a class='rozwijalne' href='' >Tarty słone</a>{$slone}
			</li>
			<li id="link_slodkie">
				<a class='rozwijalne' href='' >Tarty słodkie</a>{$slodkie}
			</li>
			<li id="link_slodkie">
				<a class='rozwijalne' href='' >Tarty wykwintne</a>{$wykwintne}
			</li>
			<li id="link_inne">
				<a class='rozwijalne' href='' >Zupy</a>{$zupa}
			</li>
			
			<li id="link_inne">
				<a class='rozwijalne' href='' >Pozostałe</a>{$poz}
			</li>
            <li id="link_inne">
				<a class='rozwijalne' href='/oferta/show/submodule/cennik' >Cennik tart</a>
			</li>
		</ul>
	</div>
EOD;
        return $menu;
    }
}

?>
