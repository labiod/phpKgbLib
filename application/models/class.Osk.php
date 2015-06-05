<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02/04/2015
 * Time: 22:29
 */

class Osk extends Model {
    private $_oskName;
    private $_oskAddress;
    private $_city;

    public function __construct($id) {
        parent::__construct("osk", $id);
    }

    protected function createQuery() {
        $query = new Table ( $this->table_name );
        $query->join("users s", "user_id = s.id_user");
        return $query;
    }
    public function fetchData($data)
    {
        $this->_oskName = $data["osk_name"];
        $this->_oskAddress = $data["address"];
        $this->_city = $data["city"];
    }

    public function getFieldToUpdate()
    {
        // TODO: Implement getFieldToUpdate() method.
    }
}