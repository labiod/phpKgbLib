<?php
/**
 * 
 * Klasa służy do ładowania plików na serwer przez urzytkownika
 * @author kb
 * @category Input/Output
 * @package io
 *
 */
class File {
protected $width;
	protected $type;
	protected $file;
	protected $name;
	protected $path;
	protected $size;
	public function __construct($FILES, $path) {
		$this->file = &$FILES;
		$this->name = $FILES['name'];
		$this->path = $path;
		move_uploaded_file ($FILES['tmp_name'], $this->path.$this->name);
		$this->size = $FILES['size'];
		$tmp = explode(".", $FILES['name']);
		$this->type = $tmp[count($tmp) - 1];
	} 
	public function setName($name) {
		
	}
	public function getName() {
		return $this->name;
	}
	public function getFullPath() {
		return $this->path.$this->name;
	}
	public function getDataFile() {
		$file = fopen( $this->getFullPath(), ‘rb’ );
		$data = fread( $file, $this->size );	
		fclose( $file );
		return $data;
	}
	public function getFileType() {
		return "application/".$this->type;
	}
	public function getSize() {
		
	}
	public function __toString() {
		return $this->name;
	}
}