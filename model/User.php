<?php

Class User extends Engima {
	private $dbname = "engima";
	private $tablename = "users";

	function __construct(){
		parent::create();
	}

	public function create_table(){
		parent::create();
		$sql = "CREATE TABLE ". $this->tablename . " (
			uuid varchar(255) PRIMARY KEY,
			name VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			phone_number VARCHAR(20) NOT NULL,
			password VARCHAR(255) NOT NULL,
			profil_picture VARCHAR(255) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			UNIQUE (uuid,name,email)
			)";
		if ($this->runQuery($sql) === TRUE) {
		    echo "Table created successfully";
		} else {
		    echo "Error creating table : " . $this->getConn()->error;
		}

	}
}