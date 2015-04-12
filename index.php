<?php
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('upload_tmp_dir', sys_get_temp_dir());
require_once 'library/utils/function.php';
require_once("library/utils/class.AutoLoader.php");
require_once("library/class.Application.php");

$lib [] = "library";
$lib [] = "application";
$lib [] = "application/modules";
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $lib));

AutoLoader::setLoader(STANDARD_LOADER);
try {
    $context = Application::getInstance();
    Log::d($context, "Index", "Log Test");

    $context->dispatch();
} catch (Exception $e) {
    // header ("Content-Type: text/html; charset=utf-8");
    echo "error " . $e;
}
?>