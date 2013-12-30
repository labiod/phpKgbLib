<?php
require_once 'library/controllers/class.BasicIndexController.php';

class UserController extends BasicIndexController {

    public function loginAction() {
        if ($this->isUserLogged()) {
            $this->forward("./user/index");
            return;
        }
        $tab = $this->getParametersMap();
        if (isset($tab['submit'])) {
            $query = new Table("users");
            $query->join("roles", "users.role_id = roles.id_role");
            $query->where("email = '$0'")->andWhere("password = '$1'")->andWhere("active = 'Y'");
            $query->addParameter($tab["login"])->addParameter($tab["password"]);
            $result = $query->fetch();
            if ($result->numRows() > 0 && $result->next()) {
                $row = $result->current();
                User::createUser($row);
                HttpSession::getSession()->setAttribute("user_id", $row["id_user"]);
                $user = User::getLoggedUser();
                $user->loadPrivilage();
                if ($user->isAdmin()) {
                    $user->forceSerialize();
                    $this->forward("./index");
                    return;
                } else {
                    $user->forceSerialize();
                    $this->forward("./user/oskSite");
                    return;
                }
            } else {
                $this->_view->msg = "Nieprawidłowy login lub hasło";
            }
        }
    }

    public function oskSiteAction() {
        $tab = $this->getParametersMap();
        if (isset($tab['submit'])) {
            HttpSession::getSession()->setAttribute("osk_id", $tab["osk_id"]);
            $query = new Table("osk");
            $query->find("id_osk = ".$tab["osk_id"]);
            $result = $query->fetch()->getData();
            $user = User::getLoggedUser();
            $user->setOsk($tab["osk_id"],$result[0]["nazwa"]);
            $this->setMessage("Poprawnie zalogowano do OSK ".$user->getOskId());
            //$user->forceSerialize();
            $this->forward("./index");
            return;
        } else {
            $user = User::getLoggedUser();
            $query = new Table("osk_site");
            $query->join("osk", "osk_site.osk_id = osk.id_osk");
            $query->where("user_id = '$0'");
            $query->addParameter($user->getUserId());
            $result = $query->fetch();
            if ($result->isNull()) {
                $this->setMessage("Brak przypisanych OSK, skontaktuj się z administratorem.");
            } else {
                $this->_view->oskList = $result->getData();
            }
        }
    }

    public function indexAction() {
        
    }

    public function logoutAction() {
        User::getLoggedUser()->logout();
        HttpSession::getSession()->clearAttribute("user_id");
        HttpSession::getSession()->clearSession();
        $this->setMessage("Zostałeś wylogowany");
        $this->forward("./index");
    }

    public function profileAction() {
        $user = User::getLoggedUser();
        //print_r($user);die();
        if($user->getRoleName() == "osk"){
            $this->forward("/osk/profile");
            die();
        }
    }
    
}