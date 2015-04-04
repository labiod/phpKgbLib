<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02/04/2015
 * Time: 21:56
 */

class Teacher extends Model {

    private $_firstName;
    private $_lastName;
    private $_teacherColor;

    public function __construct($id) {
        parent::__construct("teachers", $id);
    }

    protected function createQuery() {
        $query = new Table ( $this->table_name );
        $query->join("users s", "user_id = s.id");
        return $query;
    }

    public function fetchData($data)
    {
        $this->_firstName = $data["first_name"];
        $this->_lastName = $data["first_name"];
        $this->_teacherColor = $data["teacher_color"];
    }
}