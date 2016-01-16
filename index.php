<?php
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('upload_tmp_dir', sys_get_temp_dir());
$libraryFolder = "lib";
$applicationFolder = "application";
$modulesFolder = "application/modules";
$modelsFolder = "application/models";
require_once ("$libraryFolder/utils/function.php");
require_once ("$libraryFolder/utils/class.AutoLoader.php");
require_once("$libraryFolder/class.Application.php");

$lib [] = $libraryFolder;
$lib [] = $applicationFolder;
$lib [] = $modulesFolder;
$lib [] = $modelsFolder;
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $lib));

AutoLoader::setLoader(STANDARD_LOADER);
try {
//    $test = new Test();
//    $test->show();
    $context = Application::getInstance();

    $context->dispatch();
} catch (Exception $e) {
    // header ("Content-Type: text/html; charset=utf-8");
    echo "error " . $e;
}
?>