<?php
class AdminIndexController extends AdminBasicController {
	function indexAction() {
        $items = array();
        array_push($items, new ListItem("Kategorie", "/admin/category/show"));
        $component = new SimpleMenu($items, "Zarządzanie stroną", "admin_menu");
        $this->_view->addComponent($component, "admin_menu");
	}
}