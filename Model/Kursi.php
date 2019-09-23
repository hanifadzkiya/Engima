<?php
require_once __DIR__ .'/../Database.php';

Class Kursi extends Database {
	private $dbname = "engima";
	private $tablename = "kursi";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				id varchar(255) PRIMARY KEY,
				jadwal_id VARCHAR(255) NOT NULL,
				nomor INT NOT NULL,
				user_id VARCHAR(255),
				FOREIGN KEY (jadwal_id) REFERENCES jadwal(id),
				FOREIGN KEY (user_id) REFERENCES user(id)
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