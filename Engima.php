<?php 
include("Database.php");

class Engima extends Database{
	private $dbname = "engima";

	function __construct(){
		parent::__construct();
	}
	public function create(){
		$sql = "CREATE DATABASE IF NOT EXISTS " . $this->dbname;
		if ($this->getConn()->query($sql) === TRUE) {
		    echo "Database created successfully";
		} else {
		    echo "Error creating database: " . $this->getConn()->error;
		}
	}
}