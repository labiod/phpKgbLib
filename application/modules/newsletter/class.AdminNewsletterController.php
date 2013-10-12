<?php
class AdminNewsletterController extends AdminBasicController {
	private $newsletter = null;
	public function initAll() {
		$this->newsletter = new Table ( "newsletter" );
	}
	public function indexAction() {
		$this->_view->newsletter = $this->newsletter->fetchAll ();
		$this->_view->appendStyle ( "/public/css/admin_view.css" );
	}
	public function biuletynAction() {
		$this->_view->appendStyle ( "/public/css/admin_edit.css" );
	}
	public function deleteAction() {
		$id = $this->getParam ( "id", 0 );
		$mail = new Table ( "newsletter" );
		$mail->delete ( "id_user = " . $id );
		$this->setMessage ( "Email został usunięty" );
		header ( "Location: /newsletter/admin" );
	}
	public function confirmAction() {
		$tab = $this->getParametersMap ();
		switch ($tab ['action']) {
			case "biuletyn" :
				
				$addresses = $this->newsletter->fetchAll ();
				$addresses = $addresses->toArray ();
				$message = "Lista mailingowa jest pusta";
				$top = <<<EOD
				
				<p>Witaj Drogi Czytelniku,</p>
EOD;
				$tab ['body'] = $top . $tab ['body'];
				$tab ['body'] .= <<<EOD
				<p><span style='font-style: italic;'>Marta Gralewska</span><br/>
					<a href='http://www.facebook.com/TartYvonne'>www.facebook.com/TartYvonne</a><br/>
					<a href='http://tarty.com.pl'>www.tarty.com.pl</a><br/></p>

		       <p>-------------------------------------------------------------------------------------------------------<br/>
			   Zapewniam Cię, że nikomu nie udostępnię Twojego adresu. Bardzo szanuję prawo do prywatności.<br/><br/>
			   Jeśeli zechcesz się wypisać z grona czytelników, wystarczy : 
EOD;
				if (! isset ( $tab ["mail"] )) {
					foreach ( $addresses as $address ) {
						
						$id = urlencode ( md5 ( $address ['id_user'] ) );
						$mail = new Mail ( "Tart'Yvonne <mgralewska@tarty.com.pl>", $address ['email'], $tab ['title'], $tab ['body'] . "<a href='" . $_SERVER ['SERVER_NAME'] . "/newsletter/delete/id/" . $id . "'>kliknąć tutaj</a></p>" );
						$mail->send ();
						$message = "Newsletter został wysłany";
						$this->setMessage ( $message );
						header ( "Location: /newsletter/admin/index" );
					}
				} else {
					$id = "";
					$mail = new Mail ( "Tart'Yvonne <mgralewska@tarty.com.pl>", $tab ["mail"], $tab ['title'], $tab ['body'] . "<a href='" . $_SERVER ['SERVER_NAME'] . "/newsletter/delete/id/" . $id . "'>kliknąć tutaj</a></p>" );
					$mail->send ();
					$message = "Newsletter został wysłany";
					echo "Testowy Mail został wysłany";
				}
				
				break;
			default :
				break;
		}
		die ();
	}
}