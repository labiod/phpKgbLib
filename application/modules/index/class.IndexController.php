<?php
 class IndexController extends BasicController {
 	private $_content = null;
 	private $articles = null;
	 protected function initAll() {	
	//	$this->_view->user_name = $this->_session->getAttribute("user_name");
		
	}
	function indexAction() {
		$this->_content = new Table("content");
		$this->_view->content = $this->_content->fetchAll("id = 1");
		$this->_view->id = 1;
	}
 	
}