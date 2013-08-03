<?php
error_reporting(E_ALL);
ini_set('upload_tmp_dir', sys_get_temp_dir());
 $lib[] = "library";
 $lib[] = "application";
 $lib[] = "application/modules";
 require_once 'library/utils/function.php';
set_include_path(get_include_path(). PATH_SEPARATOR. implode(PATH_SEPARATOR, $lib));
require_once("utils/class.AutoLoader.php");
AutoLoader::setLoader(STANDARD_LOADER);
try {
	
	$index = new Application();
	$index->dispatch();
} catch(Exception $e) {
	//header ("Content-Type: text/html; charset=utf-8");
	echo "error ". $e;
}


?>