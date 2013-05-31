<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();

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
                  
                <div class="box searchForm toggableForm" id="employee-information">
                    <div class="head">
                        <h1>Employee Information</h1>
                    </div>
                    <div class="inner">
                        <form method="post" action="">
                            <fieldset>
                                <ol>
                                    <li><label for="empsearch_employee_name">Employee Name</label>

                                        <input type="text" id="empsearch_employee_name_empName" />
                                    </li>

                                    <li><label for="empsearch_termination">Include</label>
                                        <select id="empsearch_termination">
                                            <option value="1">Current Employees Only</option>
                                            <option value="2">Past Employees Only</option>
                                        </select>
                                    </li>
                                </ol>
                                
                                <input type="hidden" id="pageNo" />
                                <input type="hidden" id="hdnAction" />                 
                                
                                <p>
                                    <input type="button" value="Search" />
                                    <input type="button" class="reset" value="Reset" />                    
                                </p>
                                
                            </fieldset>
                            
                        </form>
                        
                    </div> <!-- inner -->
                    
                </div> <!-- employee-information -->

            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->      
        
    </body>
    
</html>