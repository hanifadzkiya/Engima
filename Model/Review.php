<?php
namespace Engima\Model;
use Engima\Database;
Class Review extends Database {
	private $dbname = "engima";
	private $tablename = "review";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				id varchar(255) PRIMARY KEY,
				user_id VARCHAR(255) NOT NULL,
				film_id VARCHAR(255) NOT NULL,
				review MEDIUMTEXT NOT NULL,
				rating INT NOT NULL,
				FOREIGN KEY (user_id) REFERENCES user(id),
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