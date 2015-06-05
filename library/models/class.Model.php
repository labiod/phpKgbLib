<?php
abstract class Model {
	protected $table_name = "";
	protected $id = 0;
    /**
     * @var $query Table
     */
    protected $query;

	protected function __construct($table_name, $id) {
		$this->table_name = $table_name;
		$this->id = $id;
		$this->fetch ();
	}
	public function getId() {
		return $this->id;
	}
	public function __toString() {
		return "table_name = " . $this->table_name . ", id = " . $this->id;
	}
	
	/**
	 *
	 * @return Table
	 */
	protected function createQuery() {
		$query = new Table ( $this->table_name );
		return $query;
	}
	public function fetch() {
        if($this->query == null) {
            $this->query = $this->createQuery ();
        }
        if($this->id != -1) {
            $result = $this->query->fetch ();
            if ($result->numRows () == 1 && $result->next ()) {
                $this->fetchData ( $result->current () );
            }
        }
	}
	public abstract function fetchData($data);

    public abstract function getFieldToUpdate();

    public function update() {
        if($this->id != -1) {
            $this->query->update($this->getFieldToUpdate(), "id = ".$this->id);
        } else {
            $this->query->insert($this->getFieldToUpdate());
        }

    }
}