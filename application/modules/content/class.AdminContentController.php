<?php
class AdminContentController extends AdminBasicController {
	protected function initAll() {	
		$this->_content = new Table("content");		
	}
	public function indexAction() {
		$this->_view->appendStyle("/public/css/admin_content.css");
        $this->_view->appendStyle("/public/css/admin_edit.css");
		$id = $this->getParam("id", "0");
		$this->id = $id;
		$this->_view->id = $id;
		$this->_view->content = $this->_content->fetchAll("id_content = ".$id);	
		$this->_view->content = $this->_view->content->toArray();
		
	}
	function confirmAction() {
		$id = $this->getParam("id_content", "0");
		$tab = $this->getParametersMap();
		unset($tab['id_content']);
		unset($tab['submit']);
		//$tab['text'] = eregi_replace("\"", "\\\"", $tab['text']);
		$tab['text'] = eregi_replace("'", "&#8242;", $tab['text']);
		$this->_content->update($tab, "id_content =".$id);
		$this->setMessage("Zmiany zostały zapisane");
		header("Location: /content/admin/index/id/".$id);
	}
}