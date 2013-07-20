<?php
class GalleryController extends BasicController {
	private $_gallery = null;
	protected function initAll() {	
		$this->_gallery = new Table("photo");	
	}
	public function indexAction(){
		$this->_view->title = "Tart'Yvonne - galeria";
		$this->_view->gallery = $this->_gallery->fetchAll("","order_by");
		$this->_view->appendStyle("/public/css/style_gallery.css");
	}
	
}