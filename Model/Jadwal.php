<?php
namespace Engima\Model;
use Engima\Database;
Class Jadwal extends Database {
	private $dbname = "engima";
	private $tablename = "jadwal";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				id varchar(255) PRIMARY KEY,
				film_id VARCHAR(255) NOT NULL,
				jam_tayang DATETIME NOT NULL,
				FOREIGN KEY (film_id) REFERENCES film(id)
				)";
			if ($this->runQuery($sql) === TRUE) {
			    echo "Table created successfully\n";
			} else {
			    echo "Error creating table : " . $this->getConn()->error;
			}
		} else {
			echo "Table is already exist\n";
		}
	}

	public function add(){
		
	}
}