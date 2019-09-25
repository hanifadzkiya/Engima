<?php
require_once __DIR__ .'/../Database.php';

Class Review extends Database
{
    private $dbname = "engima";
    private $tablename = "review";

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
				user_id VARCHAR(255) NOT NULL,
				film_id VARCHAR(255) NOT NULL,
				review MEDIUMTEXT NOT NULL,
				rating INT NOT NULL,
				FOREIGN KEY (user_id) REFERENCES user(id),
				FOREIGN KEY (film_id) REFERENCES film(id)
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

    public function add($user_id,$film_id,$review,$rating)
    {
        $sql = "INSERT INTO ". $this->tablename . " (id, user_id, film_id, review, rating) VALUES ('" . $this->getUUID() . "','".$user_id. "','".$film_id. "','".$review. "','".$rating."')";
        if ($this->runQuery($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->getConn()->error;
        }
    }
}