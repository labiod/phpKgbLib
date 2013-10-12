<?php
class Request {
	private $_method;
	private $POST = null;
	private $GET = null;
	private $_headers = null;
	public function __construct($GET = null) {
		// $headers = apache_request_headers();
		$headers = getallheaders ();
		$this->_headers = $headers;
		$this->_method = "GET";
		foreach ( $headers as $header => $value ) {
			
			if (strtoupper ( $header ) == "CONTENT-TYPE") {
				
				$pos = strpos ( $value, ";" );
				if ($pos != "")
					$value = substr ( $value, 0, $pos );
				if ($value == "application/x-www-form-urlencoded" || $value == "multipart/form-data") {
					$this->_method = "POST";
					$this->POST = &$_POST;
				}
			}
		}
		$this->GET = $GET;
	}
	public function getParametersMap() {
		if ($this->POST == null)
			$ret = $this->GET;
		else if ($this->GET == null)
			$ret = $this->POST;
		else
			$ret = array_merge ( $this->POST, $this->GET );
		return $ret;
	}
	public function getParam($name, $default = "") {
		if ($this->_method == "POST") {
			if (isset ( $this->POST [$name] ))
				return $this->POST [$name];
			else {
				if (isset ( $this->GET [$name] ))
					return $this->GET [$name];
			}
		} else {
			if (isset ( $this->GET [$name] ))
				return $this->GET [$name];
		}
		return $default;
	}
	public function getMethod() {
		return $this->_method;
	}
	public function getHeaders() {
		return $this->_headers;
	}
}