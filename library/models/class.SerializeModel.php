<?php
require_once ("library/models/class.Model.php");
abstract class SerializeModel extends Model {
	private $serialize_name;
	protected $toSave = false;
	
	protected function __construct($table_name, $id) {
		parent::__construct($table_name, $id);
		$this->serialize_name = $table_name.":".$id;
	}
	
	public function __sleep() {
		return array('table_name', 'id', 'toSave');
	}
	
	public function __destruct() {
		if($this->toSave) {
			$sobj = serialize($this);
			HttpSession::getSession()->setAttribute($this->serialize_name, $sobj);
		} else {
			HttpSession::getSession()->clearAttribute($this->serialize_name);
		}
		
	}
	
	/**
	 * 
	 * @param boolean $save
	 */
	protected function setToSave($save) {
		$this->toSave = $save;
	}
}