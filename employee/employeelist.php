<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    dbName::mysql_db(0);
    $checkpage = new allowpage();
    $lock = new lock();
?>

    <?php include ($checkpage->root.'\include\header.php'); ?>

    </head>
    <body>
      
        <div id="wrapper">
            <?php include ($checkpage->root.'\include\dropdown.php'); ?>

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
                                        <input type="text" /></li>

                                    <li><label for="empsearch_id">Id</label>
                                        <input type="text" /> </li>

                                    <li><label for="empsearch_termination">Include</label>
                                        <select>
                                            <option value="1">Current Employees Only</option>
                                            <option value="2">Current and Past Employees</option>
                                            <option value="3">Past Employees Only</option>
                                        </select> </li>

                                    <li><label for="empsearch_supervisor_name">Supervisor Name</label>
                                    <input type="text" /></li>

                                    <li><label for="empsearch_job_title">Job Title</label>
                                        <select>
                                    <!-- Entry through database -->
                                        </select></li>

                                    <li><label for="empsearch_sub_unit">Sub Unit</label>
                                        <select>
                                        <!-- Through database-->
                                        </select>
                                    </li>
                                </ol>
                                <p>
                                    <input type="button" id="searchBtn" value="Search" name="_search" />
                                    <input type="button" class="reset" id="resetBtn" value="Reset" name="_reset" />                    
                                </p>
                                
                            </fieldset>
                            
                        </form>
                        
                    </div> <!-- inner -->

                </div> <!-- employee-information -->

                <div class="box noHeader" id="search-results">
                    <div class="inner">
                        <form method="post" action="/index.php/pim/deleteEmployees" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
                            <div class="top">      

                                <input type="button" name="btnAdd" value="Add" />
                                <input type="submit" class="delete" name="btnDelete" value="Delete" />

                             </div> <!-- top --> 

                            <div id="tableWrapper">
                                <table class="table hover" id="resultTable">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" style="width:5%">
                                                <input type="checkbox" name="chkSelectAll" value="" /></th>
                                            <th rowspan="1" style="width:5%" >
                                                <a href="" class="null">Id</a></th>
                                            <th rowspan="1" style="width:20%" >
                                                <a href="" class="null">Employee Name</a></th>
                                            <th rowspan="1" style="width:20%" class="header">   <a href="">Job Title</a></th>
                                            <th rowspan="1" style="width:15%" class="header">   <a href="">Sub Unit / Department</a></th>
                                            <th rowspan="1" style="width:25%" class="header">   <a href="">Supervisor</a></th>
                                        </tr>            
                                    </thead>
                                    <tbody>
                                    <?php
                                        $clas = 1;
                                        $sql = "SELECT `emp_id`,concat_ws(' ',`firstname`,`middlename`,`lastname`) AS `name` FROM `basic_info`";
                                        $result = $lock->run_query($sql);
                                        foreach($result AS $key=>$val){
                                    ?>
                                        <tr class="<?php echo ($clas % 2 == 0) ? 'even' : 'odd'; ?>">
                                            <td><input type="checkbox"></td>
                                            <td><?php echo $val['emp_id'] ?></td>
                                            <td><?php echo $val['name'] ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                        $clas++;
                                        }
                                    ?>  

                                
                                    </tbody>    
                                </table>
                            </div> <!-- tableWrapper -->
                        
                        </form> <!-- frmList_ohrmListComponent --> 
                                
                        
                    </div> <!-- inner -->
                        
                </div> <!-- search-results -->

                <!-- Confirmation box HTML: Begins -->
                <div class="modal hide" id="deleteConfModal">
                    <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>OrangeHRM - Confirmation Required</h3>
                </div>
                    <div class="modal-body">
                        <p>Delete records?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="Ok" />
                        <input type="button" class="btn reset" data-dismiss="modal" value="Cancel" />
                    </div>
                </div>
                <!-- Confirmation box HTML: Ends -->

            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
         <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->           
    </body>
    
</html>