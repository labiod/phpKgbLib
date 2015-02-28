<?php
class AlertMessage extends Component {
	private $msg = "";
	public function __construct($msg) {
		$this->msg = $msg;
	}
	public static function showMessage($msg) {
		if (isset ( $msg ) && $msg != '') {
			$alert = new AlertMessage ( $msg );
            $alert->show();
		}
	}
	public function show() {
        include "view/alert.phtml";
	}
}