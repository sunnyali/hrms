<?php

	require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
	
	$checkpage = new allowpage();
	header("location: $checkpage->web/index.php");

?>