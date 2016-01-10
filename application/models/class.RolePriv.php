<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 09/01/2016
 * Time: 23:37
 */

class RolePriv extends Model {
    private $module;
    private $action;
    private $role_type;

    public function __construct($id = -1) {
        parent::__construct("roles_priv", $id);
    }

    public function fetchData($data)
    {
        $this->module = $data["module"];
        $this->action = $data["action_name"];
        $this->role_type = $data["id_role"];
    }

    public function getFieldToUpdate()
    {
        $arrays = array();
        $arrays["module"] = $this->module;
        $arrays["action_name"] = $this->action;
        $arrays["id_role"] = $this->role_type;
        return $arrays;
    }

    public function setModule($module) {
        $this->module = $module;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setRoleType($role_type) {
        $this->role_type = $role_type;
    }

    protected function getIdColumn()
    {
        return "id_privilage";
    }


}

