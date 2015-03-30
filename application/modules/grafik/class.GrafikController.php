<?php
/**
 * Description of GrafikController
 *
 * @author Gabus
 */
class GrafikController extends BaseLpunktController {
    private $_jazdy = null;
    //z tabeli users pogrupowac po rolach, uwaga! tylko dla okreslonego osk!
    private $_users = null; 
    private $_settings = null; 
    private $_auta = null; 
    public function initAll() {
        $this->_jazdy = new Table("jazdy");
        $this->_users = new Table("users");
        $this->_settings = new Table("settings");
        $this->_auta = new Table("auta");
    }
    public function indexAction(){
        //where osk!!!
        
    }
    public function kursantAction(){
        $tab = $this->getParametersMap();
        if(!isset($tab['y']) && !isset($tab['m'])) {
            $date["rok"] = date('Y');
            $date["mc"] = date('m');
        }else{
            $date["rok"] = $tab['y'];
            $date["mc"] = $tab['m'];
        } 
        
        $dateLinks['dayLink'] = "/grafik/podgladDnia/y/".$date["rok"]."/m/".$date["mc"]."/d/";
        $dateLinks['prevLink'] = $this->getLink(-1, $date["rok"], $date["mc"]);
        $dateLinks['nextLink'] = $this->getLink(+1, $date["rok"], $date["mc"]);
        $this->_view->dateLinks = $dateLinks;
        $this->_view->userView = HttpSession::getSession()->getAttribute("user_name", "");
        $date["mcstart"] = new DateTime($date["rok"].'-'.$date["mc"].'-01');
        $date["ldni"] = date_format($date["mcstart"], 't');
        $date["mcstart"] = date_format($date["mcstart"], 'N');
        $date["mc"] = DateFormat::getMonth($date["mc"]);
        $this->_view->dateInfo = $date;
    }

    public function oskAction() {
        $tab = $this->getParametersMap();
        if(!isset($tab['y']) && !isset($tab['m'])) {
            $date["rok"] = date('Y');
            $date["mc"] = date('m');
        }else{
            $date["rok"] = $tab['y'];
            $date["mc"] = $tab['m'];
        }

        $dateLinks['dayLink'] = "/grafik/podgladDnia/y/".$date["rok"]."/m/".$date["mc"]."/d/";
        $dateLinks['prevLink'] = $this->getLink(-1, $date["rok"], $date["mc"]);
        $dateLinks['nextLink'] = $this->getLink(+1, $date["rok"], $date["mc"]);
        $this->_view->dateLinks = $dateLinks;
        $this->_view->userView = HttpSession::getSession()->getAttribute("user_name", "");
        $date["mcstart"] = new DateTime($date["rok"].'-'.$date["mc"].'-01');
        $date["ldni"] = date_format($date["mcstart"], 't');
        $date["mcstart"] = date_format($date["mcstart"], 'N');
        $date["mc"] = DateFormat::getMonth($date["mc"]);
        $this->_view->dateInfo = $date;
    }

    public function podgladDniaAction(){    
        $tab = $this->getParametersMap();
        if(isset($tab["fullLoad"]) && $tab["fullLoad"] == true){
                $this->_view->isAjax = false;
        }else {
                $this->_view->isAjax = true;
        }
        $date = $tab["y"]."-".$tab["m"]."-".$tab["d"]; //2013-09-28 14:26:07
      //  $this->_settings->find('osk_id = OSK!!! AND name = working_hours' )  8-16
     //   $this->_view->workingHours[0]=
        $this->_view->tab = $tab;
      //  $this->_view->auta = $this->_auta->find('osk_id = '.User::getLoggedUser());

//WHERE DATE(`data`)
    }
        
    private function getLink($shift,$y,$mc){
        $newDate = null;
        if ($shift > 0){
            if($mc == 12){
                $newDate['mc'] = 1;
                $newDate['rok'] = ++$y;
            }else{
                $newDate['mc'] = ++$mc;
                $newDate['rok'] = $y;
            }
        }else{
            if($mc == 1){
                $newDate['mc'] = 12;
                $newDate['rok'] = --$y;
            }else{
                $newDate['mc'] = --$mc;
                $newDate['rok'] = $y;
            }
        }
        return  "/grafik/kursant/y/".$newDate["rok"]."/m/".$newDate["mc"];
    }
        
}

?>
