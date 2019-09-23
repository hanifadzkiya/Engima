<?php
require_once __DIR__ .'/../Database.php';

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
				id varchar(255) PRIMARY KEY,
				judul VARCHAR(255) NOT NULL,
				poster VARCHAR(255) NOT NULL,
				rating FLOAT,
				tanggal_rilis DATETIME NOT NULL,
				durasi_tayang INT NOT NULL,
				sinopsis MEDIUMTEXT NOT NULL
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

	public function add($judul, $poster, $rating, $tanggal_rilis, $durasi_tayang, $sinopsis){
		$sql = "INSERT INTO ". $this->tablename . " (id, judul, poster, rating, tanggal_rilis, durasi_tayang, sinopsis) VALUES ('" . $this->getUUID() . "','".$judul."','".$poster."','".$rating."','".$tanggal_rilis."','".$durasi_tayang."','".$sinopsis."')";
		if ($this->runQuery($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $this->getConn()->error;
		}
	}

	public function getAll(){
		$sql = "SELECT * FROM ".$this->tablename;
		return $this->runQuery($sql);
	}
}