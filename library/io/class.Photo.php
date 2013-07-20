<?php 
class Photo {
	protected $width;
	protected $height;
	protected $type;
	protected $file;
	protected $name; //sama nazwa
	protected $name_mini;
	protected $path; //sama ścieżka-nie zawiera nazwy
	protected $path_mini;  
	public function __construct($FILES, $path) {
		$this->file = &$FILES;
		$this->name = $FILES['name'];
		$this->path = $path;
		move_uploaded_file ($FILES['tmp_name'], $this->path.$this->name);
		list($this->width, $this->height, $this->type) = getimagesize($this->path.$this->name);
	} 
	public function resize($width = 0, $height = 0, $path = '') {
		if($width != 0 && $height != 0){
		}else{
			if ($width != 0){
				$skala = $width / $this->width;
				$height = $skala * $this->height;
			}else{
				$skala = $height / $this->height;
				$width = $skala * $this->width;
			}
		}
		$plik = $this->path.$this->name;
		if ($path == ''){
			
			$path = $plik;
		}
		switch ($this->type) {
		case 1: 
			$obrazek = imagecreatefromgif ($plik);
			$tlo = imagecreatetruecolor ($width, $height);
			imagecopyresampled ($tlo, $obrazek, 0,0,0,0, $width, $height, $this->width, $this->height);		
			imagegif ($tlo, $path);
			break;
		case 2:
			$obrazek = imagecreatefromjpeg ($plik);
			$tlo = imagecreatetruecolor ($width, $height);
			imagecopyresampled ($tlo, $obrazek, 0,0,0,0, $width, $height, $this->width, $this->height);		
			imagejpeg ($tlo, $path);
			break;
		case 3:
			$obrazek = imagecreatefrompng ($plik);
			$tlo = imagecreatetruecolor ($width, $height);
			imagecopyresampled ($tlo, $obrazek, 0,0,0,0, $width, $height, $this->width, $this->height);		
			imagepng ($tlo, $path);
			break;
		}			
	}
	public function resizeFixed ($max, $path = ''){
		if ($this->width > $this->height){
			$width = $max;
			$height = 0;
		}else {
			$height = $max;
			$width = 0;
		}
		$this->resize($width, $height, $path);
	}
	public function createMini ($w = 0,$h = 0, $prefix = 'm'){
		$this->name_mini = $prefix."_".$this->name;
		$this->path_mini = $this->path;
	  	$this->resize($w,$h, $this->path_mini.$this->name_mini);
	}
	public function createMiniFixed ($max, $prefix = 'm'){
		$this->name_mini = $prefix."_".$this->name;
		$this->path_mini = $this->path;
	  	$this->resizeFixed($max, $this->path_mini.$this->name_mini);
	}
	public function setName($newname, $newname_mini="") {
		if($newname_mini == ""){
			$newname_mini = "m_".$newname;
		}
		rename($this->path.$this->name, $newname);
		rename($this->path_mini.$this->name_mini, $newname_mini);
		$this->name = $newname;
		$this->name_mini = $newname_mini;
	}
	public function getName() {
		return $this->name;
	}
	public function getFullPath() {
		return $this->path.$this->name;
	}
	public function getNameMini() {
		return $this->name_mini;
	}
	public function getFullPathMini() {
		return $this->path.$this->name_mini;
	}
	
	public static function movePict($currentDir, $target, $mini = false, $name="") {
		//$hostname = $_SERVER[''];
		$m_currentDir = split("/", $currentDir);
		if ($name == ""){
			$pictName = $m_currentDir[count($m_currentDir) - 1];
		}else {
			$pictName = $name; 
		}
		
		$newDir = $target."/".$pictName;
		copy($currentDir, $newDir);
		if($mini == true) {
			$m_pictName = "m_".$pictName;
			$m_currentDir[count($m_currentDir) - 1] = $m_pictName;
			$m_currentDir = join("/", $m_currentDir);
			$m_newDir = $target."/".$m_pictName;
			copy($m_currentDir, $m_newDir);
		}
		return $pictName;
	}
	
}
?>