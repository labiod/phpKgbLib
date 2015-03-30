<?php
class OfertaController extends BaseLpunktController {
	private $_tarty = null;
	private $_zlaczenia = null;
	private $_nalesniki = null;
	private $_pozostale = null;
	// private $_inne = null;
	protected function initAll() {
		$this->_oferta = new Table ( "content" );
		$this->_tarty = new Table ( "tarty" );
		$this->_zlaczenia = new Table ( "tarty_skladniki" );
		$this->_zlaczenia->join ( "skladniki", "skladnika_id = id_skladnika" );
		$this->_ceny = new Table ( "grupy_cenowe" );
		$this->_nalesniki = new Table ( "nalesniki" );
		$this->_n_zlaczenia = new Table ( "nalesniki_skladniki" );
		$this->_n_zlaczenia->join ( "skladniki", "skladnik_id = id_skladnika" );
		$this->_pozostale = new Table ( "oferta_pozostale" );
		$this->_zupy = new Table ( "zupy" );
		$this->_z_zlaczenia = new Table ( "zupy_skladniki" );
		$this->_z_zlaczenia->join ( "skladniki", "skladnik_id = id_skladnika" );
		$this->_view->tarty = $this->_tarty->fetchAll ( "", "nazwa_tarty" );
		$this->_view->zupy = $this->_zupy->fetchAll ( "", "nazwa_zupy" );
		$this->_view->pozostale = $this->_pozostale->fetchAll ( "", "nazwa_pozostale" );
	}
	public function indexAction() {
		$type = $this->getParam ( "submodule" );
		$this->subModule = $type;
		$this->_view->appendStyle ( "/public/css/oferta.css" );
		$this->_view->title = "Tart'Yvonne - oferta";
		$this->subModule = "tarty";
		$this->setSubModuleFront ();
		$this->_view->title = "Tart'Yvonne - oferta";
		$tmp = $this->_oferta->find ( "id_content = 6" );
		$tmp = $tmp->getData ();
		if (sizeof ( $tmp ) && sizeof ( $tmp [0] ) > 0) {
			$tmp = $tmp [0];
			$this->_view->oferta = $tmp ["text"];
		} else
			$this->_view->oferta = "";
	}
	public function showAction() {
		$type = $this->getParam ( "submodule" );
		$id = $this->getParam ( "id", 0 );
		$this->subModule = $type;
		$this->_view->appendStyle ( "/public/css/oferta.css" );
		$this->_view->title = "Tart'Yvonne - oferta";
		if ($this->subModule == "") {
			$this->subModule = "tarty";
		}
		$this->setSubModuleFront ();
		switch ($type) {
			case "tarty" :
				$textOnly = $this->getParam ( "textOnly", false );
				$this->_view->skladniki = $this->_zlaczenia->fetchAll ( "tarty_id = " . $id, "nazwa_skladnika" );
				$this->_view->tarty = $this->_tarty->fetchAll ( "" );
				$this->_view->tTart = $this->_tarty->fetchAll ( "id_tarty = " . $id );
				$this->_ceny->join ( "tarty", "ceny_id = id_grupa_cenowa" );
				$this->_view->ceny = $this->_ceny->fetchAll ( "id_tarty = " . $id );
				$this->_view->textOnly = $textOnly;
				break;
			case "skladniki" :
				$this->_view->skladniki = $this->_skladniki->fetchAll ();
				break;
			case "cennik" :
				$this->_view->cennik = $this->_ceny->fetchAll ();
				$this->_view->content = $this->_oferta->fetchAll ( "id_content = 7" );
				break;
			case "zupy" :
				$textOnly = $this->getParam ( "textOnly", false );
				$this->_view->skladniki = $this->_z_zlaczenia->fetchAll ( "zupa_id = " . $id, "nazwa_skladnika" );
				$this->_view->zupy = $this->_zupy->fetchAll ( "" );
				$this->_view->zupa = $this->_zupy->fetchAll ( "id_zupa = " . $id );
				$this->_view->textOnly = $textOnly;
				break;
			case "nalesniki" :
				$textOnly = $this->getParam ( "textOnly", false );
				$this->_view->skladniki = $this->_n_zlaczenia->fetchAll ( "nalesnik_id = " . $id, "nazwa_skladnika" );
				$this->_view->nalesniki = $this->_nalesniki->fetchAll ( "" );
				$this->_view->nalesnik = $this->_nalesniki->fetchAll ( "id_nalesnik = " . $id );
				$this->_view->textOnly = $textOnly;
				break;
			case "pozostale" :
				$textOnly = $this->getParam ( "textOnly", false );
				$this->_view->skladniki = $this->_z_zlaczenia->fetchAll ( "zupa_id = " . $id, "nazwa_skladnika" );
				$this->_view->pozostale = $this->_pozostale->fetchAll ( "" );
				$this->_view->poz = $this->_pozostale->fetchAll ( "id_pozostale = " . $id );
				$this->_view->textOnly = $textOnly;
				break;
		}
	}
}
?>