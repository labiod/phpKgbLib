<?php
class AdminGalleryController extends AdminBasicController {
	protected function initAll() {	
		$this->_gallery = new Table("photo");	
	}
	public function indexAction(){
		$this->_view->gallery = $this->_gallery->fetchAll("","order_by");
		$this->_view->style = "/public/css/admin_view.css";
	}
	public function addAction() {
		$this->_view->style = "/public/css/admin_edit.css";
	}
	public function confirmAction() {
		$tab = $this->getParametersMap();
		$foto = new Photo($_FILES['file'],"public/files/"); 
		$foto->createMiniFixed("200px");
		$tab_insert['name'] = $foto->getName();
		$tab_insert['path'] = $foto->getFullPath();
		$tab_insert['name_mini'] = $foto->getNameMini();
		$tab_insert['path_mini'] = $foto->getFullPathMini();
		$this->_gallery->insert($tab_insert);
		$this->setMessage("Nowe zdjęcie zostało dodane");
		header("Location: /gallery/admin");
	}
	public function deleteAction() {
		$id = $this->getParam("id", 0);		
		if($id != 0) {
			$tmp = $this->_gallery->fetchAll("id_photo = ".$id);
			$tmp = $tmp->toArray();
			$path = $tmp[0]['path'];	
			$path_mini = $tmp[0]['path_mini'];	
			unlink($path);
			if ($path_mini != '')			
				unlink($path_mini);
			$this->_gallery->delete("id_photo = ".$id);
			$this->setMessage("Zdjęcie zostało usunięte");
		}
		header("Location: /gallery/admin");
	}
	public function uploadfileAction(){
		$foto = new Photo($_FILES['file'],"public/files/"); 
		$foto->createMiniFixed("200px");
		echo "<img src='/".$foto->getFullPathMini()."' /><input type='hidden' name='file_up[]' value='".$foto->getFullPathMini()."' />";
		die();
	}
}