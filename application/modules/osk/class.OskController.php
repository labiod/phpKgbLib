<?php
/**
 * Description of GrafikController
 *
 * @author Gabus
 */
class OskController extends BasicIndexController {

    private $_settings = null; 
    private $_auta = null; 
    public function initAll() {

        $this->_settings = new Table("settings");
        $this->_auta = new Table("auta");
    }
    public function indexAction(){

    }
   
  
    
}

?>
