<?php
class Database {
	private $servername;
	private $username;
	private $password;
	private $conn;

	function __construct() {
		$configs = include("Config.php");
		$this->servername = $configs["servername"];
		$this->username = $configs["username"];
		$this->password = $configs["password"];
    }

    public function connect(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password);
	}

	public function getConn(){
		return $this->conn;
	}

	public function runQuery($sql){
		return $this->conn->query($sql);
	}
}