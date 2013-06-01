<?php
// Autoload function use to automatically include class file from class folder in php page
function __autoload($classname) {
	if(!isset($_SESSION))
	{
		session_start();
		session_regenerate_id(true);
	}
	include($_SERVER['DOCUMENT_ROOT']."/hrms/classes/".$classname.".class.php");
}
?>