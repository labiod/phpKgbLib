<?php
abstract class Model {
	protected $table_name = "";
	protected $id = 0;
	private $serialize_name;
	protected function __construct($table_name, $id) {
		$this->table_name = $table_name;
		$this->id = $id;
		$this->fetch ();
	}
	public function getId() {
		return $id;
	}
	public function __toString() {
		return "table_name = " . $this->table_name . ", id = " . $this->id;
	}
	
	/**
	 *
	 * @return Table
	 */
	protected function createQuery() {
		$query = new Table ( $this->table_name );
		return $query;
	}
	public function fetch() {
		$query = $this->createQuery ();
		$result = $query->fetch ();
		if ($result->numRows () == 1 && $result->next ()) {
			$this->fetchData ( $result->current () );
		}
	}
	public abstract function fetchData($data);
}