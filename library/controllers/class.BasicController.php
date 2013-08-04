<?php
	abstract class BasicController {
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
		
		/**
		 * @access general
		 */
		public function accessDeniedAction() {
			echo "Nie masz dostępu do tej części witryny"; die;
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
			$this->setHeader("Content-Type: text/html; charset=utf-8");
			
			if($message = $this->getParam("message", "") != "") {
				$this->_view->message = $message;
			}
			$access = $this->getAnnotation(get_class($this), $action."Action", "access", "general");
			if($access == "restricted" && !RolesManager::checkPrivilage($this->_module, $action)) {	
				$action = "accessDenied";
			}
			$this->_action = $action;
			$path = $this->getViewPath();
			$this->setView($path);
			
			$fun = $action."Action";
			$this->$fun();
			$this->showView();
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
		
		public function getAnnotation($className, $methodName, $tagName, $default=0) {
			$c = new ReflectionClass($className);
			if(!$c->hasMethod($methodName))
				return "not found";
			$m = $c->getMethod($methodName);
			$s = $m->getDocComment();
			$s = str_replace('/*', '', $s);
			$s = str_replace('*/', '', $s);
			$s = str_replace('*', '', $s);
			$aTags = explode('@', $s);
			$array = array();
			foreach ($aTags as $tag) {
				$tmp = explode(" ", $tag);
				if(count($tmp) > 2) {
					$key = $tmp[0];
					unset($tmp[0]);
					$value = implode(" ", $tmp);
					$array[$key] = trim($value);
				} else {
					$array[$tmp[0]] = count($tmp) == 2 ? trim($tmp[1]) : true;
				}
			}
			if(isset($array[$tagName]))
				return $array[$tagName];
			return $default;
		}
		
		public function isUserLogged() {
			$user = User::getLoggedUser();
			return $user != null;
		}
		
		public abstract function getViewPath();
}