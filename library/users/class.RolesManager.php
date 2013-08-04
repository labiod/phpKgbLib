<?php
class RolesManager {
	public static function checkPrivilage($module, $action) {
		$user = User::getLoggedUser();
		if($user == null)
			return false;
		return $user->checkPrivilage($module, $action);
	}
}