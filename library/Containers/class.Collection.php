<?php
class Collection implements IteratorAggregate {
	protected $_member = array();

	public function addItem($obj, $key = null) {
		if($key) {
			if(!isset($this->_member[$key])) {
				$this->_member[$key] = $obj;
				return true;
			} else 
				return false;
		} else {
			$this->_member[] = $obj;
			return true;
		}
	}
	public function removeItem($key) {
		if(isset($this->_member[$key])) {
			$ret = $this->_member[$key];
			unset($this->_member[$key]);
			return $ret;
		} else {
			return null;
		}
	}
	public function getItem($key) {
		if(isset($this->_member[$key])) {
			return $this->_member[$key];
		} else {
			return null;
		}
	}
	
	public function keys() {
		return array_keys($this->_member);
	}
	
	public function length() {
		return sizeof($this->_member);
	}
	
	//implementacja metod z Container
	public function __toString() {
		foreach($this->_member as $key => $mem) {
			$ret[] = $key." => ".$mem." ";
		}
		return "[ ".implode(",", $ret)." ]";
	}
	
	public function getIterator() {
		return new CollectionIterator(clone $this);
	}
}