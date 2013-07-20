<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationFilter
 *
 * @author KB
 */
class ApplicationFilter {
    //put your code here
    public static function clearRequest() {
        foreach($_FILES as $key => $file) {
            if(preg_match("/\.php/", $file["name"])) {
                unset($_FILES[$key]);
            }
        }
    }
}

?>
