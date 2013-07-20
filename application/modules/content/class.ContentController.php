<?php
class ContentController extends BasicController {
 	private $_content = null;
	protected function initAll() {	
		$this->_content = new Table("content");		
	}
	function indexAction() {
		$id = $this->getParam("id", "0");
		$this->id = $id;
		$this->_view->id = $id;
		$this->_view->content = $this->_content->fetchAll("id_content = ".$id);	
	}
	
}