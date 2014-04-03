<?php
require_once 'library/controllers/class.BasicIndexController.php';
 class IndexController extends BasicIndexController {
 	private $_content = null;
 	private $articles = null;
	 protected function initAll() {	
	//	$this->_view->user_name = $this->_session->getAttribute("user_name");
		
	}
	
	function indexAction() {
            if($this->isUserLogged()){
//                if(User::getLoggedUser()->getRoleName() == "admin"){
//                   // $this->_view->header = "aheader.php";
//                } else {
//                    
//                }
                $this->forward("./index/index_logged");
            }else{
                $this->_view->header = "header.php";
            }
	}
        function index_loggedAction(){
            
        }
 	
}