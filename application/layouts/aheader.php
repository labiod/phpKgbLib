<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="KGBetlej" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type="text/javascript" src="/public/js/jquery.js"></script>
	<script type="text/javascript" src="/public/js/fancybox/jquery.fancybox-1.3.4.js"></script>
	<link type="text/css" rel="stylesheet" href="/public/js/fancybox/jquery.fancybox-1.3.4.css" />
	<link href="/public/css/admin.css" type="text/css" rel="stylesheet" />
<?php 
	$this->attachStyles();
	$title = (isset($this->title)) ? "Panel Administracyjny - ".$this->title : "Panel Administracyjny";
?>
	<script src="/public/js/ajax/ajaxObject.js" language="Javascript" type="text/javascript"></script>
		<script src="/public/js/ajax/getContent.js" language="Javascript" type="text/javascript"></script>
	<script type="text/javascript" src="/public/js/ajax/uploadfile.js"></script>
	<script type="text/javascript" src="/public/js/control/control.js"></script>
	<script type="text/javascript" src="/public/js/upload/FileUploader.js"></script>
	<script type="text/javascript" src="/public/js/tiny_mce/tiny_mce.js"></script>
	
	<title><?php echo $title; ?></title>
	<script type="text/javascript"> 
	$(document).ready(function() {
		$("a.galeria").fancybox(); 
	}); 
	</script>
	<script type="text/javascript" src="/public/js/admin.js"></script>
</head>
<body>
	<div id="header" >
		<img id="logo" alt="LOGO" src="/public/images/logo.png">
		<h2> Panel Administracyjny</h2>
	</div>
	<div id="main">
		<div id="zalogowany" >Jestes zalogowany jako  <?php echo $this->admin_name; ?> <a href="/auth/panel/logout">Wyloguj <img class="icon" src="<?php echo Settings::getParam("icon", "logout"); ?>" alt="Wyloguj" title="Wyloguj" /></a></div>
	<?php 
		if(isset($this->message)) {
		?><h3 id="message" ><?php echo $this->message; ?></h3>
		<?php 
		} 
		if(isset($this->menu)) {
			echo loadModule("showMenuPanel");
		}
	?>
	<div id="right_div">
