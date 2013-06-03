<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();
    dbName::mysql_db(0);
    $lock = new lock();
    
    if(isset($_GET['emid'])) {
        $emp_id = $_GET['emid'];
    }

    // conctact info
    $sql = "SELECT * FROM `contact_info` WHERE `emp_id` = '$emp_id' ";
    $contact_info = $lock->run_query($sql);
    
    // Emergency conctact info
    $sql="SELECT * FROM `econtactinfo` WHERE `emp_id` = '$emp_id' ";
    $econtactinfo = $lock->run_query($sql);

    $sql = "SELECT `firstname`,`middlename`,`lastname` FROM `basic_info` WHERE `emp_id` = '$emp_id' ";
    $basic_info = $lock->run_query($sql);

	if(isset($_POST['submit_contact'])){
        $nothing = true;
		if(!empty($contact_info)){
            $sucess = $lock->update('contact_info','emp_id',$emp_id);
            $smsg = "Contact Info";
        } else {
            $_REQUEST['emp_id'] = $emp_id;
            $sucess = $lock->insert('contact_info');
    		$smsg = "Contact Info";
        }    
    } else if(isset($_POST['submit_emgContact'])){
        $nothing = true;
		if(!empty($econtactinfo)){
            $sucess = $lock->update('econtactinfo','emp_id',$emp_id);
            $smsg = "Emergency Contact Info";
        } else {
    		$_REQUEST['emp_id']=$emp_id;
            $sucess = $lock->insert('econtactinfo');
    		$smsg = "Emergency Contact Info";
		}
	}
		

    if((!empty($sucess) == true)) {
        header("Location:$checkpage->phpself?emid=$emp_id&sucess=true&msg=$smsg");
        die();
    }
    else if(!empty($error)) {
        header("Location:$checkpage->phpself?emid=$emp_id&fail=true&msg=$fmsg");
        die();
    }
    else if(!empty($nothing)) {
        header("Location:$checkpage->phpself?emid=$emp_id");
        die();
    }
	
?>

    <?php include ($checkpage->root.'\include\header.php'); ?>

    </head>
    <body>
      
        <div id="wrapper">
            <!-- menu -->
            <?php include ($checkpage->root.'\include\dropdown.php'); ?>
            <div id="content">
			<center>
            	<?php if(isset($_GET['sucess']) == true && isset($_GET['msg'])) { ?>

	            	<h1><div class="sucessmsg"><?php echo $_GET['msg']; ?>&nbsp;Update Successfully! </div> </h1>
                
                <?php } ?>
            </center>
            
                  
            <div class="box pimPane" id="employee-details">
                
                
            <?php include ($checkpage->root.'\include\profilemenu.php'); ?>  

                
                <div class="Contact" id="Contactcontainer">
                    
                    <div class="head">
                        <h1>Contact Info</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        <form id="" method="post" action="">

                            
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer">
                                        
                                        <ol>
                                            <li>
                                                <label>Address Line 1</label>
                                                <input type="text" class="ed_contact" value="<?php echo (isset($contact_info['Address1'])) ? $contact_info['Address1'] : ''; ?>"  name="Address1"  > </li>
                                            <li>
                                                <label>Address Line2	</label>
                                                <input type="text" class="ed_contact" value="<?php echo (isset($contact_info['Address2'])) ? $contact_info['Address2'] : ''; ?>"	 name="Address2"  > </li>
											<li>
                                                <label>City	</label>
                                                <input type="text" class="ed_contact"  value="<?php echo (isset($contact_info['City'])) ? $contact_info['City'] : ''; ?>"	 name="City"  > </li>
											<li>
                                                <label>Zipcode	</label>
                                                <input type="text" class="ed_contact" value="<?php echo (isset($contact_info['Zipcode'])) ? $contact_info['Zipcode'] : ''; ?>" 	 name="Zipcode"  > </li>													
                                             <li>
                                                <label>Cell No	</label>
                                                <input type="text" class="ed_contact" name="Cell"   value="<?php echo (isset($contact_info['Cell'])) ? $contact_info['Cell'] : ''; ?>" > </li>		

											<li>
                                                <label>Landline	</label>
                                                <input type="text" class="ed_contact" value="<?php echo (isset($contact_info['Landline'])) ? $contact_info['Landline'] : ''; ?>" 	 name="Landline"  > </li>															
                                             <li>
                                                <label>Personal Email	</label>
                                                <input type="text" class="ed_contact" value="<?php echo (isset($contact_info['Email'])) ? $contact_info['Email'] : ''; ?>" name="Email"  > </li>	      
                                           
                                        </ol>    
                                    </li>
                                </ol>
                                    <p>
                                    <input type="button" id="btn_contact" value="Edit" />
                                    <input type="submit" name="submit_contact" id="sbt_contact" value="Save" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- cniccontainer -->


                <div class="emgContact" id="emgContactccontainer">
                    
                    <div class="head">
                        <h1>Emergency Contact Info</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        <form id="" method="post" action="">

                            
                            <fieldset>
                                <ol>
                                    <li class="line nameContainer">
                                        
                                        <ol>
                                            <li>
                                                <label>Person Name</label>
                                                <input type="text" name="Name" class="ed_econtact" value="<?php echo (isset($econtactinfo['Name'])) ? $econtactinfo['Name'] : ''; ?>" > </li>
                                            <li>
                                                <label>Person Relation</label>
                                                <select name="Relation" class="ed_econtact" title="Person Relation"  >
                                                    <option value="Brother" <?php echo ($econtactinfo['Relation'] == "Brother") ? "selected" : ''; ?> >Brother</option>
                                                    <option value="Sister" <?php echo ($econtactinfo['Relation'] == "Sister") ? "selected" : ''; ?> >Sister</option>
                                                    <option value="Father" <?php echo ($econtactinfo['Relation'] == "Father") ? "selected" : ''; ?> >Father</option>
                                                    <option value="Mother" <?php echo ($econtactinfo['Relation'] == "Mother") ? "selected" : ''; ?> >Mother</option>
                                                    <option value="Cousin" <?php echo ($econtactinfo['Relation'] == "Cousin") ? "selected" : ''; ?> >Cousin</option>
                                                    <option value="Neighbour" <?php echo ($econtactinfo['Relation'] == "Neighbour") ? "selected" : ''; ?> >Neighbour</option>
                                                    <option value="Wife" <?php echo ($econtactinfo['Relation'] == "Wife") ? "selected" : ''; ?> >Wife</option>
                                                    <option value="Husband" <?php echo ($econtactinfo['Relation'] == "Husband") ? "selected" : ''; ?> >Husband</option>
                                                    <option value="Daughter" <?php echo ($econtactinfo['Relation'] == "Daughter") ? "selected" : ''; ?> >Daughter</option>
                                                    <option value="Son" <?php echo ($econtactinfo['Relation'] == "Son") ? "selected" : ''; ?> >Son</option>
                                                </select> </li>
                                            <li>
                                                <label>Contact No</label>
                                                <input type="text" name="Contact_No" class="ed_econtact" value="<?php echo (isset($econtactinfo['Contact_No'])) ? $econtactinfo['Contact_No'] : ''; ?>" > </li>
											<li>
                                                <label>Personal Address	</label>
                                                <input type="text" 	name="Person_Address" class="ed_econtact" value="<?php echo (isset($econtactinfo['Person_Address'])) ? $econtactinfo['Person_Address'] : ''; ?>" > </li>	
											<li>
                                                <label>City</label>
                                                <input type="text" name="City" class="ed_econtact" value="<?php echo (isset($econtactinfo['City'])) ? $econtactinfo['City'] : ''; ?>" > </li>													
                                           	<li>
                                                <label>Zipcode	</label>
                                                <input type="text" name="Zipcode" class="ed_econtact" value="<?php echo (isset($econtactinfo['Zipcode'])) ? $econtactinfo['Zipcode'] : ''; ?>" > </li>													
                                             
                                                
                                        </ol>    
                                    </li>
                                </ol>
                                    <p>
                                    <input type="button" id="btn_econtact" value="Edit" />
                                    <input type="submit" name="submit_emgContact" id="sbt_econtact" value="Save" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- emgContact -->
            


            </div> <!-- employee-details -->
 
            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        <?php //var_dump($_SESSION['']); ?>
        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->      
        <script type="text/javascript" src="../../js/employee/contact.js"></script>
    </body>
    
</html>

