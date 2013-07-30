<?php
class RolesManager {
	public function checkPrivilage($module, $action) {
		$session = HttpSession::getSession();
		$user = User::getForName($session->getAttribute("user_name"));
		$user->checkPrivilage($module, $action);
	}
}