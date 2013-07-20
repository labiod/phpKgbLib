<?php
/**
 * 
 * Klasa połączenia z bazą danych
 * @author kb
 * @category Data Base Conection
 * @package models
 * @version 0.0.1
 *
 */
class DBConnection {
	/**
	 * 
	 * @var array DBConection
	 */
	private static $conns = array();
	private $_conn = null;
	/**
	 * 
	 * Statyczna metoda ustawiająca połączenie z bazą danych
	 * Jako parametry przyjmuje adres hosta, nazwą uzytkownika db, hasło,
	 * oraz opcjonalnie nazwę połączenia
	 * Nazwa połączenia jest przydatna wówczas gdy potrzebujemy więcej niż jednego połączenia z bazą danych
	 * wtedy każde połączenie powinno mieć swoją unikalną nazwę, aby nie było możliwości, że ustawione są te same połączenia,
	 * metoda najpierw sprawdza, czy połączenie o podanej nazwie nie zostało przypadkiem ustawione, jeśli tak zwraca obiekt tego połączenia
	 * jeśli nie najpierw tworzy obiekt DBConection i zapisuje go w tablicy, a następnie zwraca dopiero co utworzone połączenie
	 * @param string $host
	 * @param string $user
	 * @param string $password
	 * @param string $name
	 * @return DBConnection
	 */
	public static function connection($host, $user, $password, $name = 0) {
		if(!isset(self::$conns[$name])) {
			return self::$conns[$name] = new DBConnection(mysql_connect($host, $user, $password));
			
		}
		return self::$conns[$name];
			
	}
	/**
	 * 
	 * Metoda zwraca obiekt klasy DBConection zapisany w tablicy pod podaną nazwą
	 * Jeśli w tablicy nie ma danego obiektu metoda zwraca null
	 * @param string $name
	 * @return DBConnection
	 */
	public static function getConnection($name = 0) {
		if(isset(self::$conns[$name]))
			return self::$conns[$name];
		else
			return null;
	}
	
	private function __construct($conn) {
		$this->_conn = $conn;
	}
	/**
	 * 
	 * Metoda ustawia kodowanie dla zapytań sql
	 * @param string $charset
	 */
	public function setCharset($charset) {
		mysql_set_charset($charset, $this->_conn);
	}
	/**
	 * 
	 * Metoda ustawia bazę danych dla jakiej będą wykonywane zapytania
	 * @param string $dbname
	 */
	public function selectDB($dbname) {
		mysql_select_db($dbname, $this->_conn);
	}
	/**
	 * 
	 * Metoda wykonuje zapytanie zawarte w parametrze $sql
	 * Jako wynik zwraca obiekt klasy DBResult
	 * @param string $sql
	 * @return DBResult
	 * @example $conn = DBConection::getConnection();<br />
	 *  $result = $conn->query("SELECT * FROM users");<br />
	 *  $data = $result->getData();
	 */
	public function query($sql) {
		$r = mysql_query($sql, $this->_conn);
		$result = new DBResult($r);
		return $result;
	}
	/**
	 * 
	 * Metoda zwraca id ostatnio dodanego rekordu
	 * @return int
	 */
	public function insertId() {
		return mysql_insert_id($this->_conn);
	}
	
}