<?php
namespace Engima\Model;
use Engima\Database;
Class User extends Database {
	private $dbname = "engima";
	private $tablename = "users";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				uuid varchar(255) PRIMARY KEY,
				name VARCHAR(255) NOT NULL,
				email VARCHAR(255) NOT NULL,
				phone_number VARCHAR(20) NOT NULL,
				password VARCHAR(255) NOT NULL,
				profil_picture VARCHAR(255) NOT NULL,
				UNIQUE (uuid,name,email)
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
		echo $this->getUUID();
	}
}