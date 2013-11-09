<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author Gabus
 */
class AdminOskController extends AdminBasicController {
        private $_osk = null; 

	public function initAll() {
            $this->_osk = new Table("osk");

	}
	/**
	 * @access restricted
	 */
	public function indexAction() {
            $osk = $this->_osk->fetchAll("", "wojewodztwo, nazwa");
            if(!$osk->isNull())
                $this->_view->osk = $osk->getData();
            else
                $this->_view->osk = "";
	}
        /**
	 * @access restricted
	 */
        public function detailsAction(){
            $tab = $this->getParametersMap();  
            $osk = $this->_osk->find("id_osk = '" . $tab["id"] ."'");
            $osk = $osk->getData();
            $this->_view->osk = $osk[0];
        }
        /**
	 * @access restricted
	 */
        public function editAction(){
            $tab = $this->getParametersMap();  
            $id = $tab['id'];
            unset($tab['id']);
             if (isset($tab['submit'])) {             
                unset($tab['submit']);        
                $this->_osk->update($tab,"id_osk = ".$id);
                $this->setMessage("Dane ośrodka zostały zedytowane.");
                header("Location: /admin/osk");
             } else {
                $osk = $this->_osk->find("id_osk = '" . $id . "'");
                $osk = $osk->getData();
                $this->_view->osk = $osk[0];
                $this->_view->action_link = "/admin/osk/edit";
            }
    }
            /**
	 * @access restricted
	 */
        public function deleteAction(){
            $tab = $this->getParametersMap();  
            if(isset($tab['id'])){
                $id = $tab['id'];
                unset($tab['id']);
                $this->_osk->delete("id_osk = ".$id);
                $this->setMessage("Ośrodek został usunięty.");          
            }else{
                $this->setMessage("Nie wybrano ośrodka do usunięcia!");    
            }
            header("Location: /admin/osk");
            
    }
        /**
	 * @access restricted
	 */
	public function registerOskAction() {
            $this->_view->title = "Lpunkt.pl - Rejestracja OSK";
            $this->_view->action_link = "/admin/osk/registerOsk";
            $tab = $this->getParametersMap();        
            if (isset($tab['submit'])) {
                unset($tab['submit']);
                $new_osk = null;
                $osk = $this->_osk->find("nr = '" . $tab["osk_nr"] ."'");
                if ($osk->isNull()) {
                    $new_osk["nazwa"] = $tab["osk_name"];
                    $new_osk["nr"] = $tab["osk_nr"];
                    $new_osk["adres"] = $tab["osk_adr"];
                    $new_osk["miasto"] = $tab["osk_miasto"];
                    $new_osk["kod"] = $tab["osk_kod"];
                    $new_osk["wojewodztwo"] = $tab["osk_woj"];
                    $new_osk["nip"] = $tab["osk_nip"];
                    $new_osk["regon"] = $tab["osk_reg"];
                    $new_osk["active"] = $tab["osk_act"];
   
                    $index = $this->_osk->insert($new_osk);

                    $this->setMessage("Rejestracja powiodła się! Ośrodek został dodany.");
                    $link = "Location: /admin/osk";
                } else {
                    $this->setMessage("Podany nr ośrodka już jest w bazie! Rejestracja nie powiodła się!");
                    $link = "Location: /admin/osk/registerOsk";
                }
                header($link);
            }            	
		
	}
}
?>
