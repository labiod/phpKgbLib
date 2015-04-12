<?php
require_once "class.Context.php";

abstract class BasicApplication extends Context {
    private static $CONFIG_PATH = "config.ini";

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
	protected function __construct() {
        parent::__construct(BasicApplication::$CONFIG_PATH);
		$this->_session = HttpSession::getSession ();
		$url = substr ( $_SERVER ['REQUEST_URI'], 1 );
		$conn = DBConnection::connection ( $this->getParam ( "db", "host" ),
            $this->getParam ( "db", "user" ), $this->getParam ( "db", "password" ) );
		$conn->selectDB ( $this->getParam ( "db", "dbname" ) );
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

    public function getContext() {
        return $this;
    }
}