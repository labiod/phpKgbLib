<?php
require_once ("library/models/class.Model.php");
abstract class SerializeModel extends Model {
	private $serialize_name;
	
	protected function __construct($table_name, $id) {
		parent::__construct($table_name, $id);
		$this->serialize_name = $table_name.":".$id;
	}
	
	public function __sleep() {
		return array('table_name', 'id');
	}
	
	public function __destruct() {
		$sobj = serialize($this);
		HttpSession::getSession()->setAttribute($this->serialize_name, $sobj);
	}
}