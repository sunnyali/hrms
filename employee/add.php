<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();
    dbName::mysql_db(0);
    $lock = new lock();
    if(isset($_POST['submit-add-employee'])){ 
 //       if($_SESSION['emp_id'] == $_POST['user_id']) {

            $rules = array(
                "firstName"=>array(
                    "require"=>true,
                    "minlength"=>2,
                    "maxlength"=>40                     
                ),
                "lastName" => array(
                    "require"=>true,
                    "minlength"=>2,
                    "maxlength"=>40 
                ),
            );
         
            $message = array(
                "firstName"=>array(
                    "require"=>"This field is required",
                    "minlength"=>"String is too short",
                    "maxlength"=>"Input is more character then required"
                ),
                "lastName"=>array(
                    "require"=>"This field is required",
                    "minlength"=>"String is too short",
                    "maxlength"=>"Input is more character then required"
                ),
            );
            $Validator = new validator($rules,$message);
 
            if(!$Validator->isValid($_POST)) {
                $error = true;
                $fmsg = $Validator->CountError();
            } else {
                $sucess = $lock->insert('basic_info'); // basic info table name
            }   

        }    
    //}

    if(isset($sucess)) {
        $sql = "SELECT `emp_id` FROM `basic_info` ORDER BY `emp_id` DESC LIMIT 1";
        $emid = $lock->run_query($sql);
        $emid = $emid['emp_id'];
        header("Location:$checkpage->web/employee/profile/profile.php?emid=$emid");
        die();
    }
    else if(isset($error)) {
        header("Location:$checkpage->phpself?fail=true&msg=$fmsg");
        die();
    }
    else if(isset($nothing)) {
        header("Location:$checkpage->phpself");
        die();
    }

?>

    <?php include ($checkpage->root.'/include/header.php'); ?>
        <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="../css/jquery-ui.css" type="text/css"/>  
    </head>
    <body>
      
        <div id="wrapper">
            
            <input type="hidden" id="select_menu" value="2.1" />      
            <?php //include ($checkpage->root.'/include/logo.php'); ?>
            
            <!-- include Drop down Menu-->
            <?php include ($checkpage->root.'/include/dropdown.php'); ?>
            <!-- Drop down Menu End-->
            <div id="content">
                <div class="box">

                    <div class="head">
                        <h1>Add Employee</h1>
                    </div>

                    <div class="inner">
                        <form id="formID" onsubmit="return jQuery(this).validationEngine('validate');" class="formular" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <ol>
                                    <br>
                                    <li class="nameContainer"><label class="hasTopFieldHelp">Full Name</label>
                                        <ol class="fieldsInLine">
                                            <li>
                                                <div class="fieldDescription"><em>*</em> First Name</div>
                                                    <input  maxlength="30" type="text" name="firstName" class="validate[required] text-input">
                                            </li>
                                            <li>
                                                <div class="fieldDescription">Middle Name</div>
                                                <input maxlength="30" type="text" name="middleName">
                                            </li>
                                            <li>
                                                <div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input maxlength="30" type="text" name="lastName" class="validate[required] text-input">
                                            </li>
                                        </ol>
                                    </li>
                                    
                                    <li class="required">
                                        <em>*</em> Required field
                                    </li>
                                    <li>
                                        <input type="submit" name="submit-add-employee" value="Save">
                                    </li>
                                </ol>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['emp_id'] ?>" />
                                
                            </fieldset>
                        </form>
                    </div>

                    
                </div>
            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
        <!-- include Footer-->
            <?php include ($checkpage->root.'/include/footer.php'); ?>
		

        <!-- Footer End-->   
		
           
			
			<script src="../js/RequiredValidator.js" type="text/javascript"> </script>
            <script src="../js/jquery.validationEngine-en.js" type="text/javascript"> </script>
			<script src="../js/jquery.validationEngine.js" type="text/javascript" ></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    // Add Classes to Dropdown Menu
                    $('#menu ul li:nth-child(3)').addClass("current");
                    $('#menu ul li:nth-child(3) ul li:nth-child(2)').addClass("selected");
                });   
            </script>
			
    </body>
    
</html>