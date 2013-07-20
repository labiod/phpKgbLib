<?php
require_once 'views/class.View.php';
class BasicView extends View {
	private $view = "";
	private $layout = "";
	private $_styles = array();
	private $_action = array();
	public function appendStyle($path) {
		array_push($this->_styles, $path);
	}
	
	public function attachStyles() {
		$styles = "";
		foreach($this->_styles as $style) {
			$styles .="<link href=\"".$style."\" type=\"text/css\" rel=\"stylesheet\" />\n";
		}
		echo $styles;
	}
	public function show() {
		if($this->view != "") {
			if($this->layout == "")
				include $this->view;
			else {
				include $this->layout;
			}
		}
	}
	public function showAction($type, $url, $text="", $params = array()) {
		if(count($params) != 0)
			$param = putAll($params);
		else 
			$param = "";
		return "<a ".$param." href=\"".$url."\" ><img class='icon' alt=".$text." title=".$text." src='".Settings::getParam("icon", $type)."' />".$text."</a> ";
	}
	public function setView($path) {
		$this->view = $path;
	}
	public function setLayout($layout) {
		$this->layout = $layout;
	}
}