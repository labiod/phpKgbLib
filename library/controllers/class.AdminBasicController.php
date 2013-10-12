<?php
class AdminBasicController extends BasicController {
	public function __construct(Request $request) {
		parent::__construct ( $request );
		$name = get_class ( $this );
		$len = strpos ( $name, "Controller" );
		$mod = substr ( $name, 0, $len );
		$mod = substr ( $mod, 5 );
		$mod = strtolower ( $mod );
		$this->_module = $mod;
		$this->_view->menu = true;
		if ($this->_session->isSetAttr ( "admin_name" ))
			$this->_view->admin_name = $this->_session->getAttribute ( "admin_name" );
	}
	public function getViewPath() {
		return $this->_module . "/view/admin/" . $this->_action . ".php";
	}
	
	public function checkPrivilage() {
		return User::getLoggedUser()->isAdmin();
	}
}