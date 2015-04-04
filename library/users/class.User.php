<?php
require_once ("library/models/class.SerializeModel.php");
require_once ("library/containers/class.PrivilageCollection.php");
/**
 * Singleton
 *
 * @author KB
 *        
 *        
 */
class User extends Model {
	/**
	 *
	 * @var PrivilageCollection
	 */
	private $privilage;
	private $email = "";
	private $nr = "";
	private $role_id;
	private $role_name;
	private $osk_id;
	private $osk_name;
	private $user_id;
    private $_userName;
	private static $_instance = null;
	protected function __construct($id) {
		if($id == 0) {
			$this->role_id = -1;
			$this->role_name = "guest";
		}
		$this->privilage = new PrivilageCollection ();
		parent::__construct ( "users", $id );
	}
	
	/**
	 *
	 * @return User
	 */
	public static function getLoggedUser() {
		if (self::$_instance != null)
			return self::$_instance;
		$session = HttpSession::getSession ();
		$user_id = $session->getAttribute ( "user_id" );
		if ($user_id != 0) {
			self::$_instance = new User ( $user_id );
			$osk_id = $session->getAttribute("osk_id", -1);
			$osk_name = $session->getAttribute("osk_name", "");
			if($osk_id != -1) {
				self::$_instance->setOsk($osk_id, $osk_name);
			}
			return self::$_instance;
		} else {
			return new User ( 0 );
		}
	}
	public static function createUser($row) {
		$user = new User ( $row ["id_user"] );
		$user->fetchData ( $row );
		self::$_instance = $user;
	}
	
	/**
	 *
	 * @param string $module        	
	 * @param string $action        	
	 * @return boolean
	 */
	public function checkPrivilage($module, $action) {
		if ($this->role_name == "admin")
			return true;
		$this->loadPrivilage ();
		if ($this->privilage->contains ( $module )) {
			return $this->privilage->getPriv ( $module )->checkAction ( $action );
		}
		return false;
	}
	public function __toString() {
		$parent = parent::__toString ();
		$parent .= ", user_name = " . $this->_userName;
		$parent .= ", privilage = " . sizeof ( $this->privilage );
		return $parent;
	}
	public function createQuery() {
		$query = parent::createQuery ();
		$query->join ( "roles", "users.role_id = roles.id_role" );
		$query->where ( "id_user = " . $this->id );
		return $query;
	}
	public function fetchData($data) {
		$this->user_id = $data ["id_user"];
		$this->email = $data ["email"];
		$this->role_id = $data ["role_id"];
		$this->role_name = $data ["role_name"];
		$this->_userName = $data ["first_name"] . " " . $data["last_name"];
		$this->loadPrivilage ();
	}
	public function loadPrivilage() {
		if($this->user_id == 0)
			return;
		$query = new Table ( "roles_priv" );
		$query->join ( "roles", "roles.id_role = roles_priv.id_role" );
		$result = $query->fetchAll ( "roles.id_role = " . $this->role_id );
		while ( $result->next () ) {
			$current = $result->current ();
			$priv = new Privilage ( $current );
			if (! isset ( $this->privilage ))
				$this->privilage = new PrivilageCollection ();
			$this->privilage->addPriv ( $priv, $current ["module"] );
		}
	}
	public function logout() {
	}
	public function getUserId() {
		return $this->user_id;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getRoleName() {
		return $this->role_name;
	}
    public function getRoleId() {
        return $this->role_id;
    }
	public function isLogged() {
		return $this->role_name != 'guest';
	}
	public function isAdmin() {
		return $this->role_name == 'admin';
	}
	public function getOskId() {
		return $this->osk_id;
	}
	public function getOskName() {
		return $this->osk_name;
	}
	public function setOsk($id, $name) {
		$this->osk_id = $id;
		$this->osk_name = $name;
	}

    public function getUserName() {
        return $this->_userName;
    }
}