<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author Gabus
 */
class AuthController extends BasicController {
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
	 		$this->users = new Table("users");
			$login = $this->getParam("login", "");
			$pass = $this->getParam("password", "");
			$user = $this->users->fetchAll("email='".$login."' and password='".$pass."'");
			if($user->count() == 1) {
				$user_date = $user->toArray();
				$this->_session->setAttribute("user_id", $user_date[0]['id_admin']);
				$this->_session->setAttribute("user_login", $login);
				$this->_session->setAttribute("user_pass", $pass);
				$this->_session->setAttribute("user_name", $user_date[0]['imie'] . ' ' . $user_date[0]['nazwisko']);
				$this->_session->setAttribute("email", $user_date[0]['email']);
				$this->_session->setAttribute("logged", true);
				$this->forward("index/admin");
				die();
			}
			$message = "Niepoprawny login lub hasło";
			$this->setMessage($message); 
	 	}
	 	header("Location: /auth/index");
	 	
		
		//$user = $this->users->fetchAll("login =".)
	}
	public function logoutAction() {
		$this->_session->clearSession();
                $this->setMessage('Wylogowano.'); 
		header("Location: /auth/admin");
	}
}