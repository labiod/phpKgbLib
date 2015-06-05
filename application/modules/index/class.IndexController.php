<?php
require_once 'library/controllers/class.BasicIndexController.php';

class IndexController extends BaseLpunktController
{
    private $_content = null;
    private $articles = null;

    protected function initAll()
    {
        parent::initAll();
        //	$this->_view->user_name = $this->_session->getAttribute("user_name");
    }

    function indexAction()
    {
        if ($this->isUserLogged()) {
            if (User::getLoggedUser()->getRoleName() == "admin") {
                $this->forward("./admin/index");
                die();
            }
            $this->forward("./index/index_logged");
            die();
        } else {
            $this->_view->header = "login_header.php";
        }
    }

    function index_loggedAction()
    {
    }
}