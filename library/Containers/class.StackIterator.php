<?php
class StackIterator implements Iterator {
	private $_collection;
	private $_currIndex = 0;
	private $_keys;
	function __construct(Stack $objCol) {
		$this->_collection = $objCol;
		$this->_keys = $this->_collection->keys ();
	}
	function rewind() {
		$this->_currIndex = $this->_collection->getStackPointer ();
	}
	function key() {
		return $this->_keys [$this->_currIndex];
	}
	function current() {
		return $this->_collection->getItem ( $this->_currIndex );
	}
	function next() {
		$this->_currIndex --;
	}
	function valid() {
		return $this->_currIndex >= 0;
	}
}
