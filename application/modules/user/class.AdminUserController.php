<?php
class AdminUserController extends AdminBasicController {
	public function initAll() {
	}
	public function indexAction() {
		echo "hello";
	}
	public function loginAction() {
		
	}
	public function accessDeniedAction() {
		$this->forward ( "admin/user/login", "msg=Aby mieć dostęp do tej części musisz się zalogować" );
		die ();
	}
}