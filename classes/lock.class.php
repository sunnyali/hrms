<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');

/* Lock class is based class for many classes used in this system
 * This Class have methods which is used in whole project 
 * This have timeout period after which user will logout automatically and many other magical functions
*/
 
class lock extends dbConn{
	private $login_id;
	public function __construct() {
		
			$dbpr = parent::getConnection();
			
			$timezone = "Asia/Karachi";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			

			$inactive = 30 * 60; // Set Sign Out Time in Seconds
			
			if (!empty($_SESSION['timeout'])) {

			// set session life to current time minus timeout
			$session_life = time() - $_SESSION['timeout'];

			// check if your session life is greater than 30 minutes
			if ($session_life > $inactive) {
				$checkpage = new allowpage();
				header("Location: $checkpage->web/include/logout.php");
				die;
			}
		}

		$_SESSION['timeout'] = time();

	}
	
	// always use cleanstring function before insert data into database
	protected static function cleanstring($string){
		$string = ucwords(strtolower($string));
		$string=htmlspecialchars(trim($string));
		if(!get_magic_quotes_gpc()){
			$string = addslashes($string);
			$string= trim($string);
			$string = preg_replace( '/\s+/', ' ', $string );
			$string = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
		}
		return $string;
	}
	
	public function require_fields($required){
		// Check Required Fields
		$error = false;
		foreach($required as $field) {
			if (!isset($_REQUEST[$field]) || $_REQUEST[$field] == '') { //can also used empty
				$error = true;
			}
		}
		return $error;
	}
	
	private function make_array($table,$fields){
		// Return Array of Non Empty Fields
		$dbpr=parent::getConnection();
		$arr = array();
		$ary = array();
		foreach (array_keys($fields) AS $arri)
		{
			$ary[] = $arri;
		
		}
		foreach($ary as $field) {
			$sql="SHOW COLUMNS FROM `$table` WHERE `field` = '$field'";
			$result=$dbpr ->query($sql);
			$count = $result ->rowCount();
			if($count == 1)
			{
			//if (!(empty($fields[$field]))) {
				$arr[$field] = $this->cleanstring($fields[$field]);
			//}
			}
		}
		return $arr;
	}
	
	private function make_update_array($table,$fields){
		// Return Array of Non Empty Fields
		$dbpr=parent::getConnection();
		$arr = array();
		$ary = array();
		foreach (array_keys($fields) AS $arri)
		{
			$ary[] = $arri;
	
		}
		foreach($ary as $field) {
			$sql="SHOW COLUMNS FROM `$table` WHERE `field` = '$field'";
			$result=$dbpr ->query($sql);
			$count = $result ->rowCount();
			if($count == 1)
			{
				if (!(empty($fields[$field]))) {
					$arr[$field] = $this->cleanstring($fields[$field]);
				}
			}
		}
		
		return $arr;
	}
	
	private function make_statment($table,$arr){
		//Create Dynamic INSERT Statment
		$fields = $this->make_array($table,$arr);
		$sql = "INSERT INTO `".$table."`";
		$sql .= " (`".implode("`, `", array_keys($fields))."`) "."VALUES ('".implode("', '", $fields)."')";
		return $sql;
	}
	
	public function insert($table){
		
		$dbpr=parent::getConnection();
		$sql = $this->make_statment($table, $_REQUEST);
		$rtn = false;
		$stmt = $dbpr->prepare($sql);
		try  {
			$stmt = $dbpr->exec($sql);
			$rtn = true;
		}
		catch (PDOException $e){
			echo "Exception in Insert :" . $e ->getMessage();
		}
		return $rtn;
	}
	
	public function update(){
		$dbpr=parent::getConnection();
		$arg_list = func_get_args();
		$table = $arg_list[0];
		$countr;
		$cquery = "nop";
		$rtn = false;
		$qry = "";
		$asql =  "`$arg_list[1]` = '$arg_list[2]' ";
		$arr = self::make_array($table, $_REQUEST);
		
		foreach($arr AS $key => $field)
		{
			$sql = "SELECT `".$key."` FROM `$table` WHERE ".$key." = '".$field."'";
			if(func_num_args() > 1)
			{
				$sql .=  " AND ".$asql;
				if(func_num_args() > 3)
				{
					for ($count = 3; $count<func_num_args()-2;$count+=3){
						$stmt[] = $arg_list[$count] ;
						$cnt = $count+1;
						$cnt1 = $cnt+1;
						$qry = " $arg_list[$count] `$arg_list[$cnt]` = '$arg_list[$cnt1]'";
						$sql .= $qry; 
					}
				}
			}
			$result = $dbpr->query($sql);
			$countr = $result ->rowCount();
			if($countr == 0)
			{
				$query = "Update `$table` SET `$key` = '$field' WHERE ".$asql." ".$qry;
				$dbpr->query($query);
				$rtn = true;
			}
		}
		return $rtn;
	}
	
	public function table_array(){
		$stmt = array();
		$arg_list = func_get_args();
		$rtn = array();
		$sql = "SELECT * FROM `$arg_list[0]` ";
		if(func_num_args() > 1)
		{
			$sql .= "WHERE `$arg_list[1]` = '$arg_list[2]' ";
			if(func_num_args() > 3)
			{
				for ($count = 3; $count<func_num_args()-2;$count+=3){
					$stmt[] = $arg_list[$count] ;
					$cnt = $count+1;
					$cnt1 = $cnt+1;
					$sql .= " $arg_list[$count] `$arg_list[$cnt]` = '$arg_list[$cnt1]'";
				}
			}
		}
		
		$dbpr = parent::getConnection();
		$result=$dbpr->query($sql);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rtn[] = $row;	
		}
		if(count($rtn) == 1) {
			return $rtn[0];
		} else {
			return $rtn;	
		}
	}
	
	public function table_count(){
		$stmt = array();
		$arg_list = func_get_args();
		$sql = "SELECT * FROM `$arg_list[0]` ";
		if(func_num_args() > 1)
		{
			$sql .= "WHERE `$arg_list[1]` = '$arg_list[2]' ";
			if(func_num_args() > 3)
			{
				for ($count = 3; $count<func_num_args()-2;$count+=3){
					$stmt[] = $arg_list[$count] ;
					$cnt = $count+1;
					$cnt1 = $cnt+1;
					$sql .= " $arg_list[$count] `$arg_list[$cnt]` = '$arg_list[$cnt1]'";
				}
			}
		}
	
		$dbpr = parent::getConnection();
		$result=$dbpr->query($sql);
		$rtn = $result ->rowCount();
		
		return $rtn;
	}
	public function run_query($sql){
		$dbpr = parent::getConnection();
		$result = $dbpr->query($sql);
		$arr = $result->fetchAll(PDO::FETCH_ASSOC);
		if(count($arr) == 1) {
			return $arr[0];
		} else {
			return $arr;	
		} 
	}
	
	public function initials(){
		$arg_list = func_get_args();
		$rtn = '';
		foreach(func_get_args() as $arg) {
			$arg = preg_replace('/\s+/', '', $arg );
			$rtn .= substr($arg, 0, 1);
			//$rtn .= $arg;
		}
		return $rtn;
	}
	
	public function upload($fname,$initials,$file=NULL,$target=NULL){
		if(!isset($target))
		{
			$target = self::target($fname);
		}
		$ctarget = $target;
		if(isset($file))
		{ 
			$aname=$file;
		}
		else
		{
			$aname=$fname;
		}
		$ext = substr(strrchr($_FILES[$fname]['name'], '.'), 1);
		$cdate = date('Ynjhis');
		$target = $target.$initials."_".$aname."_".$cdate.".".$ext;
		
		if(move_uploaded_file($_FILES[$fname]['tmp_name'], $target))
		{
			$target = str_replace($ctarget, '', $target);
			return $target;
		}
		else
		{
			return false;
		}
	}
	
	public function newsfeed($name1,$status,$name2 = NULL,$msg){
		$dbpr = parent::getConnection();
		$rtn = false;
		$system = $_SESSION['system'];
		$sql = "INSERT INTO `status`.`newsfeed` (`name1`, `status`, `name2`, `message`, `system`) VALUES ('$name1', '$status', '$name2' , '$msg', '$system')";
		if($dbpr->query($sql)){
			$rtn = true;
		}
		return $rtn;
	}
	
	public function base64img($UPLOAD_DIR,$postimg,$ename) {
		
		$postimg = str_replace('data:image/png;base64,', '', $postimg);
		$postimg = str_replace(' ', '+', $postimg);
		$data = base64_decode($postimg);
		$file = $UPLOAD_DIR . $ename . '.png';
		$success = file_put_contents($file, $data);
		if($success) {
			return true;
		}
		else {
			return false;
		}
	}
    
    public function compress_image($source_url, $destination_url, $quality) {
    	$info = getimagesize($source_url);
     
    	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
     
    	//save it
    	imagejpeg($image, $destination_url, $quality);
     
    	//return destination file url
    	return $destination_url;
    }

}
?>