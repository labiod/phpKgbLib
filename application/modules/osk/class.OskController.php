<?php
/**
 * Description of OskController
 *
 * @author Gabus
 */
class OskController extends BaseLpunktController {

    private $_settings = null; 
    private $_auta = null; 
    public function initAll() {
        parent::initAll();
        $this->_settings = new Table("settings");
        $this->_auta = new Table("auta");
    }
    public function indexAction(){
        
    }
    public function detailsAction(){
        
    }
    public function autaAction(){
        $this->_view->caption = "Samochody";
    }
  
    
}

?>
