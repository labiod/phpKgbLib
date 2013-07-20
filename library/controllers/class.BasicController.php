<?php
require_once 'controllers/class.MainController.php';
	class BasicController extends MainController {
		
		public function __construct(Request $request) {
			parent::__construct($request);
			$name = get_class($this);
			$len = strpos($name, "Controller");
			$mod = substr($name, 0, $len);
			$this->_module = strtolower($mod);
			
		}
		public function userAuthorization() {
			$session = HttpSession::getSession();
			if($session->attrEquals("logged_user", true)) {
				return true;
			} else {
				$this->setMessage("Nie masz uprawnień do oglądania zawartości tej strony");
				header("Location: /users");
				die();
			}
		}
		protected function initAll() {			
		}
		public function dispatch($action) {
			if($message = $this->getParam("message", "") != "") {
				$this->_view->message = $message;
			}
			$path = strtolower($this->_module)."/view/".$action.".php";
			$this->setView($path);
			$this->_action = $action;
			$fun = $action."Action";
			$this->$fun();
			$this->showView();
		}
	}