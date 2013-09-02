<?php
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
        
        $dateLinks['dayLink'] = "/grafik/kursant/y/".$date["rok"]."/m/".$date["mc"]."/d/";
        $dateLinks['prevLink'] = $this->getLink(-1, $date["rok"], $date["mc"]);
        $dateLinks['nextLink'] = $this->getLink(+1, $date["rok"], $date["mc"]);
        $this->_view->dateLinks = $dateLinks;
        $date["mcstart"] = new DateTime($date["rok"].'-'.$date["mc"].'-01');
        $date["ldni"] = date_format($date["mcstart"], 't');
        $date["mcstart"] = date_format($date["mcstart"], 'N');
        $date["mc"] = DateFormat::getMonth($date["mc"]);
        $this->_view->dateInfo = $date;
       
    }
    public function podgladDniaAction(){
        $date = $this->getParam("date");
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
