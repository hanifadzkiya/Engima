<?php
namespace Engima\Model;
use Engima\Database;
Class FilmGenre extends Database {
	private $dbname = "engima";
	private $tablename = "film_genre";

	function __construct(){
		parent::__construct();
		$this->connect($this->dbname);
	}

	public function createTable(){
		if(!$this->isTableExist($this->tablename)){
			$sql = "CREATE TABLE ". $this->tablename . " (
				id_film VARCHAR(255) NOT NULL,
				id_genre VARCHAR(255) NOT NULL,
				FOREIGN KEY (id_film) REFERENCES film(id),
				FOREIGN KEY (id_genre) REFERENCES genre(id),
				PRIMARY KEY (id_film,id_genre)
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

	public function add(){
		
	}
}