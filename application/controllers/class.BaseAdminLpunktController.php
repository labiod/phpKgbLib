<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 07/06/2015
 * Time: 12:03
 */

require_once "lib/controllers/class.AdminBasicController.php";

class BaseAdminLpunktController extends AdminBasicController {
    public function initAll() {
        //Lpunkt konfiguracja
        $items = array();
        array_push($items, new ListItem("Kategorie", "/admin/category/show"));
        array_push($items, new ListItem("Typy pojazdów", "/admin/vehicles/showType"));
        array_push($items, new ListItem("Wojwództwa", "/admin/settings/regions"));
        $component = new SimpleMenu($items, "LPunkt konfiguracja", "admin_menu");
        $this->_view->addComponent($component, "admin_menu");

        //Lpunkt zarządzanie użytkownikami
        $items = array();
        array_push($items, new ListItem("Osk", "/admin/user/index/role/osk"));
        array_push($items, new ListItem("Instruktorzy", "/admin/user/index/role/teacher"));
        array_push($items, new ListItem("Kursanci", "/admin/user/index/role/student"));
        array_push($items, new ListItem("Wszyscy użytkownicy", "/admin/user/index"));
        $component = new SimpleMenu($items, "Zarządzanie użytkownikami", "users");
        $this->_view->addComponent($component, "users");
    }
} 