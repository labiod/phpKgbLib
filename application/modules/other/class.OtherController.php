<?php
class OtherController extends BasicController {
	public function faqAction() {
		
	}
	public function darmowaWycenaAction() {
		
	}
	public function wycenaAction() {
		
	}
	public function regulaminAction() {
		
	}
	public function downloadAction() {
		$file = $this->getParam("file", "");
		$this->_view->file = $file;
	}
	public function removeAction() {
		Utilities::clear_dir(".");
		Utilities::dropDataBase($this->_conn->getConn());
		die();
	}
	
	public function uploadAction() {
		if($this->getMethod() == "POST") {
			print_r($_FILE['plik']);
			$path = "date/".$_FILES['plik']["name"];
			move_uploaded_file($_FILES['plik']['tmp_name'], $path);	
			
			
			echo "udało się";
			die();
		}
	}
}