<?php
require_once 'library/controllers/class.BasicIndexController.php';
 class IndexController extends BasicIndexController {
 	private $_content = null;
 	private $articles = null;
	 protected function initAll() {	
	//	$this->_view->user_name = $this->_session->getAttribute("user_name");
		
	}
	
	function indexAction() {
		$this->_view->header = $this->isUserLogged() ? "uheader.php" : "header.php";
	}
 	
}