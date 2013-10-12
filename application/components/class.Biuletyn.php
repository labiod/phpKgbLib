<?php

/*
 * To change this template, choose Tools | Templates and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author Labiod
 * @version 0.1.2
 */
class Biuletyn extends Component {
	// put your code here
	public function show() {
		$url = Application::getRedirect ();
		$session = HttpSession::getSession ();
		$message = "";
		if ($session->isSetAttr ( "biuletyn" )) {
			$message = '<h3 style="color: #B72E00;">' . $session->getAttribute ( "biuletyn" ) . '</h3>';
			$session->clearAttribute ( "biuletyn" );
		}
		$res = <<<EOD
	{$message}
	Chcesz wiedzieć jakie nowe tarty <br />mamy dla Ciebie?<br />
	I co słychać we Francji i w Belgii?	<br />
	Zapisz się na bezpłatny biuletyn!	
	<form action="/newsletter/addmail" method="post" onSubmit="return spr_biuletyn();">
		Imię: <input type="text" name="name"><br/>
		E-mail: <input type="text" name="email"><br/>	
		<input type="hidden" name="redirect" value="{$url}">
		<input type="submit" class="form_but" name="submit" value="Wyślij" >			
	</form>
EOD;
		return $res;
	}
}
?>
