<?php
class NewsletterController extends BasicController {
	private $newsletter = null;
	public function initAll() {
		$this->newsletter = new Table("newsletter");
	}
	public function addmailAction() {
		if($this->getMethod() == "POST") {
			$tab = $this->getParametersMap();
			$sendmail = new Table('newsletter');
			$redirect = ($tab['redirect'] == "" ? "index/index" : $tab['redirect']);
			unset($tab['redirect']);
			unset($tab['submit']);
			$id = $sendmail->insert($tab);
			if($id == 0) {
				$message="biuletyn=Twój email istnieje już w bazie danych";
			}
			else {
				$message="biuletyn=Twój email został dodany";
				/*************************************/
				//mail powitalny
				$id = urlencode(md5($id));
				$from = "Tart'Yvonne <egralewska@tarty.com.pl>";	
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-2\r\n";
				$headers .= "Content-Transfer-Encoding: 8bit\r\n";
				$headers .= "From: ".$from."\r\n";
				$subject = 'Biuletyn na Dzień Dobry';	
				$text = "------------------------------------------------------------------------<br/>".
						" &#34;O tartach  oraz o ich ojczyznach : Francji i Belgii&#34;<br/>".		
						"------------------------------------------------------------------------<br/>".	
						"<p>Witaj Drogi Czytelniku,</p>
		 <p>Cieszę się, że jesteś zainteresowany nowościami w mojej tarterii.</p>
		 <p>Tarty są daniem i deserem uniwersalnym i dlatego zrobiły furorę<br/>w kuchni francuskiej. Jestem pewna, że znajdziesz coś dla siebie<br/>wśród naszych propozycji.</p>
		 <p>Opowiem tutaj historie najbardziej znanych tart francuskich<br/>i belgijskich.<br/>Jeśli już zdarzyło Ci się wypiekać własne tarty, może nasze<br/>sugestie pomogą Ci coś dodać lub urozmaicić w Twoich<br/>przepisach.
		 	<br/>A może dopiero będziesz próbował swoich sił w tej dziedzinie ?<br/>Zachęcam Cię gorąco do kulinarnych eksperymentów i będzie mi<br/>bardzo miło, jeśli podzielisz się ze mną swoimi sugestiami<br/>i opiniami.</p>	
		 <p>Będę tu także pisać o moich odkryciach i refleksjach nie tylko<br/>kulinarnych. Często odwiedzam Francję i Belgię i chętnie<br/>opowiem o tym, co mnie tam zadziwia i/lub zachwyca. Może<br/>zachęcę Cię tymi opowiadaniami do odwiedzenia tych krajów ?</p>	
		 <p>Dziękuję Ci za zaufanie</p>
		 <p style='margin-left: 10em;'><span style='font-style: italic;'>Elżbieta Gralewska</span><br/><a href='http://tarty.com.pl/index.php'>www.tarty.com.pl</a><br/></p>
		 <p>-------------------------------------------------------------------------------------------------------<br/>".
					"Jeśeli zechcesz się wypisać z grona czytelników, wystarczy :  <br/>"."<a href='".$_SERVER['SERVER_NAME']."/newsletter/delete/id/".$id."'>kliknąć tutaj</a></p>";		
		
			$mail = new Mail("Tart'Yvonne <egralewska@tarty.com.pl>", $tab['email'], $subject, $text);
			$mail->send();
				/*************************************/
			}
				
			$this->forward($redirect, $message);
		}
		
	}
	public function deleteAction() {
		$id = $this->getParam("id", "");
		$id = urldecode($id);
		$this->_view->message = "niepoprawny link";
		if($id != "") {
			$this->_view->message = "Użytkownik już nie istnieje w bazie danych";
			$users = $this->newsletter->fetchAll();
			$users = $users->toArray();
			foreach ($users as $user) {
				if($id == md5($user['id_user'])) {
				//if($id == $user['id_user']) {
					$this->newsletter->delete("id_user = ".$user['id_user']);
					$this->_view->message = "Email został usuniety";
					break;
				}
			}
		}
	}
}