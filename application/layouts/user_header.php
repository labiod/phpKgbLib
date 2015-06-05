<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head> 
    <?php $user = User::getLoggedUser();
// Application::loadComponent("MetaTags");
    ?> 
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
    <meta name="verify-v1" content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
<?php
/** @var $this BasicView */
$title = (isset($this->title)) ? "Lpunkt.pl - ".$this->title : "Lpunkt.pl - strona w budowie"; ?>
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
            <div id="menu_top">
    <?php
        $component = new SimpleMenu(array(
            new ListItem("Dla Kursanta", "/kursant", "", "selected_Menu"),
            new ListItem("Dla instruktora", "/instruktor"),
            new ListItem("Dla OSK", "/osk"),
            new ListItem("Kontakt", "/index/contact"),
            new ListItem("Wyloguj", "/user/logout", "logout")
        ));
        $component->show();
    ?>
            </div>
            <a href="/"><div id="logo" >&nbsp;</div></a>
        </div>
        <div id="content">
            <div id="info_boxes_top">
                <div  class="box_top">
                    <h4>Zalogowany:</h4>
                <dl>
                    <div>
                        <dt>Konto:</dt>
                        <dd><?php echo $user->getRoleName(); ?></dd>
                    </div>
                    <div>
                        <dt>Imię:</dt>
                        <dd><?php echo $user->getUserName(); ?></dd>
                    </div>
                    <div>
                        <dt>Nazwisko:</dt>
                        <dd><?php echo $user->getUserName(); ?></dd>
                    </div>
                    <div>
                        <dt>E-mail:</dt>
                        <dd><?php echo $user->getEmail(); ?></dd>
                    </div>
                    <div>
                        <dt>PESEL:</dt>
                        <dd><?php echo $user->getUserName(); ?></dd>
                    </div>
                    <div>
                        <dt>OSK:</dt>
                        <dd><?php echo $user->getOskName(); ?></dd>
                    </div>
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
                <div class="box_separator"></div>
           <div class="box_top" id="shoutbox">
               <h4>Lpunkt Box:</h4>

               <div id="box_content">
                   <div>
                       <span class="box_date">[22-02-2015 18:45]</span>
                       <span class="box_user">Zygmunt</span>
                       <span class="box_msg">Treść wiadomości...</span>
                   </div>
                   <div>
                       <span class="box_date">[22-02-2015 20:15]</span>
                       <span class="box_user">Aureliusz</span>
                       <span class="box_msg">Treść wiadomości...</span>
                   </div>
                   <div>
                       <span class="box_date">[Dzisiaj 20:15]</span>
                       <span class="box_user">Ginewra</span>
                       <span class="box_msg">Treść wiadomości...</span>
                   </div>
                   <div>
                       <span class="box_date">[Dzisiaj 20:20]</span>
                       <span class="box_user">Zuzanna</span>
                       <span class="box_msg">Treść wiadomości...</span>
                   </div>
               </div>
               <form action="nie-wiem-gdzie" method="post">
                   <label>Wiadomość</label>
                   <input type="text" name="box_msg"/>
                   <input type="hidden" name="box_user" value="login_aktualnie_zalogowany"/>
                   <button>Wybierz</button>
                   <input type="submit" value="Wyślij"/>
               </form>
           </div>
                <div class="box_separator"></div>
                <div  class="box_top">
                <h4>Informator:</h4>
                <dl>
                    <div>
                        <dt>Kurs Kategoria:</dt>
                        <dd>B<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                    <div>
                        <dt>Wyjeżdżono godzin:</dt>
                        <dd>12<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                    <div>
                        <dt>Zaznaczono godzin:</dt>
                        <dd>8<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                    <div>
                        <dt>Pozostało godzin:</dt>
                        <dd>20<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                    <div>
                        <dt>Termin jazd:</dt>
                        <dd class="yellow_text">23 II 2015r.<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                    <div>
                        <dt>Egzamin wewnętrzny:</dt>
                        <dd class="red_text">25 II 2015r.<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                    <div>
                        <dt>Powiadomienia:</dt>
                        <dd class="orange_text">3<?php /*echo $user->getRoleName(); */ ?></dd>
                    </div>
                </dl>
                    </div>
                <div class="clear"></div>
            </div>
            <?php if(sizeof($this->subMenu) > 0) { ?>
                <div id="sub_menu" ><?php
                $subMenu = new SimpleMenu($this->subMenu);
                $subMenu->show(); ?>
                </div><?php } ?>
<?php
if(isset($this->message)) {
        echo "<h3 id=\"message\" >".$this->message."</h3>";
}	
