<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GrafikController
 *
 * @author Gabus
 */
class GrafikController extends BasicIndexController {
    private $_jazdy = null;
    //z tabeli users pogrupowac po rolach, uwaga! tylko dla okreslonego osk!
    private $_kursanci = null; 
    private $_instruktorzy = null; 
    public function initAll() {
        $this->_jazdy = new Table("jazdy");
        $this->_kursanci = new Table("users");
        $this->_instruktorzy = new Table("users");
    }
    public function index(){
        //where osk!!!
        
    }
    public function kursant(){
        
    }
        
        
}

?>
