<?php

	require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
	dbName::mysql_db(0,true);
	$checkpage = new allowpage();
	header("location: $checkpage->web/hrms/index.php");

?>