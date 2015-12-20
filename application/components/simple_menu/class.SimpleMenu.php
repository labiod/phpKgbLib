<?php
require_once "class.ListItem.php";

class SimpleMenu extends Component {

    /**
     * @var array()
     */
    private $_menuItems;
    private $_id;
    /**
     * @var string
     */
    private $_title;

    public function __construct($menuItems, $title = "", $id = "") {
        $this->_menuItems = $menuItems;
        $this->_id = $id;
        $this->setTitle($title);
    }
	public function show() {
        ob_start();
        include "view/simple_menu.phtml";
        $content = ob_get_contents();
        ob_end_clean();
        $content =<<<EOD
            {$content}
EOD;
        echo $content;
	}

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function hasTitle() {
        return $this->_title;
    }
}