<?php
class dbName{
	//array contain all database names.
 	//private static $db = array('principal_builders_hr','pb_accounts','deactivate','archive_accounts','procurement','labour');
 	private static $db = array('sunrisehrm');
    
 	public static function mysql_db($id,$new=false){
 		if(!isset($_SESSION))
 		{
 			session_start();
 		}
 		$_SESSION['mysql_database'] = self::$db[$id]; //Return database name based on parameter.

 		if($new == true)
 		{
 			$_SESSION['mysql_database_close'] = 'true'; // For close old connection and establish new connection
 		}
 		return self::$db[$id];
 	}
}
?>