<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head> 
    <?php $user = User::getLoggedUser();
// Application::loadComponent("MetaTags");
    ?> 
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
    <meta name="verify-v1" content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
<?php  $title = (isset($this->title)) ? "Lpunkt.pl - ".$this->title : "Lpunkt.pl - strona w budowie"; ?>
    <title><?php  echo $title;  ?> </title>
    <link rel="stylesheet" href="/public/styles/style.css" type="text/css" />
    <link rel="stylesheet" href="/public/styles/admin.css" type="text/css" />
    <script src="/public/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/public/js/script.js" type="text/javascript"></script>   
    <script src="/public/js/grafik.js" type="text/javascript"></script>  
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
            <a href="/"><img src="/public/images/logo_lpunkt.png" id="logo" /></a>
            <div id="log_info" class="shadow">Jesteś zalogowany jako: 
                <a href="/user/profile"><?php echo $user->getEmail(); ?></a> 
                OSK: <a href="/user/oskSite"><?php echo $user->getOskName(); ?></a>
                <a href="/user/logout" id="logout">Wyloguj</a>
            </div>
        </div>
        <div id="content">
            <div id="navi_info" style="display: none;">
                <div id="navigation">
                    <form action="/" method="post" id="search_form">
                        <input type="text" id="search_input" />
                        <input type="submit" id="search_btn" value=""/>
                    </form>
                </div>
            </div>
            <div class="clear"></div>
<?php 
if(isset($this->message)) {
        echo "<h3 id=\"message\" >".$this->message."</h3>";
}	