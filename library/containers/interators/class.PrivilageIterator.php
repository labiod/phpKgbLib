<?php
require_once 'library/containers/interators/class.CollectionIterator.php';

class PrivilageIterator extends CollectionIterator {
	
	/**
	 * @see CollectionIterator::current()
	 * @return Privilage
	 */
	public function current() {
		return parent::current();
	}
}