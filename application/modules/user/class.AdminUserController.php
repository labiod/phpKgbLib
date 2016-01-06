<?php
class AdminUserController extends BaseAdminLpunktController {

	public function indexAction() {
            $query = new Table("users");
            $query->join("roles", "users.role_id = roles.id_role");
            $tab = $this->getParametersMap();           
            if(isset($tab['role'])){
                $query->where("role_name = '".$tab['role']."'");
                switch($tab['role']){    
                    case 'admin':
                        $this->_view->caption = 'Lista administratorów';
                        break;
                    case 'instruktor':
                        $this->_view->caption = 'Lista instruktorów';
                        break;
                    case 'kursant':
                        $this->_view->caption = 'Lista kursantów';
                        break;
                    case 'osk':
                        $this->_view->caption = 'Lista pracowników osk';
                        break;
                    default:
                        $this->_view->caption = 'Lista wszystkich użytkowników';
                        break;
                }
                $this->_view->usersType = $tab["role"];
            }
            $query->setOrderBy("last_name, first_name, city");
            $query = $query->fetch();
            if(!$query->isNull())
                $this->_view->users = $query->getData();
            else
                $this->_view->users = "";
	}
	public function loginAction() {
		
	}
	public function accessDeniedAction() {
		$this->forward ( "admin/user/login", "msg=Aby mieć dostęp do tej części musisz się zalogować" );
		die ();
	}
        
        public function confirmUserAction() {
            $tab = $this->getParametersMap();  
            $users = new Table("users");
            $set['active'] = true;
            $where = "id_user = '".$tab['id']."'";
            $users->update($set, $where);
            $this->setMessage("Konto użytkownika zostało aktywowane.");
            header("Location: /admin/user");
        }
}