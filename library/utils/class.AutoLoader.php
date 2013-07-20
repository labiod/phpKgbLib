<?php 
	define('STANDARD_LOADER', "standardLoader");
	define('FAST_LOADER', "fastLoader");
	define('PRECISE_LOADER', "preciseLoader");
class AutoLoader {
	static $Instance = null;
	public static function setLoader($type = STANDARD_LOADER) {
		spl_autoload_register("AutoLoader::".$type);
	}
	
	private static function standardLoader($name) {
		$dir = explode(PATH_SEPARATOR, get_include_path());	
		$module = explode("\\", $name);		
		if(($length = sizeof($module)) > 1) {
			$name = $module[$length - 1];
			unset($module[$length - 1]);
			$module = implode("/", $module);
			//$module = strtolower($module); 
			foreach($dir as $direct) {
				if(!is_dir($direct."/".$module))
					continue;
				$file = "class.".$name.".php";
				//$file[1] = "interface.".$name.".php";
				include($direct."/".$module."/".$file);
				//$direct = $direct."/".$module;
				//if(AutoLoader::findFile2($direct, $file))
				return true;
			}
			
		} else {
			foreach($dir as $direct) {
				$file[0] = "class.".$name.".php";
				$file[1] = "interface.".$name.".php";
				if(AutoLoader::findFile($direct, $file))
					return true;
			}
		}
		throw new Exception("Nie udało się załadować klasy ".$name);
	}
	private static function fastLoader($className) {
		AutoLoader::standardLoader($className);
	}
	private static function preciseLoader($className) {
		AutoLoader::standardLoader($className);
	}
	
	private static function findFile($direct, $fileNames) {
		foreach ($fileNames as $file) {
			$path = $direct."/".$file;
			if(is_file($path)) {
				require_once($path);
				return true;
			}
		}
		$folder = dir($direct);
		while($f = $folder->read()) {
			$d = $direct."/".$f;
			if($f != "." && $f != ".." && is_dir($d)) {
				if(AutoLoader::findFile($d, $fileNames))
					return true;	
			}
		}
		$folder->close();
		return false;
	}
}

