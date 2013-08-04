<?php
require_once ("library/models/class.SerializeModel.php");
class User extends SerializeModel {
	private $privilage = array();
	private $user_name = "";
	private $id_role;
	private $role_name;
	protected function __construct($id) {
		parent::__construct("users", $id);
	}
	
	/**
	 * 
	 * @param int $user_id
	 * @return User
	 */
	public static function getForId($user_id) {
		$session = HttpSession::getSession();
		if($session->isSetAttr($user_id)) {
			return unserialize($session->getAttribute($user_id));
		} else {
			return new User($user_id);
		}		
	}
	
	/**
	 * 
	 * @param string $module
	 * @param string $action
	 * @return boolean
	 */
	public function checkPrivilage($modules, $action) {
		if($this->privilage == null) {
			$this->loadPrivilage($this->id_role);
		}
		if(array_key_exists($module, $this->privilage)) {
			return in_array($action, $this->privilage[$module]);
		}
		return false;	
	}
	
	public function __sleep() {
		$array = parent::__sleep();
		array_push($array, 'privilage');
		array_push($array, 'user_name');
		array_push($array, 'role_name');
		array_push($array, 'id_role');
		return $array;
	}
	
	public function __toString() {
		$parent = parent::__toString();
		$parent .= ", user_name = ".$this->user_name;
		$parent .= ", privilage = ".sizeof($this->privilage);
		return $parent;
	}
	
	public function createQuery() {
		$query = parent::createQuery();
		$query->join("roles", "users.id_role = roles.id_role");
		$query->where("id_user = ".$this->id);
		return $query;
	}
	
	public function fetchData($data) {
		$this->user_name = $data["user_login"];
		$this->id_role = $data["id_role"];
		$this->role_name = $data["role_name"];
		$this->loadPrivilage($data["id_role"]);
	}
	
	public function loadPrivilage($id_role) {
		$query = new Table("roles_priv");
		$result = $query->fetchAll("id_role = ".$id_role);
		$priv = array();
		while($result->next()) {
			$current = $result->current();
			if(!array_key_exists($current["modules"])) {
				$priv[$current["modules"]] = array();
			}
			array_push($priv[$current["modules"]], $current["action"]);
		}
		$this->privilage = $priv;	
	}
}