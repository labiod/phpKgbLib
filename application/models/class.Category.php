<?php

/**
 * Created by Labiod.
 * User: admin
 * Date: 05/06/2015
 * Time: 23:16
 */
class Category extends Model
{
    private $name;
    private $vehicle_type;

    public function __construct($id = -1)
    {
        parent::__construct("categories", $id);
    }

    public function fetchData($data)
    {
        $this->vehicle_type = $data["vehicle_type"];
        $this->name = $data["name"];
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setVehicleType($vehicleType) {
        $this->vehicle_type = $vehicleType;
    }
    /**
     * @return array
     */
    public function getFieldToUpdate()
    {
        $arrays = array();
        $arrays["vehicle_type"] = $this->vehicle_type;
        $arrays["name"] = $this->name;
        return $arrays;
    }
}