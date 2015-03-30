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
        ob_start();
        include "view/simple_menu.phtml";
        $content = ob_get_contents();
        ob_end_clean();
        $content =<<<EOD
            {$content}
EOD;
        echo $content;

	}
}