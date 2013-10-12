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
			<a href="/"><img src="/public/images/logo_lpunkt.png" id="logo" /></a>
			<div id="log_info" class="shadow">
				Jesteś zalogowany jako: <a href="#">Twój login</a> <a
					href="/user/logout" id="logout">Wyloguj</a>
			</div>
			<div id="logo_osk">
				OSK<br />logo o rozm. max: 400 x 100 px
			</div>
		</div>
		<div id="content">
			<div id="navi_info">
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
							<a href="../grafik/kursant"><li>grafik jazd</li></a>
							<li>dokup jazdy</li>
							<li>historia jazd</li>
							<li>trasy egzaminacyjne</li>
							<li>pytania egzaminacyjne</li>
							<li>ranking instruktorów</li>
						</ul></li>
					<li><a>Dane kursu</a>
						<ul class="tab_menu_lvl2">
							<li>grafik jazd</li>
							<li>dokup jazdy</li>
							<li>historia jazd</li>
							<li>trasy egzaminacyjne</li>
							<li>pytania egzaminacyjne</li>
							<li>ranking instruktorów</li>
						</ul></li>
					<li><a>Profil</a>
						<ul class="tab_menu_lvl2">
							<li>pokaż profil</li>
							<li>edytuj profil</li>
							<li>historia wpłat</li>
						</ul></li>
				</ul>

				<form action="/" method="post" id="search_form">
					<input type="text" id="search_input" />
					<input type="submit" id="search_btn" value="?" />
				</form>
				<div id="informator" class="shadow">
					<h3>Informator</h3>
					<button id="grafik">*</button>
					<button id="poczta">*</button>
					<button id="ocen">*</button>
					<p>
						data: 22 lipca 2013<br /> kurs kategorii B<br /> termin jazd: 25
						lipca 2013<br /> data: 22 lipca 2013<br /> kurs kategorii B<br />
						ilość wyjeżdżonych godz: 18<br /> ilość zaznaczonych godz: 2<br />
					</p>
				</div>
			</div>
<?php
if (isset ( $this->message )) {
	echo "<h3 id=\"message\" >" . $this->message . "</h3>";
}	
