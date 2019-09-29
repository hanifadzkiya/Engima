<?php
require_once __DIR__ .'/../Database.php';

Class FilmGenre extends Database
{
    private $dbname = "engima";
    private $tablename = "film_genre";

    function __construct()
    {
        parent::__construct();
        $this->connect($this->dbname);
    }

    public function createTable()
    {
        if(!$this->isTableExist($this->tablename)) {
            $sql = "CREATE TABLE ". $this->tablename . " (
				id_film VARCHAR(255) NOT NULL,
				id_genre VARCHAR(255) NOT NULL,
				FOREIGN KEY (id_film) REFERENCES film(id),
				FOREIGN KEY (id_genre) REFERENCES genre(id),
				PRIMARY KEY (id_film,id_genre)
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

    public function add($id_film,$id_genre)
    {
        $sql = "INSERT INTO ". $this->tablename . " (id_film, id_genre) VALUES ('" . $id_film . "','".$id_genre."')";
        if ($this->runQuery($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->getConn()->error;
        }
    }
}