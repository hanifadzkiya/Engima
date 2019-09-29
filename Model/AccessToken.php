<?php
require_once __DIR__ .'/../Database.php';

Class AccessToken extends Database
{
    private $dbname = "engima";
    private $tablename = "access_token";

    function __construct()
    {
        parent::__construct();
        $this->connect($this->dbname);
    }

    public function createTable()
    {
        if(!$this->isTableExist($this->tablename)) {
            $sql = "CREATE TABLE ". $this->tablename . " (
				access_token VARCHAR(255) NOT NULL,
				user_id VARCHAR(255) NOT NULL,
				created_at TIMESTAMP NOT NULL  DEFAULT  CURRENT_TIMESTAMP,
				expire_at TIMESTAMP NOT NULL  DEFAULT  CURRENT_TIMESTAMP,
				FOREIGN KEY (user_id) REFERENCES user(id)
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

    public function add($user_id)
    {
        $access_token = $this->getUuid();
        $created_at = date("Y-m-d h:i:s", time());
        $expire_at = date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($created_at)));
        $sql = "INSERT INTO ". $this->tablename . " (access_token, user_id,created_at,expire_at) VALUES ('" . $access_token . "','".$user_id. "','".$created_at. "','".$expire_at."')";
        if ($this->runQuery($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->getConn()->error;
        }
    }
}