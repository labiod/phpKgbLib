<?php
abstract class BasicApplication {
	/**
	 *
	 * @var BasicController
	 */
	protected $controller = null;
	protected $_module = "";
	protected $_request = null;
	protected $_action = "";
	protected $_session = null;
	protected $url = "";
	public function __construct() {
		$this->_session = HttpSession::getSession ();
		$url = substr ( $_SERVER ['REQUEST_URI'], 1 );
		$conn = DBConnection::connection ( Settings::getParam ( "db", "host" ), Settings::getParam ( "db", "user" ), Settings::getParam ( "db", "password" ) );
		$conn->selectDB ( Settings::getParam ( "db", "dbname" ) );
		$conn->setCharset ( "utf8" );
		$this->url = $url;
	}
	public function dispatch() {
	}
	protected function getAppParamsFromString(array $params, $start = 0) {
		return $this->getAppParams ( explode ( "/", $params ) );
	}
	protected function getAppParams(array $pArray, $start = 0) {
		$i = $start;
		$tab = array ();
		if (count ( $pArray ) > $i) {
			while ( $i < count ( $pArray ) ) {
				if ($i + 1 >= count ( $pArray ))
					break;
				$tab [$pArray [$i ++]] = $pArray [$i ++];
			}
		}
		return $tab;
	}
	public static function getRedirect() {
		foreach ( $_SERVER as $key => $val ) {
			if (strtoupper ( $key ) == "REQUEST_URI")
				return substr ( $val, 1 );
		}
	}
}