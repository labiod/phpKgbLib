<?php
class AdminUserController extends AdminBasicController {
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
		echo $this->_session->getAttribute("msg");
	}
	
	
	public function accessDeniedAction() {
		$this->forward("admin/user/login", "msg=Aby mieć dostęp do tej części musisz się zalogować");
		die;
	}
}