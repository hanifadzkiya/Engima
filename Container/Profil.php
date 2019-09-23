<?php
namespace Engima\Container;
use Engima\IRequest;
use Engima\Container;
class Profil extends Container{
	function __construct(Irequest $request){
		parent::__construct($request);
	}	
	public function all(){
		return "This is all Profile API";
	}
	public function get(){
		return "This is get one Profile API";
	}
}