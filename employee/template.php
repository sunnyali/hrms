<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();
    dbName::mysql_db(0);
    $lock = new lock();
    
 
		

    if(isset($sucess)) {
        header("Location:$checkpage->phpself?emid=$emp_id&sucess=true&msg=$smsg");
        die();
    }
    else if(isset($error)) {
        header("Location:$checkpage->phpself?emid=$emp_id&fail=true&msg=$fmsg");
        die();
    }
    else if(isset($nothing)) {
        header("Location:$checkpage->phpselfemid=$emp_id");
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
	            	<h1><div><?php echo $_GET['msg']; ?>&nbsp;Update Successfully! </div> </h1>
                <?php } ?>
            </center>
            
                  
            <div class="box pimPane" id="employee-details">
                
                
            <div id="sidebar">

                <div id="profile-pic">
                
            <h1>Owais Ali baig</h1>
              <div class="imageHolder">

              <a href="/index.php/pim/viewPhotograph/empNumber/0014" title="Change Photo" class="tiptip">

                <img alt="Employee Photo" src="/index.php/pim/viewPhoto/empNumber/0014" border="0" id="empPic" 
                 width="200" height="200"/>
              </a>

              </div>    
            </div> <!-- profile-pic -->        
                    
              <?php include ($checkpage->root.'\include\profilemenu.php'); ?>  

            </div> <!-- sidebar -->
          
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
                                                <input type="text"  value="<?php echo $passport_info['passportno'];?>" class="ed_passport" name="passportno" class="editable" > </li>
                                            <li>
                                                <label>Expire Date:	</label>
                                                <input type="text" value="<?php echo $passport_info['passportexp'];?>" disabled name="passportexp"  > </li>
                                            <li>
                                                <label>Picture:</label>
                                                <input type="text" value="<?php echo $passport_info['passportpic'];?>" class="ed_passport" name="passportpic"  > </li>
                                           
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
        <?php var_dump($passport_info); ?>
        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->      
        <script type="text/javascript" src="../../js/employee/profile.js"></script>
    </body>
    
</html>

