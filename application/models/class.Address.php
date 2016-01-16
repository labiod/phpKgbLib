<?php

/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2016-01-11
 * Time: 21:34
 */
class Address extends Model
{
    private $_address;
    private $_city;
    private $_zipCode;
    private $_district;

    public function __construct($id)
    {
        parent::__construct("addresses", $id);
    }

    public function fetchData($data)
    {
        $this->_address = $data["address"];
        $this->_city = $data["city"];
        $this->_zipCode = $data["zip_code"];
        $this->_district = $data["district"];
    }

    public function getFieldToUpdate()
    {
        $array = array();
        $array["address"] = $this->_address;
        $array["city"] =
            $this->_city;
        $array["zip_code"] = $this->_zipCode;
        $array["district"] = $this->_district;
        return $array;
    }

    public function getCityName()
    {
        return $this->_city;
    }

    public function getDistrictId()
    {
       return $this->_district;
    }

    protected function getIdColumn()
    {
        return "id_address";
    }


}