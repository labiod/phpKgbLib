<?php
abstract class View {
	protected $_parameters = array ();
	public abstract function show();
	public function __get($name) {
		if(isset($this->_parameters[$name]))
			return $this->_parameters[$name];
		return null;//Settings::getParam("site", "title");
	}
}