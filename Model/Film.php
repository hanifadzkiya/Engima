<?php
namespace Engima\Model;
use Engima\Database;
Class Film extends Database {
	private $dbname = "engima";
	private $tablename = "film";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				uuid varchar(255) PRIMARY KEY,
				judul VARCHAR(255) NOT NULL,
				poster VARCHAR(255) NOT NULL,
				rating FLOAT NOT NULL,
				tanggal_rilis DATETIME NOT NULL
				)";
			if ($this->runQuery($sql) === TRUE) {
			    echo "Table created successfully\n";
			} else {
			    echo "Error creating table : " . $this->getConn()->error;
			}
		} else {
			echo "Table is already exist";
		}
	}

	public function add(){
		
	}
}