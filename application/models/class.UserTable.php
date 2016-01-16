<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2016-01-10
 * Time: 22:31
 */
class UserTable extends Model
{
    /**
     * @var string
     */
    private $_firstName;
    /**
     * @var string
     */
    private $_lastName;
    private $_userEmail;
    private $_userPassword;
    private $_active;
    private $_roleId;
    private $_idAddress;
    private $_nr;
    private $_nip;
    private $_regon;
    private $_teacherColor;
    private $_phoneNumber;
    private $_oskName;

    public function __construct($id)
    {
        parent::__construct("users", $id);
    }

    protected function init()
    {
        $this->joinTable("roles", "roles.id_role = users.role_id");
        $this->joinTable("addresses", "addresses.id_address = users.id_address");
    }


    public function fetchData($data)
    {
        $this->_userEmail = $data["email"];
        $this->_firstName = $data["first_name"];
        $this->_lastName = $data["last_name"];
        $this->_userPassword = $data["password"];
        $this->_active = $data["active"];
        $this->_roleId = $data["role_id"];
        $this->_idAddress = $data["id_address"];
        $this->_oskName = $data["osk_name"];
        $this->_nr = $data["nr"];
        $this->_nip = $data["nip"];
        $this->_regon = $data["regon"];
        $this->_teacherColor = $data["teacher_color"];
        $this->_phoneNumber = $data["phone_number"];
    }

    public function getFieldToUpdate()
    {
        $array = array();
        $array["email"] = $this->_userEmail;
        $array["first_name"] = $this->_firstName;
        $array["last_name"] = $this->_lastName;
        $array["password"] = $this->_userPassword;
        $array["active"] = $this->_active;
        $array["id_address"] = $this->_idAddress;
        $array["osk_name"] = $this->_oskName;
        $array["nr"] = $this->_nr;
        $array["nip"] = $this->_nip;
        $array["regon"] = $this->_regon;
        $array["teacherColor"] = $this->_teacherColor;
        $array["phone_number"] = $this->_phoneNumber;
        return $array;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function getRoleId()
    {
        return $this->_roleId;
    }

    public function getOskName()
    {
        return $this->_oskName;
    }

    protected function getIdColumn()
    {
        return "id_user";
    }

    /**
     * @return Address
     */
    public function getAddress() {
        return $this->_tables["addresses"];
    }

    /**
     * @return Role
     */
    public function getRole() {
        return $this->_tables["roles"];
    }


}