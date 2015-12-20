<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 07/06/2015
 * Time: 11:32
 */

class VehicleType extends Model {
    private $type_name;

    public function __construct($id = -1) {
        parent::__construct("vehicle_types", $id);
    }

    public function fetchData($data)
    {
        $this->type_name = $data["type_name"];
    }

    public function getFieldToUpdate()
    {
        $toUpdate = array();
        $toUpdate["type_name"] = $this->type_name;
        return $toUpdate;
    }

    public function setTypeName($name)
    {
        $this->type_name = $name;
    }

    public function getTypeName() {
        return $this->type_name;
    }
}