<?php
class AlertMessage extends Component {
	private $msg = "";
	public function __construct($msg) {
		$this->msg = $msg;	
	}
	public static function showMessage($msg) {
            if(isset($msg) && $msg != ''){
		$alert = new AlertMessage($msg);
		echo $alert->show();
            }
	}
	public function show() {
		$content =<<<EOD
			<div class="alert_message">
			<h3>{$this->msg}</h3>
			</div>
EOD;
		return $content;
	}
}