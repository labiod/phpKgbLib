<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
	<head> 
		<?php Application::loadComponent("MetaTags");?> 
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	  	<meta name="Author" content=" Gabriela Betlej, Krzysztof Betlej " />
	  	<meta name="verify-v1" content="7/ZGLd5IaiD47BhTo/P8KbkLEsNYDtNk0Aezk5lmeRI=" />
		<?php 
			$this->attachStyles();
		?>
		
	  	<link rel="stylesheet" href="/public/css/style.css" type="text/css" />
		<!-- 
			<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAuLf0a5liAKiZVjdI8SuigRTMnaRBjk2OfqhkBGs4Nk0WFpK0LhRI9OZl2RLGm3HXnuWo-OM9HfW3ng" type="text/javascript"></script>   
		-->
		<script type="text/javascript" src="/public/js/form/form.js"></script>
		<script src="/public/js/articles/newsWizard.js" type="text/javascript"></script>
		<script type="text/javascript" src="/public/js/jquery.js"></script>
		<script type="text/javascript" src="/public/js/fancybox/jquery.fancybox-1.3.4.js"></script>
		<script src="/public/js/index.js" type="text/javascript"></script>
		<script src="/public/js/utils/utils.js" type="text/javascript"></script>
		<link type="text/css" rel="stylesheet" href="/public/js/fancybox/jquery.fancybox-1.3.4.css" />
		<link type="text/css" rel="stylesheet" href="/public/css/form.css" />
	<script type="text/javascript"> 
	$(document).ready(function() {
		$("a.galeria").fancybox(); 
	}); 
	</script>
	</head>  
<body>
	<div id="all">
	 	<div id="head">   
	 	   	<img src="/public/images/baner2.png" alt="baner"/>   
	 	   	
	 		<div id="div_nav">
	 			<?php Application::loadComponent("showMenu"); ?>
	 		</div>	
	 	</div>
 		<div id="main">
 			<div id="div_left">
	 			<div>ZDAJESZ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- DOSTAJESZ<br/>
	 			<img src="/public/images/mp3.png" id="mp3" />Jeśli zdasz za pierwszym razem, dostaniesz odtwarzacz MP3.
	 			</div>
	 			<div>ZBIERAJ GODZINY<br/>PRZED EGZAMINEM!<br/>
	 			<img src="/public/images/mordki.png" id="mordki" /><span id="h18">= 18h</span>
	 			Za każdą osobę, która dzięki Tobie zapisze się na kurs w&nbsp;naszym ośrodku, dostaniesz godzinę jazd przed egzaminem.
	 			</div>
	 			<div>&nbsp;</div>
	 		</div>
 			<div id="content">	
<?php 
		if(isset($this->message)) {
			echo "<h3 id=\"message\" >".$this->message."</h3>";
		}	