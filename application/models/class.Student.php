<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02/04/2015
 * Time: 21:56
 */

class Student extends Model {

    /**
     * @var string
     */
    private $_firstName;
    /**
     * @var string
     */
    private $_lastName;
    private $_drivenHours;
    private $_phoneNumber;

    public function __construct($id) {
        parent::__construct("students", $id);
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function getDrivenHour()
    {
        return $this->_drivenHours;
    }

    public function getPhoneNumber()
    {
        return $this->_phoneNumber;
    }

    protected function createQuery() {
        $query = new Table ( $this->table_name );
        $query->join("users s", "user_id = s.id_user");
        return $query;
    }

    public function fetchData($data)
    {
        $this->_firstName = $data["first_name"];
        $this->_lastName = $data["first_name"];
        $this->_drivenHours = $data["driven_hours"];
        $this->_phoneNumber = $data["phone_number"];
    }
}