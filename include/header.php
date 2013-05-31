<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
    <head>

        <title>Sunrise Staffing</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           
        <!-- Library CSS files -->
        <link href="<?php echo $checkpage->web ?>/css/reset.css" rel="stylesheet" type="text/css"/>
        <!-- Custom CSS files -->
        <link href="<?php echo $checkpage->web ?>/css/main.css" rel="stylesheet" type="text/css"/>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 