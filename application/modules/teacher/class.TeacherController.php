<?php
require_once 'application/controllers/class.BaseLpunktController.php';

class TeacherController extends BaseLpunktController
{
    private $_users = null;
    
    public function initAll()
    {
        parent::initAll();
        $this->_users = new Table("users");
    }

    public function indexAction()
    {
    
    }
    
}