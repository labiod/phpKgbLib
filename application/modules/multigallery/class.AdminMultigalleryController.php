<?php
class AdminMultigalleryController extends AdminBasicController {
	protected function initAll() {
		$this->_gallery = new Table ( "gallery" );
		$this->_photo = new Table ( "photo" );
	}
	public function indexAction() {
		$this->_view->gallery = $this->_gallery->fetchAll ( "", "order_by" );
		$this->_view->photo = $this->_photo;
		$this->_view->appendStyle ( "/public/css/admin_view.css" );
	}
	public function detailsAction() {
		$this->_view->appendStyle ( "/public/css/admin_details.css" );
		$index = $this->getParam ( "id", 0 );
		$tmp = $this->_gallery->find ( "id_gallery = " . $index );
		$tmp = $tmp->toArray ();
		$this->_view->gallery = $tmp [0];
		$tmp = $this->_photo->fetchAll ( "gallery_id = " . $index, "order_by" );
		$this->_view->photos = $tmp->toArray ();
	}
	public function addAction() {
		$this->_view->appendStyle ( "/public/css/admin_edit.css" );
	}
	public function editAction() {
		$this->_view->appendStyle ( "/public/css/admin_edit.css" );
		$index = $this->getParam ( "id", 0 );
		$tmp = $this->_gallery->find ( "id_gallery = " . $index );
		$tmp = $tmp->toArray ();
		$this->_view->gallery = $tmp [0];
		$tmp = $this->_photo->fetchAll ( "gallery_id = " . $index, "order_by, id_photo" );
		$this->_view->photos = $tmp->toArray ();
	}
	public function confirmAction() {
		$params = $this->getParametersMap ();
		$gall ['name'] = $params ['g_name'];
		$gall ['description'] = $params ['description'];
		if ($params ['visible'] == "on")
			$gall ['visible'] = "y";
		else
			$gall ['visible'] = "n";
			// podział na dodawanie/edycję galerii
		switch ($params ['submit']) {
			case "Dodaj" :
				$index = $this->_gallery->insert ( $gall );
				$this->setMessage ( "Nowa galeria została dodana" );
				break;
			case "Zatwierdź" :
				$index = $params ['id'];
				$this->_gallery->update ( $gall, "id_gallery = " . $index );
				// usuwanie zdjęć z galerii
				$photos = $this->_photo->fetchAll ( "gallery_id = " . $index );
				if (! $photos->isNull ()) {
					$photos = $photos->toArray ();
					foreach ( $photos as $tmp ) {
						$this->_photo->delete ( "gallery_id = " . $index );
					}
				}
				$this->setMessage ( "Galeria została zmodyfikowana" );
				break;
		}
		// koniec podziału na dodawanie/edycję galerii
		// dodawanie zdjęć
		if (isset ( $params ['file_up'] )) {
			$newPath = "data/galeria/g_" . $index . "/";
			if (! is_dir ( $newPath ))
				mkdir ( $newPath, 0777 );
			$i = 0;
			if (! isset ( $params ['main_photo'] ))
				$params ['main_photo'] = 0;
			foreach ( $params ['file_up'] as $file ) {
				if (is_file ( $file )) {
					Photo::movePict ( $file, $newPath, true );
				}
				$tmp = explode ( "/", $file );
				$tab_photo ['name'] = $tmp [(count ( $tmp )) - 1];
				$tab_photo ['path'] = $newPath . $tab_photo ['name'];
				$tab_photo ['name_mini'] = "m_" . $tab_photo ['name'];
				$tmp [(count ( $tmp )) - 1] = $tab_photo ['name_mini'];
				$tab_photo ['path_mini'] = $newPath . $tab_photo ['name_mini'];
				$tab_photo ['gallery_id'] = $index;
				$index_photo = $this->_photo->insert ( $tab_photo );
				// usatwienie zdjęcia głównego-jeśli nie zaznaczone-pierwsze zdjęcie wstawiane
				if ($params ['file_up'] [$i] == $params ['main_photo']) {
					$set ['photo_id'] = $index_photo;
					$where = "id_gallery = " . $index;
					$this->_gallery->update ( $set, $where );
				}
				$i ++;
			}
		}
		header ( "Location: /multigallery/admin" );
	}
	public function deleteAction() {
		$index = $this->getParam ( "id", 0 );
		if ($index != 0) {
			// usuwanie zdjęć z galerii
			$photos = $this->_photo->fetchAll ( "gallery_id = " . $index );
			if (! $photos->isNull ()) {
				$photos = $photos->toArray ();
				$path = "";
				foreach ( $photos as $tmp ) {
					$path = $tmp ['path'];
					$path_mini = $tmp ['path_mini'];
					unlink ( $path );
					if ($path_mini != '') {
						unlink ( $path_mini );
					}
					
					$this->_photo->delete ( "gallery_id = " . $index );
				}
				if ($path != "") {
					$path_dir = explode ( "/", $path );
					$path_dir [count ( $path_dir ) - 1] = "";
					$path_dir = implode ( "/", $path_dir );
					rmdir ( $path_dir );
				}
			}
			// usuwanie galerii
			$this->_gallery->delete ( "id_gallery = " . $index );
			$this->setMessage ( "Galeria została usunięta" );
		}
		header ( "Location: /multigallery/admin" );
	}
	public function uploadfileAction() {
		$this->_view->appendStyle ( "/public/css/admin_view.css" );
		$foto = new Photo ( $_FILES ['file'], "public/files/" );
		$foto->createMiniFixed ( "200px" );
		echo "<a href='/" . $foto->getFullPath () . "' class='galeria' rel='g'>";
		echo "<img src='/" . $foto->getFullPathMini () . "' /></a>";
		echo "<input type='hidden' name='file_up[]' value='" . $foto->getFullPath () . "' /><br/><input id='photo_' type='button' style='margin-top: 5px;' class='remover button' value='Usuń' />";
		echo " <input type='radio' name='main_photo' value='" . $foto->getFullPath () . "'/> zdjęcie główne";
		die ();
	}
}