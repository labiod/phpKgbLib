<?php
require_once 'library/controllers/class.BasicController.php';
class UserController extends BasicController {
	public function loginAction() {
		$tab = $this->getParametersMap();
        if (isset($tab['submit'])) {
        	$query = new Table("users");
        	$query->join("roles", "users.role_id = roles.id_role");
        	$query->where("email = '$0' or nr = '$0'")->andWhere("password = '$1'")->andWhere("active = 'Y'");
        	$query->addParameter($tab["login"])->addParameter($tab["password"]);
        	$result = $query->fetch();
        	if($result->numRows() > 0 && $result->next()) {
        		$row = $result->current();
        		$user = new User($row["id_user"]);	
        		$user->fetchData($row);
        		$this->forward("./");
        	} else {
        		$this->_view->msg = "Nieprawidłowy login lub hasło";
        	}
        }
	}	
}