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
    <link rel="stylesheet" href="/public/styles/grafik.css" type="text/css" />
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

            <a href="/"><div id="logo" >&nbsp;</div></a>
        </div>
        <div id="content">
            <div id="navi_info">
                <div  class="box_top">
                    <h4>Zalogowany:</h4>
                <dl>
                    <dt>Konto:</dt>
                    <dd><?php echo $user->getRoleName(); ?></dd>
                    <dt>Imię:</dt>
                    <dd><?php echo $user->getUserName(); ?></dd>
                    <dt>Nazwisko:</dt>
                    <dd><?php echo $user->getUserName(); ?></dd>
                    <dt>E-mail:</dt>
                    <dd><?php echo $user->getEmail(); ?></dd>
                    <dt>PESEL:</dt>
                    <dd><?php echo $user->getUserName(); ?></dd>
                    <dt>OSK:</dt>
                    <dd><?php echo $user->getOskName(); ?></dd>
                </dl>
                   <!-- <li><a></a>
                        <ul class="tab_menu_lvl2">
                            <a href="../grafik/kursant"><li>grafik jazd</li></a>
                            <li>dokup jazdy</li>
                            <li>historia jazd</li>
                            <li>trasy egzaminacyjne</li>
                            <li>pytania egzaminacyjne</li>
                            <li>ranking instruktorów</li>
                        </ul>
                    </li>
                    <li><a>Dane kursu</a>
                        <ul class="tab_menu_lvl2">
                            <li>dane kursu</li>
                            <li>dane kursu 2</li>
                            <li>dane kursu 3</li>
                        </ul>
                    </li>
                    <li><a>Profil</a>
                        <ul class="tab_menu_lvl2">
                            <a href="/user/profile"><li>pokaż profil</li></a>
                            <li>edytuj profil</li>
                            <li>historia wpłat</li>
                        </ul>   
                    </li>
                </ul>-->
                
            </div>
           <div class="box_top">Miejsce na shoutbox</div>
                <div  class="box_top">
                <h4>Informator:</h4>
                <dl>
                    <dt>Kurs Kategoria:</dt>
                    <dd><?php /*echo $user->getRoleName(); */?></dd>
                    <dt>Wyjeżdżono godzin:</dt>
                    <dd><?php /*echo $user->getRoleName(); */ ?></dd>
                    <dt>Zaznaczono godzin:</dt>
                    <dd><?php /*echo $user->getRoleName(); */ ?></dd>
                    <dt>Pozostało godzin:</dt>
                    <dd><?php /*echo $user->getRoleName(); */ ?></dd>
                    <dt>Termin jazd:</dt>
                    <dd><?php /*echo $user->getRoleName(); */ ?></dd>
                    <dt>Egzamin wewnętrzny:</dt>
                    <dd><?php /*echo $user->getRoleName(); */ ?></dd>
                    <dt>Powiadomienia:</dt>
                    <dd><?php /*echo $user->getRoleName(); */ ?></dd>
                </dl>
                    </div>
    </div>

            <div id="log_info" class="shadow">Jesteś zalogowany jako:
                <a href="/user/profile"><?php /*echo $user->getEmail(); */?></a><br/>
                OSK: <a href="/user/oskSite"><?php /*echo $user->getOskName(); */?></a>
                <a href="/user/logout" id="logout">Wyloguj</a></div>
            <div class="clear"></div>
<?php 
if(isset($this->message)) {
        echo "<h3 id=\"message\" >".$this->message."</h3>";
}	
