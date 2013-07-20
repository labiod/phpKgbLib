<?php
	class AdminBasicController extends MainController {
		public function __construct(Request $request) {
			parent::__construct($request);
			$name = get_class($this);
			$len = strpos($name, "Controller");
			$mod = substr($name, 0, $len);
			$mod = substr($mod, 5);
			$mod = strtolower($mod);
			$this->_module = $mod;
			if(!$this->_session->isSetAttr("logged")) {
				if($this->_module != "auth") {
					$this->forward("auth/panel");
					die();
				}
					
			}	
			$this->_view->menu = true;	
			if($this->_session->isSetAttr("admin_name"))
				$this->_view->admin_name = $this->_session->getAttribute("admin_name");
		}
		
		
		public function dispatch($action) {	
			$this->setHeader("Content-Type: text/html; charset=utf-8");	
			$path = $this->_module."/view/admin/".$action.".php";
			$this->setView($path);
			$this->_action = $action;
			$fun = $action."Action";
			$this->$fun();
			$this->showView();
		}
	}