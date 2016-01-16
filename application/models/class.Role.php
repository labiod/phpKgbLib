<?php

class Role extends Model
{
    private $_roleName;
    private $_roleId;

    public function __construct($id)
    {
        parent::__construct("roles", $id);
    }

    public function fetchData($data)
    {
        $this->_roleId = $data["id_role"];
        $this->_roleName = $data["role_name"];
    }

    public function getFieldToUpdate()
    {
        $array = array();
        $array["role_name"] = $this->_roleName;
        $array["id_role"] = $this->_roleId;
        return $array;
    }

    public function getRoleName() {
        return $this->_roleName;
    }

    protected function getIdColumn()
    {
        return "id_role";
    }


}