<?php
require_once 'controllers/class.BasicController.php';
	class BasicIndexController extends BasicController {
		
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
		
		public function getViewPath() {
			return strtolower($this->_module)."/view/".$this->_action.".php";
		}
	}