<?php
class Mail {
	private $headers;
	private $from;
	private $to;
	private $subject;
	private $content;
	public function __construct($from, $to, $subject, $message, $file = null) {
		if ($file == null) {
			$boundary = "==MP_Bound_xyccr948x==";
			$headers = "From: $from\n";
			$headers .= "Reply-To: $from\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: multipart/alternative; boundary=\"$boundary\"\n";
			$msg = "Jest to komunikat wieloczęściowy w formacie MIME \n";
			$msg .= "--$boundary\n";
			$msg .= "Content-Type: text/plain; charset=UTF-8\n";
			$msg .= "Content-Transfer-Encoding: 8bit\n\n";
			$msg .= $message . "\n";
			$msg .= "--" . $boundary . "\n";
			$msg .= "Content-Type: text/html;charset=\"utf-8\"\n";
			$msg .= "Content-Transfer-Encoding: 8bit\n\n";
			$msg .= $message . "\n";
			$msg .= "--" . $boundary . "--";
			$this->content = $msg;
			$this->headers = $headers;
			$this->from = $from;
			$this->to = $to;
			$this->subject = $subject;
		} else {
			$boundary = "==MP_Bound_xyccr948x==";
			$boundary2 = "==Alt-MP_Bound_xyccr948x==";
			$attachfile = "";
			foreach ( $file as $value ) {
				$attach1 = $value->getFullPath ();
				$filetype = $value->getFileType ();
				$fileattname = $value->getName ();
				$filesize = $value->getSize ();
				$handle = fopen ( $attach1, 'rb' );
				$f_contents = fread ( $handle, filesize ( $attach1 ) );
				$attachment = chunk_split ( base64_encode ( $f_contents ) );
				$attachfile .= "--$boundary\n";
				$attachfile .= "Content-Type: application/{$filetype}; name=\"{$fileattname}\"\n" . "Content-Disposition: attachment\n" . "Content-Transfer-Encoding: base64\n\n";
				$attachfile .= $attachment . "\n\n";
			}
			fclose ( $handle );
			$message2 = Utilities::clearHtmlTag ( $message );
			$headers = "From: $from\n";
			$headers .= "Reply-To: $from\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
			$msg = "Jest to komunikat wieloczęściowy w formacie MIME \n";
			$msg .= "--$boundary\n";
			$msg .= "Content-Type: multipart/alternative; boundary=\"$boundary2\"\n";
			$msg .= "--$boundary2\n";
			$msg .= "Content-Type: text/plain; charset=UTF-8\n";
			$msg .= "Content-Transfer-Encoding: 8bit\n\n";
			$msg .= $message2 . "\n";
			$msg .= "--" . $boundary2 . "\n";
			$msg .= "Content-Type: text/html; charset=\"utf-8\"\n";
			$msg .= "Content-Transfer-Encoding: 8bit\n\n";
			$msg .= $message . "\n";
			$msg .= "--" . $boundary2 . "--\n";
			$msg .= "--$boundary\n";
			$msg .= $attachfile;
			$msg .= "--" . $boundary . "--";
			$this->content = $msg;
			$this->headers = $headers;
			$this->from = $from;
			$this->to = $to;
			$this->subject = $subject;
		}
	}
	public function send() {
		if (! mail ( $this->to, $this->subject, $this->content, $this->headers )) {
			echo "Nie udało się wysłać maila";
			die ();
		}
	}
}

?>