<?php
//db connection class using singleton pattern
class dbConn{

	//variable to hold connection object.
	protected static $db;
	//private construct – class cannot be instatiated externally.
	private function __construct() {
		
		
		if(isset($_SESSION['mysql_database_close']) == 'true')
		{
			if (self::$db) {
				self::$db = NULL;
			}
			unset($_SESSION['mysql_database_close']);
		}
		
		$db = $_SESSION['mysql_database'];
		unset($_SESSION['mysql_database']);
		try {
			// assign PDO object to db variable
			self::$db = new PDO("mysql:host=localhost;dbname=$db", "root", "");
		}
		catch (PDOException $e) {
			//Output error – would normally log this to error file rather than output to user.
			echo "Connection Error: " . $e->getMessage();
		}
	}

	// get connection method is protected so only derived class can use this.
	protected static function getConnection() {
		
		//single instance, if no connection object exists then create one.
		if (!self::$db) {
		//new connection object.
			new dbConn();
		}
		//return connection.
		return self::$db;
	}
	
	public static function check_email($myusername){
		//use database connection
		$dbpr = self::getConnection();
		$id=$dbpr->query("SELECT `emp_id` FROM `login` WHERE `username` = '$myusername' ");
		$empid = NULL;
		$count = 0;
		while ($row = $id->fetch(PDO::FETCH_ASSOC)){
			$empid = $row['emp_id'];
		}
		//return empid of email
		return $empid;
	}
	
	//Validate Form Field 
	public static function validate($myusername,$mypassword){
		//use database connection
		$dbpr = self::getConnection();
		// check empid of user
		$empid = self::check_email($myusername);
		$rtn = false;
		if($empid)
		{
			$mypassword = self::encode($mypassword,$empid);
			$sql="SELECT `level` FROM `login` WHERE `username`='$myusername' and `password`='$mypassword'  and `level` IS NOT NULL";
			$result=$dbpr ->query($sql);
			$count = $result ->rowCount();
		}
		if($count == 1)
		{
			$rtn = true; // If Found Then Return True
		}
		return $rtn;
	}

	//Encode Passwords 
	public static function encode($string,$key) {
		$j=1;
		$hash= NULL;
		$key = strrev($key);
		$key = sha1($key);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		for ($i = 0; $i < $strLen; $i++) {
			$ordStr = ord(substr($string,$i,1));
			if ($j == $keyLen) {
				$j = 0;
			}
			$ordKey = ord(substr($key,$j,1));
			$j++;
			$hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
		}	
		return $hash;
	}

	//Decode Passwords
	public static function decode($string,$key) {
		$j=1;
		$hash= NULL;
		$key = strrev($key);
		$key = sha1($key);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		for ($i = 0; $i < $strLen; $i+=2) {
			$ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
			if ($j == $keyLen) {
				$j = 0;
			}
			$ordKey = ord(substr($key,$j,1));
			$j++;
			$hash .= chr($ordStr - $ordKey);
		}
		return $hash;
	}
}
?>