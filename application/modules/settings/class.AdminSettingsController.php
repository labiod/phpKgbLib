<?php
class AdminSettingsController extends AdminBasicController {
	private $_metaTag;
	protected function initAll() {
		$this->_metaTag = new Table("metatags");
	}
	public function indexAction() {	
		$this->_view->_metaTag = $this->_metaTag->fetchAll("meta_key = 'Description' OR meta_key = 'Keywords'");
		$this->_view->appendStyle("/public/css/admin_edit.css");
	}
	public function confirmAction() {
		if($this->getMethod() == "POST") {
			$tab = $this->getParametersMap();
			switch($tab['action']) {
				case "meta":
					$ins = array();
					$ins1["meta_value"] = $tab['description'];
					$ins2["meta_value"] = $tab['keywords'];
					$result = $this->_metaTag->update($ins1, "meta_name = 'Description'");
					$result = $this->_metaTag->update($ins2, "meta_name = 'Keywords'");
					$this->setMessage("Konfiguracja została zmieniona");
					header("Location: /settings/admin");
				break;
				default:
					$this->forward("index/admin");
			}
		}	
	}
}