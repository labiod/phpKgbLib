<?php
require_once 'library/models/class.DBResult.php';
/**
 * 
 * Klasa bazowa dla klas ktore są odpowiednikami tabel z bazy danych
 * @author Krzysiek
 * @package library
 * @subpackage models
 * @version 0.0.3
 *
 */
class Table {
	protected $conn = null;
	protected $table;
	protected $_id;
	protected $join = array();
	private $conditions = "";
	protected $group = "";
	protected $having = "";
	protected $order = "";
	protected $params = array();
	public function __construct($table_name, $conn = 0) {
		$this->table = $table_name;
		$this->conn = DBConnection::getConnection($conn);
	}
	/**
	 * 
	 * Metoda ktora jest odpowiednikiem INNER JOIN w sql.
	 * Pierwszy argument $table określa jaka tabela zostanie dołączona
	 * $on określa po jakich kolumnach zostaną połączone tabele
	 * @param string $on
	 */
	public function join($table, $on) {
		$this->join[$table] = $on;
	}
	/**
	 * 
	 * Metoda dodaje do zapytania Group By
	 * $cols określa po jakich kolumnach zostanie wykonane grupowanie
	 * $having argument opcjonalny, dodaja do zapytania warunki dla grupowania
	 * @param string $cols
	 * @param string $having
	 */
	public function groupBy($cols, $having = "") {
		$this->group = $text;
		$this->having = $having;
	}
	
	/**
	 * Ustawia warunek do zapytania jeśli był jakiś wcześniej ustawiny nadpisuje go
	 * @param string $where
	 */
	public function where($where) {
		$this->conditions = $where;
		return $this;
	}
	
	/**
	 * Dodaje nowy warunke
	 * @param string $where
	 */
	public function andWhere($where) {
		$this->conditions = "(". $this->conditions .") AND ". $where;
		return $this;
	}
	
	/**
	 * Dodaje nowy warunke
	 * @param string $where
	 */
	public function orWhere($where) {
		$this->conditions = "(". $this->conditions .") OR ". $where;
		return $this;
	}
	
	public function setOrderBy($orderBy) {
		$this->order = $orderBy;
	}
	
	/**
	 * 
	 * Metoda jest odpowiednikiem SELECT z sql
	 * Pobiera rekordy z danej tabeli
	 * Parametr $cols określa z jakich kolumn będą pobierane dane
	 * Opcjonalny parametr $where dodaje warunki pobierania rekordów
	 * $orderBy sortuje dane
	 * @param string $cols
	 * @param string $where
	 * @param string $orderBy
	 */
	public function select($cols, $where = "", $orderBy = "") {
		
		$sql = "SELECT ".$cols." FROM ".$this->table;
		if(count($this->join) != 0 ) {
			foreach($this->join as $key=>$value) {
				$sql .= " JOIN ".$key." ON ".$value;
			}
		}
		if($where != "")
			$sql .= " WHERE ".$where;
		if($this->group != "") {
			$sql .= " GROUP BY ".$this->group;
		}
		if($this->having != "")
			$sql .= " HAVING ".$this->having;
		if($orderBy != "")
			$sql .= " ORDER BY ".$orderBy;
		$result = mysql_query($sql, $this->conn->getConn()) or die(mysql_error()." ".$sql);
		if(!$result || mysql_num_rows($result) == 0)
			return new DB_Result();
		return new DB_Result($result);
	}
	
	/**
	 * 
	 * Metoda wyciąga dane ze wszystkich kolumn z danej tabeli
	 * $where jest warunkiem jakie rekordy zostaną wyciągnięte
	 * $orderBy sortuje dane
	 * @param string $where
	 * @param string $orderBy
	 */
	public function fetchAll($where = "", $orderBy = "") {
		$sql = "SELECT * FROM ".$this->table;
		if(count($this->join) != 0 ) {
			foreach($this->join as $key=>$value) {
				$sql .= " JOIN ".$key." ON ".$value;
			}
		}
		if($where != "")
			$sql .= " WHERE ".$where;
		if($this->group != "") {
			$sql .= " GROUP BY ".$this->group;
		}
		if($this->having != "")
			$sql .= " HAVING ".$this->having;
		if($orderBy != "")
			$sql .= " ORDER BY ".$orderBy;
                elseif ($this->order != ""){
                        $sql .= " ORDER By ".$this->order;
                } 			
		return $this->conn->query($sql);
                
	}
	
	/**
	 * Metoda wyciąga jeden rekord z bazy, jesli jest ich więcej bierze pierwszy
	 * @return DBResult
	 */
	public function fetch() {
		$sql = "SELECT * FROM ".$this->table;
		if(count($this->join) != 0 ) {
			foreach($this->join as $key=>$value) {
				$sql .= " JOIN ".$key." ON ".$value;
			}
		}
		if($this->conditions != "") {
			foreach($this->params as $key=>$param) {
				$param = mysql_real_escape_string($param);
				$this->conditions = str_replace("\$".$key, $param, $this->conditions);
			}
			$sql .= " WHERE ".$this->conditions;
		}
		if($this->group != "") {
			$sql .= " GROUP BY ".$this->group;
		}
		if($this->having != "")
			$sql .= " HAVING ".$this->having;
		if($this->order != "")
			$sql .= " ORDER BY ".$orderBy;
		return $this->conn->query($sql);
	}

	/**
	 * 
	 * @param string $where
	 * @return DBResult
	 */
	public function find($where) {
		$sql = "SELECT * FROM ".$this->table." WHERE ".$where;
		return $this->conn->query($sql);
	}
	
	/**
	 * 
	 * Metoda edutyje dane w danej tabeli
	 * $where określa jakie rekordy zostaną zedytowane
	 * @param array $set
	 * @param unknown_type $where
	 * @throws Exception
	 */
	public function update(Array $set, $where) {
		$sql = "UPDATE ".$this->table." SET ";
		$i1 = true;
		foreach ($set as $key => $value) {
			if ($i1){
				$sql .= $key ." = '".$value."'";
				$i1 = false;
			}
			else
				$sql .= ", ".$key ." = '".$value."'";
		}
		if($where != "")
			$sql .= " WHERE ".$where;
		$result = $this->conn->query($sql) or die(mysql_error()." ".$sql);
		if(!$result)
			throw new Exception();			
		return $result;
	}
	/**
	 * 
	 * Metoda wstawiająca do bazy danych rekord
	 * Zmienna $set jest tablicą asocjacyjną, w której klucze odpowidają nazwom kolumn
	 * a wartości danym, które zostaną do nich wstawione
	 * Jako wynik zwraca id rekordu który właśnie został dodany
	 * @param array $set
	 * @return int
	 */
	public function insert(Array $set) {
		$sql = "INSERT INTO ".$this->table." (";
		$i1 = true;
		foreach ($set as $key => $value) {
			if ($i1){
				$sql .= $key;
				$i1 = false;
			}
			else
				$sql .= ", ".$key;
		}
		$sql .= ") VALUES ( '";
		$i1 = true;
		foreach ($set as $value) {
			if ($i1){
				$sql .= $value;
				$i1 = false;
			}
			else
				$sql .= "', '".$value;
		}
		$sql .= "')";
		$result = $this->conn->query($sql);
		if(!$result)
			return 0;
		$index = $this->conn->insertId();
		return $index;		
	}
	/**
	 * 
	 * Metoda ta usuwa z bazy danych rekordy które spełniają warunek podany w parametrze $where
	 * Jeśli usuwanie się nie powiedzie, metoda wyrzuca wyjątek
	 * w przeciwnym wypadku zwraca obiekt Resource
	 * @param string $where
	 * @throws Exception
	 */
	public function delete($where) {
		$sql = "DELETE FROM ".$this->table." WHERE ".$where;
		$result = mysql_query($sql, $this->conn->getConn()) or die(mysql_error().$where);
		if(!$result)
			throw new Exception();
		return $result;		
	}
	/**
	 * 
	 * Metoda słuzy do ustawiania aktywnego rekordu i ustawienia wszystkich innych na nieaktywne
	 * nazwę kolumny, która określa aktywność rekordu podaje się w zmiennej $col
	 * @param string $col
	 * @param int $id
	 * @throws Exception
	 */
	public function recordChecked($col, $id) {
		$sql = "UPDATE ".$this->table." SET ".$col." = 0";
		$result = mysql_query($sql, $this->conn->getConn()) or die(mysql_error());
		if(!$result)
			throw new Exception();
		$key = key($id);
		$sql = "UPDATE ".$this->table." SET ".$col." = 1 WHERE ".$key." = ".$id[$key];
		$result = $this->conn->query($sql);
		if(!$result)
			throw new Exception();
		return $result;		
	}
	
	/**
	 * 
	 * @param string $param
	 * @param string $key
	 * @return Table
	 */
	public function addParameter($param, $key= null) {
		if($key != null)
			$this->params[$key] = $param;
		else 
			$this->params[] = $param;
		return $this;	
	}
	
	/**
	 * 
	 * Metoda zwraca nazwy kolumn dla tabeli
	 * @throws Exception
	 * @example $colls = new Table("tabela");
	 *  $result = $colls->getCollsName(); 
	 *  echo $result->getData();
	 */
	public function getCollsName() {
		
		$sql = "SHOW COLUMNS FROM ".$this->table."";
		$result = mysql_query($sql, $this->conn->getConn()) or die(mysql_error());
		if(!$result)
			throw new Exception();
		return new DBResult($result);
	}
}