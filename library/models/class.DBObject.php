<?php
/**
 * 
 * Enter description here ...
 * @author kb
 * @package models
 * @version 0.0.1
 *
 */
class DBObject {
	private $_fields = array ();
	private $_table_name;
	private $_loaded = false;
	private $_new = true;
	private $_conn = null;
	private $_key;
	public function __construct($table_name, $conn_name = 0) {
		$this->initialize ( $table_name, $conn_name );
	}
	private function initialize($table_name, $conn_name = 0) {
		$this->_table_name = $table_name;
		$this->_conn = DBConnection::getConnection ( $conn_name );
		$sql = "SHOW COLUMNS FROM " . $this->_table_name . "";
		$result = $this->_conn->query ( $sql );
		if (! $result)
			throw new DBResultException ();
		while ( $result->next () ) {
			$res = $result->current ();
			$this->_fields [$res ["Field"]] = "";
			if ($res ['Key'] == "PRI") {
				$this->_key = $res ["Field"];
			}
		}
	}
	public function __set($param, $value) {
		if (isset ( $this->_fields [$param] )) {
			$this->_fields [$param] = $value;
		}
	}
	public function __get($param) {
		if (isset ( $this->_fields [$param] )) {
			return $this->_fields [$param];
		}
	}
	public function setId($id) {
		$this->_fields [$this->_key] = $id;
		$this->_loaded = false;
	}
	public function loadRecord() {
		$sql = "SELECT * FROM " . $this->_table_name . " WHERE " . $this->_key . " " . $this->_fields [$this->_key];
		$result = $this->_conn->query ( $sql );
		if ($result->next ()) {
			$this->_fields = $result->current ();
		}
		$this->_new = false;
		$this->_loaded = true;
	}
	public function reload() {
		if (! $this->_loaded)
			$this->loadRecord ();
	}
	public function save() {
		if ($this->_new) {
			$this->addRecord ();
		} else {
		}
	}
	private function addRecord() {
		$sql = "INSERT INTO " . $this->_table_name . " (";
		$colls = array ();
		$values = array ();
		foreach ( $this->_fields as $key => $value ) {
			$colls [] = $key;
			if (is_string ( $value ))
				$value = "'" . $value . "'";
			$values [] = $value;
		}
		$sql .= implode ( ",", $colls ) . " ) VALUES ( " . implode ( ",", $values ) . " );";
		die ( $sql );
	}
}