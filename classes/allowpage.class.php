<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
// Allowpage class check show pages accroding to level of user
class allowpage{
	
	private $server;
	public $web;
	public $root;
	public $phpself;
	
	public function __construct(){
		if(!isset($_SESSION)) {
			session_start();
		}
		$this->server = "http://".$_SERVER["SERVER_NAME"];
		$this->web = $this->server."\hrms";
		$this->root = $_SERVER['DOCUMENT_ROOT']."\hrms";
		$this->phpself = $this->server.$_SERVER['PHP_SELF'];
	}
	
	private function getUrl(){
		$url =$_SERVER["REQUEST_URI"];
		$rtn = explode("?", $url);
		return $rtn[0];
	}
	
	public function hr($level){
		$loc = $this->server."/index.php";
		if($level == 1) {
				
			//List of Pages that Show to Admin of HR Managemet System
			$allowpage = array("index.php");
		} 
		else {
			$loc =$this->server."/include/logout.php";
		} 
		if (!in_array(self::getUrl(), $allowpage)) {
			header("location: $loc");
		}
	}
}
?>