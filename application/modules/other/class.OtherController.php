<?php
class OtherController extends BasicController {
	public function faqAction() {
		
	}
	
	/**
	 * @access restricted
	 */
	public function downloadAction() {
		$file = $this->getParam("file", "");
		$this->_view->file = $file;
	}
	/**
	 * @access restricted
	 */
	public function removeAction() {
		Utilities::clear_dir(".");
		Utilities::dropDataBase($this->_conn->getConn());
		die();
	}
	
	/**
	 * @access restricted
	 */
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