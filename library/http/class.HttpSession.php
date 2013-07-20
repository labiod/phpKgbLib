<?php
class HttpSession {
	private $attr;
	private function __construct() {
		if(!isset($_SESSION['ready'])) {
			session_start();
			$_SESSION['ready'] = true;
		}	
		$this->attr = &$_SESSION;
	}
	public function setAttribute($name, $variable) {
		$this->attr[$name] = $variable;
	}
	public function isSetAttr($name) {
		if (isset($this->attr[$name]))
			return true;
		return false;
	}
	public function getAttribute($name) {
		return $this->attr[$name];
	}
	public function clearAttribute($attr) {
		unset($this->attr[$attr]);
	}
	public static function getSession() {
		return new HttpSession();	
	}
	public function clearSession() {
		session_unset();
		session_destroy();
	}
}