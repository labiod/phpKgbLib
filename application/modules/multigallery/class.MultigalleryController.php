<?php
class MultigalleryController extends BasicController {
	private $_gallery = null;
	protected function initAll() {
		$this->_gallery = new Table ( "gallery" );
		$this->_photo = new Table ( "photo" );
	}
	public function indexAction() {
		$this->_view->title = "Tart'Yvonne - galeria";
		$this->_view->gallery = $this->_gallery->fetchAll ( "visible = 'y'", "order_by" );
		$this->_view->photo = $this->_photo;
		$this->_view->appendStyle ( "/public/css/style_gallery.css" );
	}
	public function showAction() {
		$this->_view->title = "Tart'Yvonne - galeria";
		$index = $this->getParam ( "id", 0 );
		$tmp = $this->_gallery->find ( "id_gallery = " . $index, "order_by" );
		$tmp = $tmp->toArray ();
		$this->_view->gallery = $tmp [0];
		$tmp = $this->_photo->fetchAll ( "gallery_id = " . $index, "order_by" );
		$this->_view->photos = $tmp->toArray ();
		$this->_view->appendStyle ( "/public/css/style_gallery.css" );
	}
}