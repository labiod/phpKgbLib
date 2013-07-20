<?php
abstract class Widget {
	protected $data = null; //obiekt klasy Data
	abstract public function show();
	public final function updateData(Data $data) {
		$this->data = $data;
	}
}