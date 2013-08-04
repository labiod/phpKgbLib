<?php
	class MainController {
		protected $subModule = "";
		protected $_conn;
		protected $_view;
		protected $_request;
		protected $_response;
		protected $_action;
		protected $_session;
		protected $_module;
		protected $_url;
		
		public function __construct(Request $request) {
			$this->_request = $request;
			$this->_session = HttpSession::getSession();
			if($this->getParam("logged_user", false )) {
				$this->_session->setAttribute("user_id", $this->getParam("user_id", 0));
				$this->_session->setAttribute("logged_user", true);
			}
			
			$this->_view = new BasicView();
			$this->_response = new Response();
			$this->_view->redirect = $this->_url;
			$this->initAll();
			
			if($this->_session->isSetAttr("message")) {
				$this->_view->message = $this->showMessage();	
			}
		}
		protected function initAll() {		
		}
		public function __call($name, $arg) {
			header("Content-Type: text/html; charset=UTF-8");
			echo "Metoda ".$name." nie jest obsługiwana";
			die();
		}
		
		public function setSubModuleAdmin() {
			$path = $this->_module."/view/".$this->subModule."/admin/".$this->_action.".php";
			$this->setView($path);
		}
		public function setSubModuleFront() {
			$path = $this->_module."/view/".$this->subModule."/".$this->_action.".php";
			$this->setView($path);
		}
		public function dispatch($action) {
		}
		protected function showView() {
			$this->_view->show();
		}
		public function getParametersMap() {
			return $this->_request->getParametersMap();
		}
		public function getParam($id, $default = "") {
			return $this->_request->getParam($id, $default);
		}
		public function setView($path) {
			$this->_view->setView($path);
		}
		public function getMethod() {
			return $this->_request->getMethod();
		}
		public function setMessage($message) {
			$this->_session->setAttribute("message", $message);
		}
		public function appendMessage($message) {
			$old_message = $this->_session->getAttribute("message");
			$this->_session->setAttribute("message", $old_message." ".$message);
		}
		public function showMessage() {
			if($this->_session->isSetAttr("message")) {
				$ret = $this->_session->getAttribute("message");
				$this->_session->clearAttribute("message");
				return $ret;
			}		
			return "";
		}
		public function forward($url, $msg="") {
			if($msg != "") {
				$tab = explode("=", $msg);
				$this->_session->setAttribute($tab[0], $tab[1]);
			}
				
			header("Location: /".$url);
		}
		public function getUrl() {
			return $this->_url;
		}
		public function setUrl($url) {
			$this->_url = $url;
		}
		public function setHeader($string) {
			header($string);
		}
}