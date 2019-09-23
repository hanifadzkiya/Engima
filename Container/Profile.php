<?php
namespace Engima\Container;
use Engima\Request;
class Profil {
	function __Profil($request){
		parent::__construct($request);
	}	
	public function all(){
		return "This is all Profile API";
	}
	public function get(){
		return "This is get one Profile API";
	}
}