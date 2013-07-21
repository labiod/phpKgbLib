<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head> 
    <?php// Application::loadComponent("MetaTags");?> 
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
    <meta name="verify-v1" content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
    <title>Lpunkt.pl - strona w budowie</title>
    <?php 
         //   $this->attachStyles();
    ?>	
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
            <div id="log_info" class="shadow">Jesteś zalogowany jako: <a href="#">Twój login</a> <a href="#" id="logout">Wyloguj</a></div>
            <div id="logo_osk">OSK<br/>logo o rozm. max: 400 x 100 px</div>
        </div>
        <div id="content">

   <!-- <h2 id="title">Logowanie</h2>  <div class="clear"></div> -->
          <!-- 
            <ul id="inner_left_menu">
                <li>Kursant</li>
                <li>Instruktor</li>
                <li>OSK</li>
            </ul>
          -->
          <ul id="main_tab_menu">
                <li><a>Strefa kursanta</a>
                    <ul class="tab_menu_lvl2">
                        <li>grafik jazd</li>
                        <li>dokup jazdy</li>
                        <li>historia jazd</li>
                        <li>trasy egzaminacyjne</li>
                        <li>pytania egzaminacyjne</li>
                        <li>ranking instruktorów</li>
                    </ul>
                </li>
                <li><a>Dane kursu</a>
                    <ul class="tab_menu_lvl2">
                        <li>grafik jazd</li>
                        <li>dokup jazdy</li>
                        <li>historia jazd</li>
                        <li>trasy egzaminacyjne</li>
                        <li>pytania egzaminacyjne</li>
                        <li>ranking instruktorów</li>
                    </ul>
                </li>
                <li class="selected"><a>Profil</a>
                     <ul class="tab_menu_lvl2">
                        <li>pokaż profil</li>
                        <li>edytuj profil</li>
                        <li>historia wpłat</li>
                    </ul>   
                </li>
            </ul>
<div class="clear"></div>
<?php 
if(isset($this->message)) {
        echo "<h3 id=\"message\" >".$this->message."</h3>";
}	
