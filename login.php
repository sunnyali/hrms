<?php
    if(isset($_SESSION))
    {
        session_destroy();
    }
    require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');

    dbName::mysql_db(0);
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $myusername=addslashes($_POST['username']);
        $mypassword=addslashes($_POST['password']);
        $myusername=htmlspecialchars($myusername);
        $mypassword=htmlspecialchars($mypassword);
       // $myusername=mysql_real_escape_string($myusername);
       // $mypassword=mysql_real_escape_string($mypassword);
        $chk = NULL;
        $chk = dbConn::validate($myusername, $mypassword , true);
        if($chk)
        {
            $_SESSION['emp_id'] = $chk['emp_id'];
            $_SESSION['name'] = $chk['name'];
            $_SESSION['level'] = $chk['level'];
            $checkpage = new allowpage();
            header("location: $checkpage->web\substation.php");
            die();
        }
        else
        {
            $foo=true;
            $error="Invalid Email or Password.";
        }
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

	<link href="css/style.css" rel="stylesheet" type="text/css"/>
    
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css"/>
	<!--[if lte IE 6]>
	<link href="/symfony/web/css/IE6_style.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<!--[if IE]>
	<link href="/symfony/web/css/IE_style.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
  </head>
  <body>
  
    <style type="text/css">
    
    body {
        background-color: #FFFFFF;
        height: 700px;
    }

    img {
        border: none;
    }

    input:not([type="image"]) {
        background-color: transparent;
        border: none;
    }

    input:focus, select:focus, textarea:focus {
        background-color: transparent;
        border: none;
    }

    .textInputContainer {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        color: #666666;
    }

    #divLogin {
        background: transparent url(images/login/login.png) no-repeat center top;
        height: 520px;
        width: 98%;
        border-style: hidden;
        margin: auto;
        padding-left: 10px;
    }

    #divUsername {
        padding-top: 153px;
        padding-left: 50%;
    }

    #divPassword {
        padding-top: 35px;
        padding-left: 50%;
    }

    #txtUsername {
        width: 240px;
        border: 0px;
        background-color: transparent;
    }

    #txtPassword {
        width: 240px;
        border: 0px;
        background-color: transparent;
    }

    #txtUsername, #txtPassword {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        color: #666666;
        height: 16px;
        vertical-align: middle;
        padding-top:0;
    }
    
    #divLoginHelpLink {
        width: 270px;
        background-color: transparent;
        height: 20px;
        margin-top: 12px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 50%;
    }

    #divLoginButton {
        padding-top: 2px;
        padding-left: 50%;
        float: left;
        width: 280px;
    }

    #btnLogin {
        background: url(images/login/Login_button.png) no-repeat;
        cursor:pointer;
        width: 94px;
        height: 23px;
        border: none;
    }

    #divLink {
        padding-left: 230px;
        padding-top: 105px;
        float: left;
    }

    #divLogo {
        visibility:hidden;
        padding-left: 30%;
        padding-top: 70px;
    }

    #spanMessage {
        background: transparent url(images/login/mark.png) no-repeat;
        padding-left: 18px; 
        padding-top: 0px;
        color: #DD7700;
        font-weight: bold;
    }

</style>

<div id="divLogin">

    <div id="divLogo">
        <img src="images/login/logo.bmp" width="207" height="70" />
    </div>

    <form id="frmLogin" onsubmit="return jQuery(this).validationEngine('validate');" class="formular" method="post" action="">
        <div id="divUsername" class="textInputContainer">
            <input name="username" id="txtUsername" class="validate[required] text-input" type="text" value="Admin" />        </div>
        <div id="divPassword" class="textInputContainer">
            <input name="password" id="txtPassword" class="validate[required] text-input" type="password" value="admin" />        </div>
        <div id="divLoginHelpLink"></div>
        <div id="divLoginButton">
            <input type="submit" name="Submit" class="button" id="btnLogin" value=" " />
                    </div>
    </form>

</div>


<style type="text/css">
    #divFooter {
        text-align: center;
    }
    
    #spanCopyright, #spanSocialMedia {
        padding: 20px 10px 10px 10px;
    }
    
    #spanSocialMedia a img {
        margin-bottom: -8px;
		border: none;
    }

</style>
<div id="divFooter" >
    <span id="spanCopyright">
        Copyright &copy; <a href="http://www.1800sunstaff.com/" target="_blank">Sunrise Staffing</a>. 2013 - <?php echo date('Y') ?> All rights reserved.
    </span>
    <br class="clear" />
</div>
            <script src="js/jquery-1.9.1.js" type="text/javascript"> </script>
            <script src="js/jquery-ui.js" type="text/javascript"> </script>
            <script src="js/RequiredValidator.js" type="text/javascript"> </script>
            <script src="js/jquery.validationEngine-en.js" type="text/javascript"> </script>
            <script src="js/jquery.validationEngine.js" type="text/javascript" ></script>
      </body>
</html>
