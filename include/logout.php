<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();

	if(session_destroy())
	{
		session_destroy();
		header("Location:  $checkpage->web/login.php");
	}
?>