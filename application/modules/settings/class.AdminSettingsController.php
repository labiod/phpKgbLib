<?php
class AdminSettingsController extends BaseAdminLpunktController {
	private $_metaTag;
	public function initAll() {
        parent::initAll();
		$this->_metaTag = new Table ( "metatags" );
	}
	public function indexAction() {
		$this->_view->_metaTag = $this->_metaTag->fetchAll ( "meta_key = 'Description' OR meta_key = 'Keywords'" );
		$this->_view->appendStyle ( "/public/css/admin_edit.css" );
	}
	public function confirmAction() {
		if ($this->getMethod () == "POST") {
			$tab = $this->getParametersMap ();
			switch ($tab ['action']) {
				case "meta" :
					$ins = array ();
					$ins1 ["meta_value"] = $tab ['description'];
					$ins2 ["meta_value"] = $tab ['keywords'];
					$result = $this->_metaTag->update ( $ins1, "meta_name = 'Description'" );
					$result = $this->_metaTag->update ( $ins2, "meta_name = 'Keywords'" );
					$this->setMessage ( "Konfiguracja została zmieniona" );
					header ( "Location: /settings/admin" );
					break;
				default :
					$this->forward ( "index/admin" );
			}
		}
	}

    public function regionsAction() {
        $table = new Table("districts");
        $this->_view->_region = $table->fetchAll("", "nazwa");
    }

    public function addRegionAction() {
        $tab = $this->getParametersMap();
        if(isset($tab["submit"])) {
            $category = new District();
            $category->setName($tab["name"]);
            $category->update();
            $this->forward("admin/settings/regions", "msg=Województwo zostało dodane");
        }
    }

    public function removeRegionAction() {
        $tab = $this->getParametersMap();
        if(isset($tab["id"])) {
            $table = new Table("districts");
            $table->delete("id_wojewodztwo = ".$tab["id"]);
            $this->forward("admin/settings/regions", "msg=Województwo zostało usuniete");
        }
    }
}