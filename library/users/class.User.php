<?php
require_once ("library/models/class.SerializeModel.php");
/**
 * Singleton
 * @author KB
 * 
 *
 */
class User extends SerializeModel {
	private $privilage = array();
	private $email = "";
	private $nr = "";
	private $role_id;
	private $role_name;
	private static $_instance = null;
	
	protected function __construct($id) {
		parent::__construct("users", $id);
	}
	
	/**
	 * 
	 * @return User
	 */
	public static function getLoggedUser() {
		if(self::$_instance != null)
			return self::$_instance;
		$session = HttpSession::getSession();
		$user_id = $session->getAttribute("user_id");
		if($user_id != 0) {
			$user_key = "users:".$user_id;
			$sObj = $session->getAttribute($user_key, null);
			if($sObj == null) {
				HttpSession::getSession()->clearAttribute("user_id");
				return null;
			}
			$sObj = unserialize($session->getAttribute($user_key));
			self::$_instance = $sObj;
			return self::$_instance;
		} else {
			return null;
		}	
	}
	
	public static function createUser($row) {
		$user = new User($row["id_user"]);
		$user->fetchData($row);
		$user->setToSave(true);
		self::$_instance = $user;
	}
	
	/**
	 * 
	 * @param string $module
	 * @param string $action
	 * @return boolean
	 */
	public function checkPrivilage($module, $action) {
                if($this->role_name == "admin"){
                        return true;
                }
		if($this->privilage == null) {
			$this->loadPrivilage($this->role_id);
		}
		if(array_key_exists($module, $this->privilage)) {
			return in_array($action, $this->privilage[$module]);
		}
		return false;	
	}
	
	public function __sleep() {
		$array = parent::__sleep();
		array_push($array, 'privilage');
		array_push($array, 'email');
		array_push($array, 'role_name');
		array_push($array, 'role_id');
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
		$query->join("roles", "users.role_id = roles.id_role");
		$query->where("id_user = ".$this->id);
		return $query;
	}
	
	public function fetchData($data) {
		$this->email = $data["email"];
		$this->nr = $data["nr"];
		$this->role_id = $data["role_id"];
		$this->role_name = $data["role_name"];
		$this->loadPrivilage($data["role_id"]);
	}
	
	public function loadPrivilage($id_role) {
		$query = new Table("roles_priv");
		$result = $query->fetchAll("id_role = ".$id_role);
		$priv = array();
		while($result->next()) {
			$current = $result->current();
			if(!array_key_exists($current["module"], $priv)) {
				$priv[$current["module"]] = array();
			}
			array_push($priv[$current["module"]], $current["action_name"]);
		}
		$this->privilage = $priv;	
	}
	
	public function logout() {
		$this->setToSave(false);
	}
        public function getEmail() {
            return $this->email;
        }
        public function getRoleName() {
            return $this->role_name;
        }
}