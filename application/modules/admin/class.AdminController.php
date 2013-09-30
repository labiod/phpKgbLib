<?php
require_once 'controllers/class.AdminBasicController.php';
class AdminController extends AdminBasicController {
	public function initAll() {
	}
	
	/**
	 * @access restricted
	 */
	public function indexAction() {
		echo "hello";
	}
	
	/**
	 * @access general
	 */
	public function loginAction() {
		echo $this->_session->getAttribute("msg"); die;
	}
	
	
	public function accessDeniedAction() {
		$this->forward("admin/login", "msg=Aby mieć dostęp do tej części musisz się zalogować");
		die;
	}
}