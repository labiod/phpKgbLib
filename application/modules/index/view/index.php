<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
    <?php
				// Application::loadComponent("MetaTags");
				?> 
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
<meta name="verify-v1"
	content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
<title>
<?php			
if (isset ( $this->title )) {
        echo $this->title;
} else {
        echo "Lpunkt.pl - strona w budowie";
}
?>	
    </title>
<link rel="stylesheet" href="/public/styles/style.css" type="text/css" />
<link rel="stylesheet" href="/public/styles/start_page.css" type="text/css" />
<script src="/public/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/public/js/script.js" type="text/javascript"></script>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>
<body>
    <div id="main">
        <div id="menu">
            <ul>
                <li><a href="">O Lpunkt</a></li>
                <li><a href="" class="selected_menu">Dla kursanta</a></li>
                <li><a href="">Dla Instruktora</a></li>
                <li><a href="">Dla Osk</a></li>
                <li><a href="">Kontakt</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div id="header">
            <a href="/"><img src="/public/images/logo_lpunkt.png" id="logo" /></a>
        </div>
	    <div id="buttons">
                <a href="/register" id="register_butt" class="orange_button_big">Rejestracja</a><br/>
                <a href="/user/login" id="login_butt" class="blue_button_big">Logowanie</a>
        </div>
        <div class="clear"></div>
<?php include ("layouts/footer.php"); ?>