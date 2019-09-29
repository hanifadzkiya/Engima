<?php
require_once __DIR__ .'/../Database.php';

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

	public function add($film_id,$jam_tayang){
		$sql = "INSERT INTO ". $this->tablename . " (id, film_id, jam_tayang) VALUES ('" . $this->getUUID() . "','".$film_id."','".$jam_tayang."')";
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

    public function getById($id)
    {
        $sql = "SELECT * FROM ".$this->tablename." WHERE id = '".$id."'";
        return $this->runQuery($sql);
    }

    public function getByFilmId($film_id)
    {
        $sql = "SELECT * FROM ".$this->tablename." WHERE film_id = '".$film_id."'";
        return $this->runQuery($sql);
    }

    public function getByFilmIdAfter($film_id)
    {

    	$now = date("Y-m-d H:i:s", time());
        $sql = "SELECT * FROM ".$this->tablename." WHERE film_id = '".$film_id."' AND jam_tayang > '". $now ."'";
        return $this->runQuery($sql);
    }

}