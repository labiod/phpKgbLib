<?php
require_once 'library/models/class.Data.php';
/**
 *
 *
 *
 * Enter description here ...
 *
 * @author krzysiekb
 * @category Data Base Classes
 * @package models
 * @version 0.0.1
 */
class DBResult extends Data {
	private $count;
	private $currentRow = null;
	private $index;
	private $id;
	private $error;
	public function __construct($result = null) {
		$this->id = $result;
		if ($result != null) {
			$this->count = mysql_num_rows ( $result );
			$this->index = - 1;
			$this->data = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$this->data [] = $row;
			}
		} else {
			$this->error = mysql_error ();
			$this->index = - 1;
			$this->count = 0;
			$this->data = array ();
			if ($this->error != null && count ( $this->error ) > 0) {
                throw new DBResultException ( $this->error );
            }
		}
		// $this->current = $this->data[0];
	}
	public function find($key, $id) {
		$res = null;
		while ( $this->next () ) {
			$test = $this->current ();
			if ($test [$key] == $id) {
				$res = $this->current ();
				break;
			}
		}
		$this->goToBegin ();
		return $res;
	}
	public function getData() {
		return $this->data;
	}
	public function current() {
		if ($this->currentRow == null)
			$this->next ();
		return $this->currentRow;
	}
	public function goToBegin() {
		$this->index = - 1;
		if (isset ( $this->data [0] ))
			$this->currentRow = $this->data [0];
	}
	public function next() {
		$this->index ++;
		if ($this->index < $this->count) {
			$this->currentRow = $this->data [$this->index];
			return true;
		}
		return false;
	}
	public function numRows() {
		return $this->count;
	}
	public function __toString() {
		if ($this->numRows () == 0)
			return "";
		else
			return "" . $this->id;
	}
	/**
	 *
	 *
	 *
	 * Metoda sprawdza, czy obiekt nie jest null-em
	 * Obiekt DBResult jest null-em jeśli dane w nim zawarte są puste
	 * lub gdy liczba rekordów jest równa 0
	 *
	 * @return boolean
	 */
	public function isNull() {
		if ($this->data == null || $this->count == 0)
			return true;
		return false;
	}
}