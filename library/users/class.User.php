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
class User extends SerializeModel {
	/**
	 *
	 * @var PrivilageCollection
	 */
	private $privilage;
	private $email = "";
	private $nr = "";
	private $role_id;
	private $role_name;
        private $oskId;
        private $user_id;
	private static $_instance = null;
	protected function __construct($id) {
		if ($id == 0) {
			$this->role_id = 0;
			$this->role_name = 'guest';
		}
		$this->privilage = new PrivilageCollection();
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
			$user_key = "users:" . $user_id;
			$sObj = $session->getAttribute ( $user_key, null );
			if ($sObj == null) {
				HttpSession::getSession ()->clearAttribute ( "user_id" );
				return null;
			}
			$sObj = unserialize ( $session->getAttribute ( $user_key ) );
			self::$_instance = $sObj;
			return self::$_instance;
		} else {
			return new User( 0 );
		}
	}
	public static function createUser($row) {
		$user = new User ( $row ["id_user"] );
		$user->fetchData ( $row );
		$user->setToSave ( true );
		self::$_instance = $user;
	}
	
	/**
	 *
	 * @param string $module        	
	 * @param string $action        	
	 * @return boolean
	 */
	public function checkPrivilage($module, $action) {
//           print_r($this->getRoleName());
//           print_r($this->privilage);die();
		if ($this->role_name == "admin")
			return true;
		if ($this->privilage->length() == 0) {
			$this->loadPrivilage ();
		}
		if ($this->privilage->contains ( $module )) {
			return $this->privilage->getPriv ( $module )->checkAction ( $action );
		}
		return false;
	}
	public function __sleep() {
		$array = parent::__sleep ();
                array_push ( $array, 'user_id' );
		array_push ( $array, 'privilage' );
		array_push ( $array, 'email' );
		array_push ( $array, 'role_name' );
		array_push ( $array, 'role_id' );
		return $array;
	}
	public function __toString() {
		$parent = parent::__toString ();
		$parent .= ", user_name = " . $this->user_name;
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
        $this->user_id = $data["id_user"];
		$this->email = $data ["email"];
		$this->nr = $data ["nr"];
		$this->role_id = $data ["role_id"];
		$this->role_name = $data ["role_name"];
		$this->loadPrivilage ();
	}
        public function loadPrivilage() {
		$query = new Table ( "roles_priv" );
		$query->join("roles", "roles.id_role = roles_priv.id_role");
		$result = $query->fetchAll ( "roles.id_role = " . $this->role_id." OR role_name = 'guest'" );
		while ( $result->next () ) {
			$current = $result->current ();
			$priv = new Privilage($current);
			$this->privilage->addPriv($priv, $current["module"]);
		}
	}
	public function logout() {
		$this->setToSave ( false );
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
	
	public function isLogged() {
		return $this->role_name != 'guest';	
	}
	
	public function isAdmin() {
		return $this->role_name == 'admin';
	}
        
        public function getOskId() {
            return $this->oskId;
        }
}