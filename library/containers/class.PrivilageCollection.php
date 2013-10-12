<?php
require_once 'library/containers/class.Collection.php';
require_once 'library/containers/interators/class.PrivilageIterator.php';

class PrivilageCollection extends Collection {
	
	/**
	 * 
	 * @param string $key
	 * @return Privilage
	 */
	public function getPriv($key) {
		return $this->getItem($key);
	}
	/**
	 * 
	 * @param Privilage $priv
	 * @param string $key
	 */
	public function addPriv(Privilage $priv, $key) {
		$this->addItem($priv, $key);
	}
	
	/**
	 * 
	 * @param string $key
	 */
	public function removePriv($key) {
		$this->removeItem($key);
	}
	
	public function contains($key) {
		return array_key_exists($key, $this->_member);
	}
		
	/**
	 * @return PrivilageCollection
	 */
	public function getIterator() {
		return new PrivilageIterator(clone $this);
	}
}