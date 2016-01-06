<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 04/01/2016
 * Time: 22:18
 */

class District extends Model {
    private $name;

    public function __construct($id = -1) {
        parent::__construct("districts", $id);
    }

    public function fetchData($data)
    {
        $this->name = $data["nazwa"];
    }

    public function getFieldToUpdate()
    {
        $toUpdate = array();
        $toUpdate["nazwa"] = $this->name;
        return $toUpdate;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
} 