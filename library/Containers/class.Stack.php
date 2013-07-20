<?php
class Stack extends Collection {
	private $stackIndex = -1;
	public function __toString() {
		$res = "[ ";
		for($i = $this->stackIndex; $i >= 0; $i--) {
			$res .= $this->_member[$i];
			if($i > 0)			
				$res .= ", ";
		}
		$res .= " ]";
		return $res;
	}
	public function addItem($obj) {
		throw new WrongMethodCallException("Wywołano niedozwoloną metodę: addItem");
	}
	
	public function removeItem($key) {
		throw new WrongMethodCallException("Wywołano niedozwoloną metodę: removeItem");
	}
	
	public function getItem($index) {
		if($index <= $this->stackIndex)
			return $this->_member[$index];
	}
	public function push($atr) {
		$this->_member[++$this->stackIndex] = $atr;
	}
	public function pop() {
		if($this->stackIndex >= 0)
			return $this->_member[$this->stackIndex--];
		return null;
	}
	
	public function getStackPointer() {
		return $this->stackIndex;
	}
	
	public function getIterator() {
		return new StackIterator($this);
	}
}