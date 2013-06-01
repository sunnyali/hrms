<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();
    dbName::mysql_db(0);
    $lock = new lock();
    if(isset($_POST['submit-add-employee'])){
        if($_SESSION['emp_id'] == $_POST['user_id']) {

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
            $Validator = new Validator($rules,$message);
 
            if(!$Validator->isValid($_POST)) {
                $error = true;
                $fmsg = $Validator->CountError();
            } else {
                $sucess = $lock->insert('basic_info');
            }   

        }    
    }

    if(isset($sucess)) {
        header("Location:$checkpage->phpself?sucess=true");
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

    <?php include ($checkpage->root.'\include\header.php'); ?>

    </head>
    <body>
      
        <div id="wrapper">
            
            <input type="hidden" id="select_menu" value="2.1" />      
            <?php //include ($checkpage->root.'\include\logo.php'); ?>
            
            <!-- include Drop down Menu-->
            <?php include ($checkpage->root.'\include\dropdown.php'); ?>
            <!-- Drop down Menu End-->
            <div id="content">
                <div class="box">

                    <div class="head">
                        <h1>Add Employee</h1>
                    </div>

                    <div class="inner">
                        <form method="post" enctype="multipart/form-data">
                            <fieldset>
                                <ol>
                                    <li class="nameContainer"><label class="hasTopFieldHelp">Full Name</label>
                                        <ol class="fieldsInLine">
                                            <li>
                                                <div class="fieldDescription"><em>*</em> First Name</div>
                                                <input class="" maxlength="30" type="text" name="firstName">
                                            </li>
                                            <li>
                                                <div class="fieldDescription">Middle Name</div>
                                                <input class="" maxlength="30" type="text" name="middleName">
                                            </li>
                                            <li>
                                                <div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input class="" maxlength="30" type="text" name="lastName">
                                            </li>
                                        </ol>
                                    </li>
                                    <li><label for="photofile">Photograph</label>
                                        <input class="" type="file" name="photofile"><label class="fieldHelpBottom">Accepts jpg, .png, .gif up to 1MB. Recommended dimensions: 200px X 200px</label>
                                    </li>
                                    <li class="required">
                                        <em>*</em> Required field
                                    </li>
                                </ol>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['emp_id'] ?>" />
                                <p>
                                    <input type="submit" name="submit-add-employee" value="Save">
                                </p>
                            </fieldset>
                        </form>
                    </div>

                    
                </div>
            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->      
    </body>
    
</html>