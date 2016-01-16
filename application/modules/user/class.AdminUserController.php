<?php

class AdminUserController extends BaseAdminLpunktController
{

    public function indexAction()
    {
        $query = new Table("users");
        $query->join("roles", "users.role_id = roles.id_role");
        $query->join("addresses", "users.id_address = addresses.id_address");
        $tab = $this->getParametersMap();
        if (isset($tab['role'])) {
            $query->where("role_name = '" . $tab['role'] . "'");
            switch ($tab['role']) {
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
        $query->setOrderBy("first_name, last_name, city");
        $query = $query->fetch();
        if (!$query->isNull())
            $this->_view->users = $query->getData();
        else
            $this->_view->users = "";
    }

    public function loginAction()
    {

    }

    public function accessDeniedAction()
    {
        $this->forward("admin/user/login", "msg=Aby mieć dostęp do tej części musisz się zalogować");
        die ();
    }

    public function editAction()
    {
        $tab = $this->getParametersMap();
        if (isset($tab['id'])) {
            $table = new Table("users");
            $result = $table->find("id_user =" . $tab["id"]);
            if (!$result->next()) {
                $this->forward("admin/user/index", "msg=Bledny użytkownik");
            }
            $data = $result->current();
            $roleId = $data["role_id"];
            /**
             * var $user UserTable
             */
            $user = new UserTable($tab["id"]);
            Log::d(Application::getInstance(), "KB", "role_id:" . $roleId);
            if (isset($tab["submit"])) {

                $user->fetchData($tab);
                $user->update();

                $this->forward("admin/user/userPrivilages", "msg=Użytkownik zosta zedytowany");
            }
            $table = new Table("districts");
            $districts = $table->fetchAll();
            $items = array();
            while ($districts->next()) {
                $row = $districts->current();
                array_push($items, new OptionItem($row["nazwa"], $row["id_wojewodztwo"]));
            }
            $this->_view->_select = new SimpleSelect("role_type", $items);
            $this->_view->_user = $user;
        }
    }

    public function confirmUserAction()
    {
        $tab = $this->getParametersMap();
        $users = new Table("users");
        $set['active'] = true;
        $where = "id_user = '" . $tab['id'] . "'";
        $users->update($set, $where);
        $this->setMessage("Konto użytkownika zostało aktywowane.");
        header("Location: /admin/user");
    }

    public function userPrivilagesAction()
    {
        $privilages = new Table("roles_priv");
        $privilages->join("roles", "roles.id_role = roles_priv.id_role");
        $this->_view->privilages = $privilages->fetchAll()->getData();
    }

    public function addPrivilageAction()
    {
        $tab = $this->getParametersMap();
        if (isset($tab["submit"])) {
            $category = new RolePriv(-1);
            $category->setModule($tab["module"]);
            $category->setAction($tab["action_name"]);
            $category->setRoleType($tab["role_type"]);
            $category->update();
            $this->forward("admin/user/userPrivilages", "msg=Dostęp został zmieniony");
        }
        $table = new Table("roles");
        $vehicles = $table->fetchAll();
        $items = array();
        while ($vehicles->next()) {
            $row = $vehicles->current();
            array_push($items, new OptionItem($row["role_name"], $row["id_role"]));
        }
        $this->_view->_select = new SimpleSelect("role_type", $items);
    }


    public function editPrivilageAction()
    {
        $tab = $this->getParametersMap();
        if (isset($tab['id'])) {
            if (isset($tab["submit"])) {
                $category = new RolePriv($tab["id"]);
                $category->setModule($tab["module"]);
                $category->setAction($tab["action_name"]);
                $category->setRoleType($tab["role_type"]);
                $category->update();
                $this->forward("admin/user/userPrivilages", "msg=Dostęp został zmieniony");
            }
            $privilages = new Table("roles_priv");
            $privilages->join("roles", "roles_priv.id_role = roles.id_role");
            $this->_view->_privilage = $privilages->find("roles_priv.id_privilage = " . $tab['id']);
            $table = new Table("roles");
            $vehicles = $table->fetchAll();
            $items = array();
            while ($vehicles->next()) {
                $row = $vehicles->current();
                array_push($items, new OptionItem($row["role_name"], $row["id_role"]));
            }
            $this->_view->_select = new SimpleSelect("role_type", $items);
        }
    }

    public function deletePrivilageAction()
    {
        $tab = $this->getParametersMap();
        if (isset($tab["id"])) {
            $table = new Table("roles_priv");
            $table->delete("id_privilage = " . $tab["id"]);
            $this->forward("admin/user/userPrivilages", "msg=Dostęp został usunięty");
        }
    }
}