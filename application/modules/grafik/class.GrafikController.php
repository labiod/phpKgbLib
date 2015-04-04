<?php

/**
 * Description of GrafikController
 *
 * @author Gabus
 */
class GrafikController extends BaseLpunktController
{
    private $_jazdy = null;
    //z tabeli users pogrupowac po rolach, uwaga! tylko dla okreslonego osk!
    private $_users = null;
    private $_settings = null;
    private $_auta = null;

    public function initAll()
    {
        parent::initAll();
        $this->_jazdy = new Table("jazdy");
        $this->_users = new Table("users");
        $this->_settings = new Table("settings");
        $this->_auta = new Table("auta");
    }

    public function indexAction()
    {
        //where osk!!!

    }

    public function kursantAction()
    {
        $tab = $this->getParametersMap();
        if (!isset($tab['y']) && !isset($tab['m'])) {
            $date["rok"] = date('Y');
            $date["mc"] = date('m');
        } else {
            $date["rok"] = $tab['y'];
            $date["mc"] = $tab['m'];
        }

        $dateLinks['dayLink'] = "/grafik/podgladDnia/y/" . $date["rok"] . "/m/" . $date["mc"] . "/d/";
        $dateLinks['prevLink'] = $this->getLink("kursant", -1, $date["rok"], $date["mc"]);
        $dateLinks['nextLink'] = $this->getLink("kursant", +1, $date["rok"], $date["mc"]);
        $this->_view->dateLinks = $dateLinks;
        $this->_view->userView = HttpSession::getSession()->getAttribute("user_name", "");
        $date["mcstart"] = new DateTime($date["rok"] . '-' . $date["mc"] . '-01');
        $date["ldni"] = date_format($date["mcstart"], 't');
        $date["mcstart"] = date_format($date["mcstart"], 'N');
        $date["mc"] = DateFormat::getMonth($date["mc"]);
        $this->_view->dateInfo = $date;
    }

    public function oskAction()
    {
        $tab = $this->getParametersMap();
        if (!isset($tab['y']) && !isset($tab['m'])) {
            $date["year"] = date('Y');
            $date["mc"] = date('m');
        } else {
            $date["year"] = $tab['y'];
            $date["mc"] = $tab['m'];
        }
        $dateLinks['dayLink'] = "/grafik/oskDay/y/" . $date["year"] . "/m/" . $date["mc"] . "/d/";
        $dateLinks['prevMonth'] = $this->getLink("osk", -1, $date["year"], $date["mc"]);
        $dateLinks['nextMonth'] = $this->getLink("osk", 1, $date["year"], $date["mc"]);
        $this->_view->dateLinks = $dateLinks;
        $this->_view->userView = HttpSession::getSession()->getAttribute("user_name", "");
        $oskMapHours = array();
        $driveBooks = DriveBook::getDayCalendarForOsk(new DateTime(), User::getLoggedUser()->getOskId());
        foreach ($driveBooks as $driveBook) {
            $d = $driveBook->getDriveDate();
            $hour = date("H", $d->getTimestamp());
            $oskMapHours[$hour] = $driveBook;
        }
        $date["mcstart"] = new DateTime($date["year"] . '-' . $date["mc"] . '-01');
        $date["ldni"] = date_format($date["mcstart"], 't');
        $date["mcstart"] = date_format($date["mcstart"], 'N');
        $date["mc"] = DateFormat::getMonth($date["mc"]);
        $this->_view->dateInfo = $date;

        $items = array(
            new ListItem("Grafik Osk", "/osk/grafik"),
            new ListItem("Godziny otwarcia", "/osk/godziny"),
            new ListItem("Historia jazd", "/osk/grafik_historia"),
            new ListItem("Pytania Testowe", "/osk/pytania"),
        );
        $component = new SimpleMenu($items, "Strefa Osk", "user_strefa");
        $this->_view->addComponent($component, "strefa");
    }


    public function oskDayAction()
    {
        $tab = $this->getParametersMap();
        if (!isset($tab['y']) && !isset($tab['m']) && !isset($tab["d"])) {
            $date["year"] = date('Y');
            $date["mc"] = date('m');
            $date["day"] = date('d');
        } else {
            $date["year"] = $tab['y'];
            $date["mc"] = $tab['m'];
            $date["day"] = $tab['d'];
        }

        $dateLinks['prevDay'] = $this->getLink("osk", -1, $date["year"], $date["mc"], $date["day"]);
        $dateLinks['prevMonth'] = $this->getLink("osk", -1, $date["year"], $date["mc"]);
        $dateLinks['nextDay'] = $this->getLink("osk", 1, $date["year"], $date["mc"], $date["day"]);
        $dateLinks['nextMonth'] = $this->getLink("osk", 1, $date["year"], $date["mc"]);
        $this->_view->dateLinks = $dateLinks;
        $this->_view->userView = HttpSession::getSession()->getAttribute("user_name", "");
        $this->_view->oskHours = array(
            6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19
        );
        $oskMapHours = array();
        $driveBooks = DriveBook::getDayCalendarForOsk(new DateTime(), User::getLoggedUser()->getOskId());
        foreach ($driveBooks as $driveBook) {
            $d = $driveBook->getDriveDate();
            $hour = date("H", $d->getTimestamp());
            $oskMapHours[$hour] = $driveBook;
        }
        $this->_view->oskMapHours = $oskMapHours;
        $this->_view->oskMapHours = $oskMapHours;
        $date["mcstart"] = new DateTime($date["year"] . '-' . $date["mc"] . '-01');
        $date["ldni"] = date_format($date["mcstart"], 't');
        $date["mcstart"] = date_format($date["mcstart"], 'N');
        $date["mc"] = DateFormat::getMonth($date["mc"]);
        $this->_view->dateInfo = $date;

        $items = array(
            new ListItem("Grafik Osk", "/osk/grafik"),
            new ListItem("Godziny otwarcia", "/osk/godziny"),
            new ListItem("Historia jazd", "/osk/grafik_historia"),
            new ListItem("Pytania Testowe", "/osk/pytania"),
        );
        $component = new SimpleMenu($items, "Strefa Osk", "user_strefa");
        $this->_view->addComponent($component, "strefa");
    }

    public function podgladDniaAction()
    {
        $tab = $this->getParametersMap();
        if (isset($tab["fullLoad"]) && $tab["fullLoad"] == true) {
            $this->_view->isAjax = false;
        } else {
            $this->_view->isAjax = true;
        }
        $date = $tab["y"] . "-" . $tab["m"] . "-" . $tab["d"]; //2013-09-28 14:26:07
        //  $this->_settings->find('osk_id = OSK!!! AND name = working_hours' )  8-16
        //   $this->_view->workingHours[0]=
        $this->_view->tab = $tab;
        //  $this->_view->auta = $this->_auta->find('osk_id = '.User::getLoggedUser());

//WHERE DATE(`data`)
    }

    private function getLink($action, $shift, $y, $mc, $day = null)
    {
        if ($day == null) {
            $newDate = null;
            if ($shift > 0) {
                if ($mc == 12) {
                    $newDate['mc'] = 1;
                    $newDate["year"] = ++$y;
                } else {
                    $newDate['mc'] = ++$mc;
                    $newDate["year"] = $y;
                }
            } else {
                if ($mc == 1) {
                    $newDate['mc'] = 12;
                    $newDate["year"] = --$y;
                } else {
                    $newDate['mc'] = --$mc;
                    $newDate["year"] = $y;
                }
            }
            return "/grafik/" . $action . "/y/" . $newDate["year"] . "/m/" . $newDate["mc"];
        } else {
            $newDate = null;
            $mcstart = new DateTime($y . "-" . $mc . '-01');
            $ldni = date_format($mcstart, 't');
            if ($shift > 0) {
                if ($day == $ldni) {
                    $day = 1;
                    $mc++;
                    if ($mc > 12) {
                        $mc = 1;
                        ++$y;
                    }
                } else {
                    ++$day;
                }
            } else {
                if ($day == 1) {
                    $mc--;
                    if ($mc < 0) {
                        $mc = 12;
                    }
                    $mcstart = new DateTime($y . "-" . $mc . "-01");
                    $prevDni = date_format($mcstart, 't');
                    $day = $prevDni;
                } else {
                    --$day;
                }
            }
            return "/grafik/" . $action . "/y/" . $y . "/m/" . $mc . "/d/" . $day;
        }
    }

}

?>
