<?php
require_once __DIR__ .'/../Database.php';

Class Genre extends Database
{
    private $dbname = "engima";
    private $tablename = "genre";

    function __construct()
    {
        parent::__construct();
        $this->connect($this->dbname);
    }

    public function createTable()
    {
        if(!$this->isTableExist($this->tablename)) {
            $sql = "CREATE TABLE ". $this->tablename . " (
				id varchar(255) PRIMARY KEY,
				genre varchar(16) NOT NULL
				)";
            if ($this->runQuery($sql) === true) {
                echo "Table created successfully\n";
            } else {
                echo "Error creating table : " . $this->getConn()->error;
            }
        } else {
            echo "Table is already exist\n";
        }
    }

    public function add($genre)
    {
        $sql = "INSERT INTO ". $this->tablename . " (id, genre) VALUES ('" . $this->getUUID() . "','".$genre."')";
        if ($this->runQuery($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->getConn()->error;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM ".$this->tablename;
        return $this->runQuery($sql);
    }
}