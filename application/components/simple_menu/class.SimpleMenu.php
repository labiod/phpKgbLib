<?php
require_once "class.ListItem.php";

class SimpleMenu extends Component {

    /**
     * @var array()
     */
    private $_menuItems;

    private $_id;
    public function __construct($menuItems, $id = "") {
        $this->_menuItems = $menuItems;
        $this->_id = $id;
    }
	public function show() {
        require "view/simple_menu.phtml";
	}
}