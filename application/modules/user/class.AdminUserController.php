<?php
class AdminUserController extends AdminBasicController {
	public function initAll() {
		$this->admin = new Table("administratorzy");
	}
	public function indexAction() {
		$this->_view->admin = $this->admin->fetchAll();
		$this->_view->appendStyle("/public/css/admin_view.css");
	}
	
	public function addAction() {
		$this->_view->appendStyle("/public/css/admin_edit.css");
	}
	
	public function editAction() {
		$id = $this->getParam("id", 0);
		$this->_view->admin = $this->admin->fetchAll("id_admin = ".$id);
		$this->_view->appendStyle("/public/css/admin_edit.css");
	}
	public function confirmAction() {
		$tab = $this->getParametersMap();
		if($tab['submit'] == "Edytuj") {
			$id = $tab['id_admin'];
			unset($tab['id_admin']);
			unset($tab['submit']);
			$this->admin->update($tab, "id_admin = ".$id);
			$this->setMessage("Zedytowano Użytkownika");
		} else {
			unset($tab['submit']);	
			$index = $this->admin->insert($tab);		
			$this->setMessage("Dodano nowego użytkownika");
		}
		$this->forward("user/admin");
	}
	
	public function deleteAction() {
		$id = $this->getParam("id", 0);
		if($id != 0) {
			$this->admin->delete("id_admin = ".$id);
			$this->setMessage("Użytkownik został usunięty");
		}
		header("Location: /user/admin");	
	}
}