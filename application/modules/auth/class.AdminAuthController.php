<?php
class AdminAuthController extends AdminBasicController {
	protected $users = null;
	public function initAll() {
	}
	function indexAction() {
		if($this->_session->isSetAttr("logged")) {
			$this->forward("index/admin");
			die();
		}
		$this->_view->appendStyle("/public/css/admin_login.css");
	}
	 public function loginAction() {
	 	if($this->getMethod() == "POST") {
	 		$this->users = new Table("administratorzy");
			$login = $this->getParam("user_name", "");
			$pass = $this->getParam("user_pass", "");
			$user = $this->users->fetchAll("login='".$login."' and haslo='".$pass."'");
			if($user->count() == 1) {
				$user_date = $user->toArray();
				$this->_session->setAttribute("user_id", $user_date[0]['id_admin']);
				$this->_session->setAttribute("user_login", $login);
				$this->_session->setAttribute("user_pass", $pass);
				$this->_session->setAttribute("user_name", $user_date[0]['nazwa']);
				$this->_session->setAttribute("email", $user_date[0]['email']);
				$this->_session->setAttribute("logged", true);
				$this->forward("index/admin");
				die();
			}
			$message = "Niepoprawny login lub hasło";
			$this->setMessage($message); 
	 	}
	 	header("Location: /auth/admin");
	 	
		
		//$user = $this->users->fetchAll("login =".)
	}
	public function logoutAction() {
		$this->_session->clearSession();
		header("Location: /auth/admin");
	}
}