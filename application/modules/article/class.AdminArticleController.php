<?php
class AdminArticleController extends AdminBasicController {
	public function initAll() {
		$menu = new Table("menu");		
		$m = $menu->fetchAll("", "kolejnosc");	
		$this->_view->menu = $m->toArray();
		$this->articles = new Table("article");
	}
	public function indexAction() {
		$this->_view->articles = $this->articles->fetchAll("", "date_published DESC");
        $this->_view->appendStyle("/public/css/admin_view.css");
	}
	public function addAction() {
		$this->_view->style = "/public/css/admin_edit.css";
		$this->_view->date = date("Y-m-d");
	}
	
	public function editAction() {
		$id = $this->getParam("id", 0);
		$this->_view->articles = $this->articles->fetchAll("id_article = ".$id);
		$this->_view->appendStyle("/public/css/admin_edit.css");
	}
	public function confirmAction() {
		$tab = $this->getParametersMap();
		if($tab['submit'] == "Edytuj") {
			$id = $tab['id_article'];
			unset($tab['id_article']);
			unset($tab['submit']);
			if(isset($tab['is_published']))
				$tab['is_published'] = 1;
			else 
				$tab['is_published'] = 0;
			$tab['author_id'] = $this->_session->getAttribute("user_id");
			$tab['title'] = eregi_replace('"', "&Prime;", $tab['title']);
			$tab['body'] = eregi_replace("'", "&#8242;", $tab['body']);
			$this->articles->update($tab, "id_article = ".$id);
			$this->setMessage("Zedytowano aktualność");
		} else {
			unset($tab['submit']);
			if(isset($tab['is_published']))
				$tab['is_published'] = 1;
			else 
				$tab['is_published'] = 0;
			$tab['author_id'] = $this->_session->getAttribute("user_id");
			$tab['title'] = eregi_replace('"', "&Prime;", $tab['title']);
			$tab['body'] = eregi_replace("'", "&#8242;", $tab['body']);
			$this->articles->insert($tab);
			$this->setMessage("Nowa aktualność została dodana");
		}
		header("Location: /article/admin");
	}
	
	public function deleteAction() {
		$id = $this->getParam("id", 0);
		if($id != 0) {
			$this->articles->delete("id_article = ".$id);
			$this->setMessage("Aktualność została usunięta");
		}
		header("Location: /article/admin");	
	}
	public function archiveAction() {
		$id = $this->getParam("id", 0);
		if($id != 0) {
			$art = $this->articles->fetchAll("id_article = ".$id);
			$art = $art->toArray();
			$archive = $art[0]['archive'];
			if($archive == 0 )
				$archive = 1;
			else 
				$archive = 0;
			$tab['archive'] = $archive;
			$this->articles->update($tab, "id_article = ".$id);
		}
		die();
	}
	function publishedAction() {
		$id = $this->getParam("id", 0);
		if($id != 0) {
			$art = $this->articles->fetchAll("id_article = ".$id);
			$art = $art->toArray();
			$pub = $art[0]['is_published'];
			if($pub == 0 )
				$pub = 1;
			else 
				$pub = 0;
			$tab['is_published'] = $pub;
			$this->articles->update($tab, "id_article = ".$id);
				
		}
		die();	
	}
}