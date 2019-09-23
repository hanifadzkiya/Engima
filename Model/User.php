<?php
require_once __DIR__ .'/../Database.php';

Class User extends Database {
	private $dbname = "engima";
	private $tablename = "user";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				id varchar(255) PRIMARY KEY,
				name VARCHAR(255) NOT NULL,
				email VARCHAR(255) NOT NULL,
				phone_number VARCHAR(20) NOT NULL,
				password VARCHAR(255) NOT NULL,
				profil_picture VARCHAR(255) NOT NULL,
				UNIQUE (id,name,email)
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

	public function add($name,$email,$phone_number,$password,$profil_picture){
		$sql = "INSERT INTO ". $this->tablename . " (id, name, email, phone_number, password, profil_picture) VALUES ('" . $this->getUUID() . "','".$name."','".$email."','".$phone_number."','".$this->encrypt($password)."','".$profil_picture."')";
		if ($this->runQuery($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $this->getConn()->error;
		}
	}

	public function verify($password_input,$password_hash){
		return (crypt($password_input, $password_hash) == $password_hash);
	}

	public function encrypt($password){
		return crypt($password);
	}
}