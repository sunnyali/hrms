<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();
    dbName::mysql_db(0);
    $lock = new lock();


    if(isset($_GET['emid'])) {
        $emp_id = $_GET['emid'];
    }
        
    $sql = "SELECT `firstname`,`middlename`,`lastname` FROM `basic_info` WHERE `emp_id` = '$emp_id' ";
    $basic_info = $lock->run_query($sql);
     
    
    $sql = "SELECT `fathername`,`dob`,`nationality`,`bloodgroup`,`gender`,`maritalstatus`,`pic`,`cv` FROM `personal_detail` WHERE `emp_id` = '$emp_id' ";
    $personal_info = $lock->run_query($sql);
    

    // cinic info
    $sql="SELECT `cnicno`,`cnicexp`,`cnicpic` FROM `cnic` WHERE `emp_id` = '$emp_id' ";
    $cnic_info = $lock->run_query($sql);
   
    
    // driving liscene 
    $sql="SELECT `dlicenseno`,`dlicenseexp`,`dlicensepic` FROM `dliscense` WHERE `emp_id` = '$emp_id' ";
    $driving_info = $lock->run_query($sql);
    
    // passport info
    $sql="SELECT `passportno`,`passportexp`,`passportpic` FROM `passport` WHERE `emp_id` = '$emp_id' ";
    $passport_info = $lock->run_query($sql);

	if(isset($_POST['submit_personal'])){
        $nothing = true;
        if(!empty($personal_info)){
            $sucess = $lock->update('personal_detail','emp_id',$emp_id);
            $smsg = "Personal Info";
        } else {
            $_REQUEST['emp_id'] = $emp_id;
            $sucess = $lock->insert('personal_detail');
            $smsg = "Personal Info";
        }

        if(($basic_info['firstname'] != $_POST['firstname']) || ($basic_info['middlename'] != $_POST['middlename']) || ($basic_info['lastname'] != $_POST['lastname'])) {
            $sucess = $lock->update('basic_info','emp_id',$emp_id);
            $smsg = "Personals Info";
        }

    } else if(isset($_POST['submit_cnic'])){
        $nothing = true;
		if (!empty($cnic_info)){
            $sucess = $lock->update('cnic','emp_id',$emp_id);
            $smsg = "CNIC Info";
        } else{
    		$_REQUEST['emp_id']=$emp_id;
    		$sucess = $lock->insert('cnic');
    		$smsg = "CNIC Info";
		}
	} else if(isset($_POST['submit_driving'])){
        $nothing = true;
		if (!empty($driving_info)){
            $sucess = $lock->update('dliscense','emp_id',$emp_id);
            $smsg = "Driving License Info";
        } else{
    		$_REQUEST['emp_id']=$emp_id;
    		$sucess = $lock->insert('dliscense');
    		$smsg = "Driving License Info";
        }    
		
	} else if(isset($_POST['submit_passport'])){
        $nothing = true;
		if (!empty($passport_info)){
            $sucess = $lock->update('passport','emp_id',$emp_id);
            $smsg = "Passport Info";
        } else{
    		$_REQUEST['emp_id']=$emp_id;
    		$sucess = $lock->insert('passport'); 
    		$smsg = "Passport Info";
        }
	}
	


    if((!empty($sucess) == true)) {
        header("Location:$checkpage->phpself?emid=$emp_id&sucess=true&msg=$smsg");
        die();
    } else if(!empty($error)) {
        header("Location:$checkpage->phpself?emid=$emp_id&fail=true&msg=$fmsg");
        die();
    } else if(!empty($nothing)) {
        header("Location:$checkpage->phpself?emid=$emp_id");
        die();
    }
    
?>

    <?php include ($checkpage->root.'\include\header.php'); ?>

    <link rel="stylesheet" href="../../css/validationEngine.jquery.css" type="text/css"/>

    </head>
    <body>
      
        <div id="wrapper">
            <!-- menu -->
            <?php include ($checkpage->root.'\include\dropdown.php'); ?>
            <div id="content">
			<center>
            	<?php if(isset($_GET['sucess']) == true && isset($_GET['msg'])) { ?>
                    <br>
	            	<h1><div class="sucessmsg"><?php echo $_GET['msg']; ?>&nbsp;Update Successfully! </div> </h1>
                <?php } ?>
            </center>
            
                  
            <div class="box pimPane" id="employee-details">
            
                    
              <?php include ($checkpage->root.'\include\profilemenu.php'); ?>  

            
                
                <div class="personalDetails" id="pdMainContainer">
                    
                    <div class="head">
                        <h1>Personal Details</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        <form id="" onsubmit="return jQuery(this).validationEngine('validate');" method="post" action="">

                            
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer">
                                        <label for="Full_Name" class="hasTopFieldHelp">Full Name</label>
                                        <ol class="fieldsInLine">
                                            <li>
                                                <div class="fieldDescription"><em>*</em> First Name</div>
                                                <input type="text" name="firstname" class="ed_personal validate[required] text-input" value="<?php echo (isset($basic_info['firstname'])) ? $basic_info['firstname'] : ''; ?>" maxlength="30" title="First Name" /> </li>
                                            <li>
                                                <div class="fieldDescription">Middle Name</div>
                                                <input type="text" name="middlename" class="ed_personal" value="<?php echo (isset($basic_info['middlename'])) ? $basic_info['middlename'] : ''; ?>" maxlength="30" title="Middle Name" /> </li>
                                            <li>
                                                <div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input type="text" name="lastname" class="ed_personal validate[required] text-input" value="<?php echo (isset($basic_info['lastname'])) ? $basic_info['lastname'] : ''; ?>" maxlength="30" title="Last Name" /> </li>
                                        </ol>    
                                        <ol>
                                            <li>
                                                <label>Father Name</label>
                                                <input type="text" class="ed_personal validate[required] text-input" value="<?php echo (isset($personal_info['fathername'])) ? $personal_info['fathername'] : ''; ?>" maxlength="10" name="fathername" class="editable" > </li>
                                            <li>
                                                <label>Date of Birth</label>
                                                <input type="text" disabled name="dob" id="dob" class="dob" value="<?php echo (isset($personal_info['dob'])) ? $personal_info['dob'] : ''; ?>" maxlength="30" > </li>
                                            <li class="long">
                                                <label>Nationality</label>
                                                <input type="text" class="ed_personal validate[required] text-input" value="<?php echo (isset($personal_info['nationality'])) ? $personal_info['nationality'] : ''; ?>" name="nationality" maxlength="30" > </li>
                                            <li>
                                                <label>Blood Group</label>
                                                <select name="bloodgroup" class="ed_personal" >
                                                                
                                                    <option value="O-" <?php echo ($personal_info['bloodgroup'] == "O-") ? "selected" : ''; ?> >O-</option>
                                                    <option value="O+" <?php echo ($personal_info['bloodgroup'] == "O+") ? "selected" : ''; ?> >O+</option>
                                                    <option value="A-" <?php echo ($personal_info['bloodgroup'] == "A-") ? "selected" : ''; ?> >A-</option>
                                                    <option value="A+" <?php echo ($personal_info['bloodgroup'] == "A+") ? "selected" : ''; ?> >A+</option>
                                                    <option value="B-" <?php echo ($personal_info['bloodgroup'] == "B-") ? "selected" : ''; ?> >B-</option>
                                                    <option value="B+" <?php echo ($personal_info['bloodgroup'] == "B+") ? "selected" : ''; ?> >B+</option>
                                                    <option value="AB-" <?php echo ($personal_info['bloodgroup'] == "Ab-") ? "selected" : ''; ?> >AB-</option>
                                                    <option value="AB+" <?php echo ($personal_info['bloodgroup'] == "Ab+") ? "selected" : ''; ?> >AB+</option>
                                                </select> </li>                                     
                                            <li>
                                                <label>Gender</label>
                                                <input type="radio" class="ed_personal validate[required] radio" name="gender" value="Male" <?php echo (!isset($personal_info['gender']))  ? "" : (($personal_info['gender'] == 'Male') ? "checked" :""); ?> /> Male 
                                                <input type="radio" class="ed_personal validate[required] radio" name="gender" value="Female" <?php echo (!isset($personal_info['gender']))  ? "" : (($personal_info['gender'] == 'Female') ? "checked" :""); ?> /> Female</li>
                                            <li>    
                                                <label>Marital Status</label>
                                                <input type="radio" class="ed_personal validate[required] radio" name="maritalstatus" value="Single" <?php echo (!isset($personal_info['maritalstatus']))  ? "" : (($personal_info['maritalstatus'] == 'Single') ? "checked" :""); ?> /> Single <input type="radio" class="ed_personal validate[required] radio" name="maritalstatus" value="Married" <?php echo (!isset($personal_info['maritalstatus']))  ? "" : (($personal_info['maritalstatus'] == 'Married') ? "checked" :""); ?> /> Married</li>

                                        </ol>    
                                    </li>
                                </ol>
                                    <p>
                                    <input type="button" id="btn_personal" value="Edit" />
                                    <input type="submit" name="submit_personal" id="sbt_personal" value="Save" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- pdMainContainer -->
                
                <div class="cnic" id="cniccontainer">
                    
                    <div class="head">
                        <h1>Cnic Info</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        <form id="" method="post" action="">

                            
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer">
                                        
                                        <ol>
                                            <li>
                                                <label>CNIC No:</label>
                                                <input type="text" class="ed_cnic" value="<?php echo (isset($cnic_info['cnicno'])) ? $cnic_info['cnicno'] : ''; ?>"  name="cnicno" class="editable" > </li>
                                            <li>
                                                <label>Expire Date:	</label>
                                                <input type="text" 	value="<?php echo (isset($cnic_info['cnicexp'])) ? $cnic_info['cnicexp'] : ''; ?>" disabled name="cnicexp"  > </li>
                                            <li>
                                                <label>Upload Cnic:</label>
                                                <input type="text" value="<?php echo (isset($cnic_info['cnicpic'])) ? $cnic_info['cnicpic'] : ''; ?>" class="ed_cnic" name="cnicpic"  > </li>
                                                
                                           
                                        </ol>    
                                    </li>
                                </ol>
                                    <p>
                                    <input type="button" id="btn_cnic" value="Edit" />
                                    <input type="submit" name="submit_cnic" id="sbt_cnic" value="Save" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- cniccontainer -->


                <div class="driving" id="drivingccontainer">
                    
                    <div class="head">
                        <h1>Driving License Info</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        <form id="" method="post" action="">

                            
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer">
                                        
                                        <ol>
                                            <li>
                                                <label>License No:</label>
                                                <input type="text" class="ed_driving" name="dlicenseno" value="<?php echo (isset($driving_info['dlicenseno'])) ? $driving_info['dlicenseno'] : ''; ?>" class="editable" > </li>
                                            <li>
                                                <label>Expire Date:	</label>
                                                <input type="text" value="<?php echo (isset($driving_info['dlicenseexp'])) ? $driving_info['dlicenseexp'] : ''; ?>" disabled name="dlicenseexp"  > </li>
                                            <li>
                                                <label>Picture:</label>
                                                <input type="text" value="<?php echo (isset($driving_info['dlicensepic'])) ? $driving_info['dlicensepic'] : ''; ?>" class="ed_driving" name="dlicensepic"  > </li>
                                           
                                        </ol>    
                                    </li>
                                </ol>
                                    <p>
                                    <input type="button" id="btn_driving" value="Edit" />
                                    <input type="submit" name="submit_driving" id="sbt_driving" value="Save" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- drivingcontainer -->
                <div class="passport" id="passportccontainer">
                    
                    <div class="head">
                        <h1>Passport Info</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        <form id="" method="post" action="">

                            
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer">
                                        
                                        <ol>
                                            <li>
                                                <label>Passport No:</label>
                                                <input type="text"  value="<?php echo (isset($passport_info['passportno'])) ? $passport_info['passportno'] : ''; ?>" class="ed_passport" name="passportno" class="editable" > </li>
                                            <li>
                                                <label>Expire Date:	</label>
                                                <input type="text" value="<?php echo (isset($passport_info['passportexp'])) ? $passport_info['passportexp'] : ''; ?>" disabled name="passportexp"  > </li>
                                            <li>
                                                <label>Picture:</label>
                                                <input type="text" value="<?php echo (isset($passport_info['passportpic'])) ? $passport_info['passportpic'] : ''; ?>" class="ed_passport" name="passportpic"  > </li>
                                           
                                        </ol>    
                                    </li>
                                </ol>
                                    <p>
                                    <input type="button" id="btn_passport" value="Edit" />
                                    <input type="submit" name="submit_passport" id="sbt_passport" value="Save" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- passportcontainer -->


            </div> <!-- employee-details -->
 
            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
            <!-- include Footer-->
        <?php include ($checkpage->root.'\include\footer.php'); ?>
            <!-- Footer End-->      
        
        <script type="text/javascript" src="../../js/employee/profile.js"></script>
        <script type="text/javascript" src="../../js/main.js"></script>
        <script src="../../js/RequiredValidator.js" type="text/javascript"> </script>
        <script src="../../js/jquery.validationEngine-en.js" type="text/javascript"> </script>
        <script src="../../js/jquery.validationEngine.js" type="text/javascript" ></script>
    </body>
    
</html>

