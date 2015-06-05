<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30/03/2015
 * Time: 16:57
 */

class BaseLpunktController extends BasicIndexController {
    protected function initAll()
    {
        $user = User::getLoggedUser();
        if($user->getRoleId() == 1) {
            $this->_view->subMenu = array(
                new ListItem("Twój Profil", "/kursant/profil"),
                new ListItem("Twój Kurs", "/kursant/kursy"),
                new ListItem("Strefa Kursanta", "/grafik/kursant"),
                new ListItem("Płatności", "/kursant/platnosci"),
                new ListItem("Artykuły", "/articles"),
                new ListItem("Powiadomienia", "/content/messages"),
            );
        } else if($user->getRoleId() == 3) {
            $this->_view->subMenu = array(
                new ListItem("Twój Profil", "/instruktor/profil"),
                new ListItem("Strefa Instruktora", "/instruktor/grafik"),
                new ListItem("Płatności", "/kursant/platnosci"),
                new ListItem("Publikacje", "/articles"),
                new ListItem("Powiadomienia", "/content/messages"),
            );
        } else if($user->getRoleId() == 2) {
            $this->_view->subMenu = array(
                new ListItem("Profil OSK", "/osk/profil"),
                new ListItem("Kursy", "/osk/kursy"),
                new ListItem("Kursanci", "/osk/kursanci"),
                new ListItem("Pojazdy", "/osk/pojazdy"),
                new ListItem("Pracownicy", "/osk/pracownicy"),
                new ListItem("Artykuły", "/articles"),
                new ListItem("Powiadomienia", "/content/messages"),
                new ListItem("Finanse", "/osk/finanse"),
                new ListItem("Strefa OSK", "/grafik/osk"),
            );
        }


    }

} 