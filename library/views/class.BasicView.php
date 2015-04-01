<?php
require_once 'views/class.View.php';
class BasicView extends View {
	private $view = "";
	private $layout = "";
    /**
     * @var Component[]
     */
    private $_components = array();
	private $_styles = array ();
	private $_action = array ();
	public function appendStyle($path) {
		array_push ( $this->_styles, $path );
	}
	public function attachStyles() {
		$styles = "";
		foreach ( $this->_styles as $style ) {
			$styles .= "<link href=\"" . $style . "\" type=\"text/css\" rel=\"stylesheet\" />\n";
		}
		echo $styles;
	}

    public function draw() {
        $this->onDraw();
    }

    protected function onDraw() {
        if ($this->view != "") {
            if ($this->layout == "")
                include $this->view;
            else {
                include $this->layout;
            }
        }
    }

	public function showAction($type, $url, $text = "", $params = array()) {
		if (count ( $params ) != 0)
			$param = putAll ( $params );
		else
			$param = "";
		return "<a " . $param . " href=\"" . $url . "\" ><img class='icon' alt=" . $text
        . " title=" . $text . " src='" . Settings::getParam ( "icon", $type ) . "' />" . $text . "</a> ";
	}
	public function setView($path) {
		$this->view = $path;
	}
	public function setLayout($layout) {
		$this->layout = $layout;
	}

    /**
     * @param $component Component
     * @param $name string
     */
    public function addComponent($component, $name) {
        $this->_components[$name] = $component;
    }

    /**
     * @param $name string
     * @return Component
     */
    public function getComponent($name)
    {
        if (array_key_exists($name, $this->_components)) {
            return $this->_components[$name];
        } else {
            return null;
        }
    }
}