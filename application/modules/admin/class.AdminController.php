<?php
class AdminController extends BasicController {
	public function initAll() {
		$this->admin = new Table("administratorzy");
	}
	public function indexAction() {
		$this->forward("auth/admin/index");
	}
}