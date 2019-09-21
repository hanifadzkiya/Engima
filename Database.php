<?php
namespace Engima;
use Mysqli;
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

    public function connectWithDbname($dbname){
    	print("connected to " . $dbname . "\n");
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $dbname);
	}

	public function connectWithoutDbname(){
		print("connected\n");
		$this->conn = new mysqli($this->servername, $this->username, $this->password);
	}

	public function close(){
		$this->close();
	}

	public function getConn(){
		return $this->conn;
	}

	public function runQuery($sql){
		return $this->conn->query($sql);
	}

	public function isTableExist($tablename){
		return $this->conn->query("SELECT 1 FROM `" . $tablename . "`");
	}

	public function getUUID(){
	    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
	        mt_rand(0, 0xffff),
	        mt_rand(0, 0x0fff) | 0x4000,
	        mt_rand(0, 0x3fff) | 0x8000,
	        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
	    );
	}

	public function __call($method, $arguments) {
    	if($method == 'connect') {
        	if(count($arguments) == 1) {
           		return call_user_func_array(array($this,'connectWithDbname'), $arguments);
        	} else if(count($arguments) == 0) {
            	return call_user_func_array(array($this,'connectWithoutDbname'), $arguments);
        	}
    	}
   }  
}