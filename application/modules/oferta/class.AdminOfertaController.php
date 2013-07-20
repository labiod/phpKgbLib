<?php
class AdminOfertaController extends AdminBasicController {
	protected function initAll() {	
		$this->_tarty = new Table("tarty");
		$this->_ceny = new Table("grupy_cenowe");	
        $this->_cenyContent = new Table("content");	
		$this->_skladniki = new Table("skladniki");
		$this->_zlaczenia = new Table("tarty_skladniki");	
		$this->_zupy = new Table("zupy");
		$this->_z_zlaczenia = new Table("zupy_skladniki");		
		$this->_nalesniki = new Table("nalesniki");
		$this->_n_zlaczenia = new Table("nalesniki_skladniki");	
		$this->_pozostale = new Table("oferta_pozostale");
	}
	public function indexAction(){
		$type = $this->getParam("submodule");
		$this->subModule = $type;	
		$this->_view->appendStyle("/public/css/admin_view.css");		
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :					
					$this->_view->tarty = $this->_tarty->fetchAll("","typ, nazwa_tarty");
					break;
				case "skladniki" :
					$this->_view->skladniki = $this->_skladniki->fetchAll("","nazwa_skladnika");
					break;
				case "cennik" :
                    $this->_view->appendStyle("/public/css/admin_edit.css");
                    $this->_view->content = $this->_cenyContent->fetchAll("id_content = 7");
					$this->_view->cennik = $this->_ceny->fetchAll("","cena_30");
					break;
				case "zupy" :
					$this->_view->zupy = $this->_zupy->fetchAll("","nazwa_zupy");
					break;  
				case "nalesniki" :
					$this->_view->nalesniki = $this->_nalesniki->fetchAll("","nazwa_nalesnika");
					break;
				case "pozostale" :
					$this->_view->pozostale = $this->_pozostale->fetchAll("","nazwa_pozostale");
					break;
			}
		}
		
	}
	public function detailsAction(){
		$type = $this->getParam("submodule");
		$this->subModule = $type;	
		$this->_view->appendStyle("/public/css/admin_details.css");		
		$id = $this->getParam("id", 0);
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :					
					$this->_view->tarta = $this->_tarty->fetchAll("id_tarty = ".$id);		
					$this->_zlaczenia->join("skladniki", "skladnika_id = id_skladnika");
					$this->_view->zlaczenia = $this->_zlaczenia->fetchAll("tarty_id = ".$id, "nazwa_skladnika");
					$this->_ceny->join("tarty", "ceny_id = id_grupa_cenowa");
					$this->_view->ceny = $this->_ceny->fetchAll("id_tarty = ".$id);
					$this->_view->style = "/public/css/admin_details.css";	
					break;
				case "zupy" :				
					$this->_view->zupy = $this->_zupy->fetchAll("id_zupa = ".$id);
					$this->_z_zlaczenia->join("skladniki", "skladnik_id = id_skladnika");
					$this->_view->zlaczenia = $this->_z_zlaczenia->fetchAll("zupa_id = ".$id, "nazwa_skladnika");
					break;
				case "nalesniki" :				
					$this->_view->nalesniki = $this->_nalesniki->fetchAll("id_nalesnik = ".$id);
					$this->_n_zlaczenia->join("skladniki", "skladnik_id = id_skladnika");
					$this->_view->zlaczenia = $this->_n_zlaczenia->fetchAll("nalesnik_id = ".$id, "nazwa_skladnika");
					break;
				case "pozostale" :
					break;
			}
		}
		
	}
	public function addAction(){
		$type = $this->getParam("submodule");
		$this->subModule = $type;	
		$this->_view->appendStyle("/public/css/admin_edit.css");		
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :
					$this->_view->ceny = $this->_ceny->fetchAll("","cena_30");	
					$this->_view->skladniki = $this->_skladniki->fetchAll("","nazwa_skladnika");	
					break;
				case "skladniki" :
					$this->_view->textOnly = $this->getParam("textOnly", false);
					if($this->_view->textOnly) {
						$this->_view->popup = "popup";
					}
					else 
						$this->_view->popup = "normal";
				case "cennik" :
					break;
				case "zupy" : 
				case "nalesniki" :
					$this->_view->skladniki = $this->_skladniki->fetchAll("", "nazwa_skladnika");
					break;
				case "pozostale" :
					break;
			}
		}
		
	}
	public function editAction() {
		$type = $this->getParam("submodule");
		$this->subModule = $type;		
		$id = $this->getParam("id", 0);	
		$this->_view->appendStyle("/public/css/admin_edit.css");	
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :
					$tarta = $this->_tarty->fetchAll("id_tarty = ".$id);
					$tarta = $tarta->toArray();
					$this->_view->tarta = $tarta[0];
					$this->_view->ceny = $this->_ceny->fetchAll("","cena_30");	
					$this->_view->skladniki = $this->_skladniki->fetchAll("", "nazwa_skladnika");
					$this->_view->zlaczenia = $this->_zlaczenia->fetchAll("tarty_id = ".$id);					
					break;
				case "skladniki" :
					break;
				case "cennik" :					
					$this->_view->cennik = $this->_ceny->fetchAll("id_grupa_cenowa = ".$id);
					break;
				case "zupy" :
					$this->_view->zupy = $this->_zupy->fetchAll("id_zupa = ".$id);
					$this->_view->skladniki = $this->_skladniki->fetchAll("", "nazwa_skladnika");
					$this->_view->zlaczenia = $this->_z_zlaczenia->fetchAll("zupa_id = ".$id);
					break;
				case "nalesniki" :
					$this->_view->nalesniki = $this->_nalesniki->fetchAll("id_nalesnik = ".$id);
					$this->_view->skladniki = $this->_skladniki->fetchAll("", "nazwa_skladnika");
					$this->_view->zlaczenia = $this->_n_zlaczenia->fetchAll("nalesnik_id = ".$id);
					break;
				case "pozostale" :
					$tmp = $this->_pozostale->fetchAll("id_pozostale = ".$id);		
					$tmp = $tmp->toArray();
					$this->_view->prod = $tmp[0];
					$this->_view->appendStyle("/public/css/admin_edit.css");
					break;
			}
		}
		
	}
    
    public function contentChangeAction() {
        $id = $this->getParam("id_content", "0");
		$tab = $this->getParametersMap();
		unset($tab['id_content']);
		unset($tab['submit']);
        unset($tab['submodule']);
		//$tab['text'] = eregi_replace("\"", "\\\"", $tab['text']);
		$tab['text'] = str_replace("'", "&#8242;", $tab['text']);
		$this->_cenyContent->update($tab, "id_content =".$id);
		$this->setMessage("Zmiany zostały zapisane");
		$this->forward("oferta/admin/index/submodule/cennik");
    }
	public function confirmAction(){
		$tab = $this->getParametersMap();
		$this->subModule = $tab['submodule'];		
		if($this->subModule != "") {
			if(isset($tab['file']))
				unset($tab['file']);
			unset($tab['submodule']);	
			$this->setSubModuleAdmin();
			switch($this->subModule) {
				case "tarty" :
					$tab_tarty["nazwa_tarty"] = $tab["nazwa_tarty"]; 
					$tab_tarty["typ"] = $tab["typ"]; 
					$tab_tarty["rodzaj"] = $tab["rodzaj"]; 
					$tab_tarty["ceny_id"] = $tab["ceny_id"]; 
					if($tab["dostepna"]=="on")
						$tab_tarty["dostepna"] = 1; 			
					else
						$tab_tarty["dostepna"] = 0;
					// dodawanie zdjęcia do tarty :
					/*if($_FILES['file']['error']==0){
						$foto = new Photo($_FILES['file'],"data/tarty/"); 
						$foto->createMiniFixed("200px");
						$foto->resizeFixed("400px"); //!!!!!!!!!!!!!
						$tab_tarty['zdjecie_url'] = $foto->getName();
					}else {
						$tab_tarty['zdjecie_url']="";
					}*/
					if(isset($tab['file_up'])) {
						$newPath = "data/tarty";
						$tab_tarty['zdjecie_url'] = Photo::movePict($tab['file_up'][0], $newPath, true);
					}
					//koniec dodawania zdjęcia
					$skladniki = $tab['sklad'];
					switch($tab['submit']){
						case "Dodaj":
							$index = $this->_tarty->insert($tab_tarty);
							if(count($skladniki) != 0) {
								$skl['tarty_id'] = $index;
								foreach($skladniki as $skladnik) {
									$skl['skladnika_id'] = $skladnik;
									$this->_zlaczenia->insert($skl);
								}	
							}
							$this->setMessage("Nowa tarta została dodana.");
							break;
						case "Edytuj":
							if($tab_tarty['zdjecie_url'] == "")
								unset($tab_tarty['zdjecie_url']);
							$index = $tab['id'];
							$this->_tarty->update($tab_tarty,"id_tarty = ".$index);
							if(count($skladniki) != 0) {
								$this->_zlaczenia->delete("tarty_id = ".$index);
								$skl['tarty_id'] = $index;
								foreach($skladniki as $skladnik) {
									$skl['skladnika_id'] = $skladnik;
									$this->_zlaczenia->insert($skl);
								}	
							}
							$this->setMessage("Tarta została zedytowana.");
							break;
						default:
							break;
					}
					$this->forward("oferta/admin/index/submodule/tarty");	
					break;
				case "skladniki" :
					if($this->getMethod() == "POST") {
						unset($tab['submit']);
						if(isset($tab['redirect']))
							unset($tab['redirect']);
						$result = $this->_skladniki->insert($tab);
						$this->setMessage("Składnik został dodany");
						$this->forward("oferta/admin/index/submodule/skladniki");
					}
					break;
				case "cennik" :					
					if($this->getMethod() == "POST") {
						$tab['cena_16'] = str_replace(",", ".", $tab['cena_16']);
						$tab['cena_20'] = str_replace(",", ".", $tab['cena_20']);
						$tab['cena_30'] = str_replace(",", ".", $tab['cena_30']);
						if($tab['submit'] == "Edytuj") {
							$id = $tab['id_grupa_cenowa'];
							unset($tab['id_grupa_cenowa']);
							unset($tab['submit']);
							$this->_ceny->update($tab, "id_grupa_cenowa = ".$id);
							$this->setMessage("Zedytowano grupę cenową");
						} else {
							unset($tab['submit']);
							$this->_ceny->insert($tab);
							$this->setMessage("Nowa grupa cenowa została dodana");
						}
					}
					$this->forward("oferta/admin/index/submodule/cennik");
					break;
				case "zupy" :					
					if($this->getMethod() == "POST") {
						$skladniki = $tab['sklad'];
						unset($tab['sklad']);
						$tab['cena_duza'] = str_replace(",", ".", $tab['cena_duza']);
						$tab['cena_mala'] = str_replace(",", ".", $tab['cena_mala']);
						if(isset($tab['file_up'])) {
							$newPath = "data/zupy";
							$tab['zdjecie_url'] = Photo::movePict($tab['file_up'][0], $newPath, true);
							unset($tab['file_up']);
						}
						if($tab['submit'] == "Edytuj") {
							if(!isset($tab['zdjecie_url']))
								$tab['zdjecie_url'] = "";
							$id = $tab['id_zupa'];
							unset($tab['id_zupa']);
							unset($tab['submit']);
							$this->_z_zlaczenia->delete("zupa_id = ".$id);
							if(count($skladniki) != 0) {
								$skl['zupa_id'] = $id;
								foreach($skladniki as $skladnik) {
									$skl['skladnik_id'] = $skladnik;
									$this->_z_zlaczenia->insert($skl);
								}
							}
							$this->_zupy->update($tab, "id_zupa = ".$id);
							$this->setMessage("Zedytowano zupę");
						} else {
							unset($tab['submit']);
							$index = $this->_zupy->insert($tab);
							if(count($skladniki) != 0) {
								$skl['zupa_id'] = $index;
								foreach($skladniki as $skladnik) {
									$skl['skladnik_id'] = $skladnik;
									$this->_z_zlaczenia->insert($skl);
								}
								
							}
							$this->setMessage("Nowa zupa została dodana");
						}
					}
					$this->forward("oferta/admin/index/submodule/zupy");
					break;
				case "nalesniki" :					
					if($this->getMethod() == "POST") {
						$skladniki = $tab['sklad'];
						unset($tab['sklad']);
						$tab['cena'] = str_replace(",", ".", $tab['cena']);
						if(isset($tab['file_up'])) {
							$newPath = "data/nalesniki";
							$tab['zdjecie_url'] = Photo::movePict($tab['file_up'][0], $newPath, true);
							unset($tab['file_up']);
						}
						if($tab['submit'] == "Edytuj") {
							if(!isset($tab['zdjecie_url']))
								$tab['zdjecie_url'] = "";
							$id = $tab['id_nalesnik'];
							unset($tab['id_nalesnik']);
							unset($tab['submit']);
							$this->_n_zlaczenia->delete("nalesnik_id = ".$id);
							if(count($skladniki) != 0) {
								$skl['nalesnik_id'] = $id;
								foreach($skladniki as $skladnik) {
									$skl['skladnik_id'] = $skladnik;
									$this->_n_zlaczenia->insert($skl);
								}
							}
							$this->_nalesniki->update($tab, "id_nalesnik = ".$id);
							$this->setMessage("Zedytowano naleśnik");
						} else {
							unset($tab['submit']);
							$index = $this->_nalesniki->insert($tab);
							if(count($skladniki) != 0) {
								$skl['nalesnik_id'] = $index;
								foreach($skladniki as $skladnik) {
									$skl['skladnik_id'] = $skladnik;
									$this->_n_zlaczenia->insert($skl);
								}
								
							}
							$this->setMessage("Nowy naleśnik został dodany");
						}
					}
					$this->forward("oferta/admin/index/submodule/nalesniki");
					break;
				case "pozostale" :
					$id = $tab['id'];
					unset ($tab['id']);
					// dodawanie zdjęcia produktu :
					/*if($_FILES['file']['error']==0){
						$foto = new Photo($_FILES['file'],"data/pozostale/"); 
						$foto->createMiniFixed("200px");
						$tab['zdjecie_url'] = $foto->getName();
					}else {
						$tab['zdjecie_url']="";
					}*/
					//koniec dodawania zdjęcia
					if(isset($tab['file_up'])) {
						$newPath = "data/pozostale";
						$tab['zdjecie_url'] = Photo::movePict($tab['file_up'][0], $newPath, true);
						unset($tab['file_up']);
					}
					switch($tab['submit']){
						case 'Dodaj':
							unset ($tab['submit']);
							$this->_pozostale->insert($tab);
							$this->setMessage("Produkt został dodany.");
							break;
						case 'Edytuj':
							if($tab['zdjecie_url'] == "")
								unset($tab['zdjecie_url']);
							unset ($tab['submit']);
							$this->_pozostale->update($tab,"id_pozostale = ".$id);
							$this->setMessage("Produkt został zedytowany.");
							break;
						default:
							break;
					}
					$this->forward("oferta/admin/index/submodule/pozostale");
					break;
			}
		}
		die();
				
	}
	public function deleteAction() {
		$type = $this->getParam("submodule");
		$this->subModule = $type;	
		$id = $this->getParam("id", 0);		
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :		
					if($id != 0) {
						$tarta = $this->_tarty->fetchAll("id_tarty = ".$id);
						$tarta = $tarta->toArray();		
						$foto = $tarta[0]['zdjecie_url'];
						if ($foto != ''){	
							if(is_link("data/tarty/".$foto))
								unlink("data/tarty/".$foto);
							if(is_link("data/tarty/m_".$foto))					
								unlink("data/tarty/m_".$foto);		
						}
						$this->_zlaczenia->join("skladniki", "skladnika_id = id_skladnika");
						$this->_view->zlaczenia = $this->_zlaczenia->fetchAll("tarty_id = ".$id, "nazwa_skladnika");
						$this->_zlaczenia->delete("tarty_id = ".$id);	
						$this->_tarty->delete("id_tarty = ".$id);
						$this->setMessage("Tarta została usunięta");
					}
					$this->forward("oferta/admin/index/submodule/tarty");
					break;
				case "skladniki" :
					$this->_skladniki->delete("id_skladnika = ".$id);
					$this->setMessage("Skladnik został usunięty");
					$this->forward("oferta/admin/index/submodule/skladniki");
					break;
				case "cennik" :					
					$id = $this->getParam("id", 0);
					$this->_ceny->delete("id_grupa_cenowa = ".$id);
					$this->setMessage("Grupa cenowa została usunięta");
					$this->forward("oferta/admin/index/submodule/cennik");
					break;
				case "zupy" :
					if($id != 0) {
						$zupa = $this->_zupy->fetchAll("id_zupa = ".$id);
						$zupa = $zupa->toArray();		
						$foto = $zupa[0]['zdjecie_url'];
						if ($foto != ''){	
							if(is_link("data/zupy/".$foto))
								unlink("data/zupy/".$foto);
							if(is_link("data/zupy/m_".$foto))					
								unlink("data/zupy/m_".$foto);		
						}
						$this->_zupy->delete("id_zupa = ".$id);
						$this->_z_zlaczenia->delete("zupa_id = ".$id);
						$this->setMessage("Zupa została usunięta");
					}
					$this->forward("oferta/admin/index/submodule/zupy");
					break;
				case "nalesniki" :
					if($id != 0) {
						$nalesnik = $this->_nalesniki->fetchAll("id_nalesnik = ".$id);
						$nalesnik = $nalesnik->toArray();		
						$foto = $nalesnik[0]['zdjecie_url'];
						if ($foto != ''){	
							if(is_link("data/nalesniki/".$foto))
								unlink("data/nalesniki/".$foto);
							if(is_link("data/nalesniki/m_".$foto))					
								unlink("data/nalesniki/m_".$foto);		
						}
						$this->_nalesniki->delete("id_nalesnik = ".$id);
						$this->_n_zlaczenia->delete("nalesnik_id = ".$id);
						$this->setMessage("Naleśnik został usunięty");
					}
					$this->forward("oferta/admin/index/submodule/nalesniki");
					break;
				case "pozostale" :
					if($id != 0) {
						$tt = $this->_pozostale->fetchAll("id_pozostale = ".$id);
						$tt = $tt->toArray();		
						$foto = $tt[0]['zdjecie_url']; 
						if ($foto != ''){	
							if(is_link("data/pozostale/".$foto))
								unlink("data/pozostale/".$foto);
							if(is_link("data/pozostale/m_".$foto))				
								unlink("data/pozostale/m_".$foto);		
						}
						$this->_pozostale->delete("id_pozostale = ".$id);
						$this->setMessage("Produkt został usunięty");
					}
					$this->forward("oferta/admin/index/submodule/pozostale");
					break;
			}
		}		
	}
    public function multideleteAction() {
		$type = $this->getParam("submodule");
		$this->subModule = $type;	
		$aId = $this->getParam("id", 0);		
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :		
					
					break;
				case "skladniki" :
					if($aId != 0) {
						$where = implode(",", $aId);
						$this->_skladniki->delete("id_skladnika IN( ".$where.")");
						$this->setMessage("Skladniki zostały usunięte");
					} else {
						$this->setMessage("Aby usunąć najpierw wybierz składniki");
					}
					$this->forward("oferta/admin/index/submodule/skladniki");
						
					break;
				case "cennik" :					
					
					break;
				case "zupy" :
					
					break;
				case "pozostale" :
					
					break;
			}
		}		
	}
	public function uploadfileAction(){
		$type = $this->getParam("submodule");
		$this->subModule = $type;	
		$this->_view->appendStyle("/public/css/admin_view.css");		
		if($this->subModule != "") {
			$this->setSubModuleAdmin();
			switch($type) {
				case "tarty" :					
					$foto = new Photo($_FILES['file'],"public/files/"); 
					$foto->createMiniFixed("300px");
					echo "<a href='/".$foto->getFullPath()."' class='galeria'>".
						"<img src='/".$foto->getFullPathMini()."' /></a>".
						"<input type='hidden' name='file_up[]' value='".$foto->getFullPath()."' />".
						"<input id='tarty_' type='button' style='margin-top: 5px;' class='remover button' value='Usuń' />";
					die();
					break;
				case "skladniki" :
					break;
				case "cennik" :
					break;
				case "zupy" :
					$foto = new Photo($_FILES['file'],"public/files/"); 
					$foto->createMiniFixed("300px");
					echo "<img src='/".$foto->getFullPathMini()."' /><input type='hidden' name='file_up[]' value='".$foto->getFullPath()."' /><input id='zupy_' type='button' style='margin-top: 5px;' class='remover button' value='Usuń' />";
					die();
					break;
				case "nalesniki" :
					$foto = new Photo($_FILES['file'],"public/files/"); 
					$foto->createMiniFixed("300px");
					echo "<img src='/".$foto->getFullPathMini()."' /><input type='hidden' name='file_up[]' value='".$foto->getFullPath()."' /><input id='nalesniki_' type='button' style='margin-top: 5px;' class='remover button' value='Usuń' />";
					die();
					break;
				case "pozostale" :
					$foto = new Photo($_FILES['file'],"public/files/"); 
					$foto->createMiniFixed("300px");
					echo "<img src='/".$foto->getFullPathMini()."' /><input type='hidden' name='file_up[]' value='".$foto->getFullPath()."' /><input id='pozostale_' type='button' style='margin-top: 5px;' class='remover button' value='Usuń' />";
					die();
					break;
			}
		}
		echo "problem"; die();
		
	}
	
	
}