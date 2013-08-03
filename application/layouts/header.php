<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head> 
    <?php
// Application::loadComponent("MetaTags");
    ?> 
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
    <meta name="verify-v1" content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
    <title>
    <?php if(isset($this->title)) {
        echo $this->title;
    }else {    
        echo "Lpunkt.pl - strona w budowie";
    }    ?>	
    </title>
    <link rel="stylesheet" href="/public/styles/style.css" type="text/css" />
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
        <div id="header">
            <img src="/public/images/logo_lpunkt.png" id="logo" />
            <div id="log_info" class="shadow">Nie jesteś zalogowany - <a href="#">Zaloguj się</a> <a href="/register">Zarejestruj się</a></div>
            <div id="logo_osk">OSK<br/>logo o rozm. max: 400 x 100 px</div>
        </div>
        <div id="content">
        
<?php 
if(isset($this->message)) {
        echo "<h3 id=\"message\" >".$this->message."</h3>";
}	
