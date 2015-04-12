<?php
require_once 'application/controllers/class.BaseLpunktController.php';

class UserController extends BaseLpunktController {

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
                    $this->forward("./index");
                    return;
                } else {
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
            $query->find("id = ".$tab["osk_id"]);
            $result = $query->fetch()->getData();
            $user = User::getLoggedUser();
            $user->setOsk($tab["osk_id"],$result[0]["osk_name"]);
            HttpSession::getSession()->setAttribute("osk_name", $result[0]["osk_name"]);
            $this->setMessage("Poprawnie zalogowano do OSK ".$user->getOskName());
            //tu coś nie działa!!!
         //   $user->forceSerialize();
            $this->forward("./index");
            return;
        } else {
            $user = User::getLoggedUser();
            $query = new Table("osk_site");
            $query->join("osk", "osk_site.osk_id = osk.id");
            $query->where("osk_site.user_id = $0");
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
        if($user->getRoleName() == "osk"){
            $this->forward("/osk/profile");
            die();
        }
    }
    
}