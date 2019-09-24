<?php  
require_once __DIR__ .'/../Database.php';

class Engima extends Database
{
    private $dbname = "engima";

    function __construct()
    {
        parent::__construct();
    }
    public function create()
    {
        $sql = "CREATE DATABASE IF NOT EXISTS " . $this->dbname;
        if ($this->runQuery($sql) === true) {
            echo "Database created successfully\n";
        } else {
            echo "Error creating database: " . $this->getConn()->error . "\n";
        
            $sql =  "CREATE TABLE ". "users" . " (
			uuid varchar(255) PRIMARY KEY,
			name VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			phone_number VARCHAR(20) NOT NULL,
			password VARCHAR(255) NOT NULL,
			profil_picture VARCHAR(255) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			UNIQUE (uuid,name,email)
			)";
            $this->runQuery($sql);
        }
    }
}