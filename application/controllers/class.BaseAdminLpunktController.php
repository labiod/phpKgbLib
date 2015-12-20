<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 07/06/2015
 * Time: 12:03
 */

class BaseAdminLpunktController extends AdminBasicController {
    public function initAll() {
        //Lpunkt konfiguracja
        $items = array();
        array_push($items, new ListItem("Kategorie", "/admin/category/show"));
        array_push($items, new ListItem("Typy pojazdów", "/admin/vehicles/showType"));
        $component = new SimpleMenu($items, "LPunkt konfiguracja", "admin_menu");
        $this->_view->addComponent($component, "admin_menu");

        //Lpunkt zarządzanie użytkownikami
        $items = array();
        array_push($items, new ListItem("Osk", "/admin/osk/show"));
        array_push($items, new ListItem("Instruktorzy", "/admin/instructors/show"));
        array_push($items, new ListItem("Kursanci", "/admin/students/show"));
        $component = new SimpleMenu($items, "@string/admin_users_menu_title", "users");
        $this->_view->addComponent($component, "users");
    }
} 