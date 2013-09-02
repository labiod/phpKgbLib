<?php
require_once 'library/controllers/class.BasicIndexController.php';
class UserController extends BasicIndexController {
	/**
	 * @access general
	 */
	public function loginAction() {
            if ($this->isUserLogged()) {
                    $this->forward("./user/index");
                    return;
            }
            $tab = $this->getParametersMap();
            if (isset($tab['submit'])) {
        	$query = new Table("users");
        	$query->join("roles", "users.role_id = roles.id_role");
        	$query->where("email = '$0' or nr = '$0'")->andWhere("password = '$1'")->andWhere("active = 'Y'");
        	$query->addParameter($tab["login"])->addParameter($tab["password"]);
        	$result = $query->fetch();
        	if($result->numRows() > 0 && $result->next()) {
        		$row = $result->current();
        		User::createUser($row);
        		HttpSession::getSession()->setAttribute("user_id", $row["id_user"]);
        		$this->forward("./index");
        		return;
        	} else {
        		$this->_view->msg = "Nieprawidłowy login lub hasło";
        	}
            }
	}	
	
	/**
	 * @access restricted
	 */
	public function indexAction() {
		
	}
	
	/**
	 * @access restricted
	 */
	public function logoutAction() {
		User::getLoggedUser()->logout();
		HttpSession::getSession()->clearAttribute("user_id");
		$this->setMessage("Zostałeś wylogowany");
		$this->forward("./index");
	}
}