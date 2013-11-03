<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head> 
    <?php
// Application::loadComponent("MetaTags");
    ?> 
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
    <meta name="verify-v1" content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
<?php  $title = (isset($this->title)) ? "Lpunkt.pl - ".$this->title : "Lpunkt.pl - strona w budowie"; ?>
    <title><?php  echo $title;  ?> </title>
    <link rel="stylesheet" href="/public/styles/style.css" type="text/css" />
    <link rel="stylesheet" href="/public/styles/grafik.css" type="text/css" />
    <link rel="stylesheet" href="/public/styles/admin.css" type="text/css" />
<!--    <link rel="stylesheet" href="/public/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" type="text/css" />
    <script src="/public/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> -->
    <script src="/public/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/public/js/script.js" type="text/javascript"></script>   
    <script src="/public/js/grafik.js" type="text/javascript"></script>  
    <script src="/public/js/admin.js" type="text/javascript"></script>  
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
                <a href="#"><?php echo User::getLoggedUser()->getEmail(); ?></a> 
                <a href="/user/logout" id="logout">Wyloguj</a></div>
            <div id="logo_osk">Panel administracyjny</div>
        </div>
        <div id="content">
            <div id="navi_info">
          <ul id="main_tab_menu">
                <li><a>Ośrodki</a>
                    <ul class="tab_menu_lvl2">
                        <a href="/admin/osk"><li>lista ośrodków</li></a>
                        <a href="/admin/osk/registerOsk"><li>dodaj ośrodek</li></a>                    
                    </ul>
                </li>
                <li><a>Użytkownicy</a>
                    <ul class="tab_menu_lvl2">
                        <a href="/admin/user"><li>użytkownicy</li></a>
                        <a href="/admin/user/index/role/kursant"><li>kursanci</li></a>
                        <a href="/admin/user/index/role/instruktor"><li>instruktorzy</li></a>
                        <a href="/admin/user/index/role/osk"><li>lista pracowników osk</li></a>
                        <a href="/admin/user/index/role/admin"><li>administratorzy</li></a>
                    </ul>
                </li>
                <li><a>Profil</a>
                     <ul class="tab_menu_lvl2">
                        <li>pokaż profil</li>
                        <li>edytuj profil</li>
                        <li>historia wpłat</li>
                    </ul>   
                </li>
            </ul>

          </div>
<?php 
if(isset($this->message)) {
        echo "<h3 id=\"message\" >".$this->message."</h3>";
}	
