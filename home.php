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
            <?php include ($checkpage->root.'\hrms\include\dropdown.php'); ?>

            <div id="content">
            <div class="box searchForm toggableForm" id="employee-information">
                <div class="head">
                    <h1>Employee Information</h1>
                </div>
                <div class="inner">
                    <form id="search_form" name="frmEmployeeSearch" method="post" action="/index.php/pim/viewEmployeeList">

                        <fieldset>
                            
                            <ol>
                                <li><label for="empsearch_employee_name">Employee Name</label>
              

            <input type="text" name="empsearch[employee_name][empName]" value="" id="empsearch_employee_name_empName" />

            <input type="hidden" name="empsearch[employee_name][empId]" id="empsearch_employee_name_empId" value="" />

                    


            </li>
            <li><label for="empsearch_id">Id</label>
              <input type="text" name="empsearch[id]" id="empsearch_id" />
            </li>
            <li><label for="empsearch_employee_status">Employment Status</label>
              <select name="empsearch[employee_status]" id="empsearch_employee_status">
            <option value="0">All</option>
            <option value="1">Freelance</option>
            <option value="5">Full time Contract</option>
            <option value="3">Full-Time Permernent</option>
            <option value="4">Full-Time Probation</option>
            <option value="2">Part-Time Contract</option>
            <option value="6">Part-Time Internship</option>
            </select>
            </li>
            <li><label for="empsearch_termination">Include</label>
              <select name="empsearch[termination]" id="empsearch_termination">
            <option value="1">Current Employees Only</option>
            <option value="2">Current and Past Employees</option>
            <option value="3">Past Employees Only</option>
            </select>
            </li>
            <li><label for="empsearch_supervisor_name">Supervisor Name</label>
              <input type="text" name="empsearch[supervisor_name]" id="empsearch_supervisor_name" />
            </li>
            <li><label for="empsearch_job_title">Job Title</label>
              <select name="empsearch[job_title]" id="empsearch_job_title">
            <option value="0">All</option>
            <option value="10">Accountant</option>
            <option value="6">Audit Trainee</option>
            <option value="1">Cheif Executive Officer</option>
            <option value="14">Chief Operating Officer</option>
            <option value="5">Controller</option>
            <option value="13">Finance Controller</option>
            <option value="4">Finance Manager</option>
            <option value="3">HR Admin</option>
            <option value="11">HR Manager</option>
            <option value="7">Industrial Engineer</option>
            <option value="15">IT Director</option>
            <option value="2">IT Manager</option>
            <option value="8">Pre-Sales Executive</option>
            <option value="9">Program Manager</option>
            <option value="16">Sales Director</option>
            <option value="12">Sales Manager</option>
            </select>
            </li>
            <li><label for="empsearch_sub_unit">Sub Unit</label>
              <select name="empsearch[sub_unit]" id="empsearch_sub_unit">
            <option value="0">All</option>
            <option value="2">Sub Unit</option>
            <option value="4">Engineering</option>
            <option value="5">Finance</option>
            <option value="6">Sales</option>
            <option value="7">Administration</option>
            <option value="8">IT</option>
            </select>
            </li>
            <li><label for="empsearch_location">Location</label>
              <select class="selectableGroupWidget" name="empsearch[location]" id="empsearch_location">
            <option value="-1">All</option>
            <option class="optiongroup" value="6,-1">&nbsp;&nbsp;Ireland</option>
            <option value="6">&nbsp;&nbsp;&nbsp;&nbsp;ASC_Ireland</option>
            <option class="optiongroup" value="7,-1">&nbsp;&nbsp;Singapore</option>
            <option value="7">&nbsp;&nbsp;&nbsp;&nbsp;ASC_SG</option>
            <option class="optiongroup" value="5,-1">&nbsp;&nbsp;United Kingdom</option>
            <option value="5">&nbsp;&nbsp;&nbsp;&nbsp;ASC_London</option>
            <option class="optiongroup" value="4,-1">&nbsp;&nbsp;United States</option>
            <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;HQ</option>
            </select>
            <input type="hidden" name="empsearch[isSubmitted]" id="empsearch_isSubmitted" />
            <input type="hidden" name="empsearch[_csrf_token]" value="5a1859f28a89e39b9d15f65486058b15" id="empsearch__csrf_token" /></li>
                            </ol>
                            
                            <input type="hidden" name="pageNo" id="pageNo" value="" />
                            <input type="hidden" name="hdnAction" id="hdnAction" value="search" />                 
                            
                            <p>
                                <input type="button" id="searchBtn" value="Search" name="_search" />
                                <input type="button" class="reset" id="resetBtn" value="Reset" name="_reset" />                    
                            </p>
                            
                        </fieldset>
                        
                    </form>
                    
                </div> <!-- inner -->

                <a href="#" class="toggle tiptip" title="Hide Options">&gt;</a>
                
            </div> <!-- employee-information -->

<div class="box noHeader" id="search-results">
    
        
    <div class="inner">
    

                
            
    <form method="post" action="/index.php/pim/deleteEmployees" name="frmList_ohrmListComponent" id="frmList_ohrmListComponent">
        
        
 <div class="top">          
        

        <input type="button" class="" id="btnAdd" name="btnAdd" value="Add" />
<input type="submit" class="delete" id="btnDelete" name="btnDelete" value="Delete" data-toggle="modal" data-target="#deleteConfModal" />

 </div> <!-- top --> 

         

        


         
        <div id="helpText" class="helpText"></div>

        <div id="scrollWrapper">
            <div id="scrollContainer">
            </div>
        </div>        
        <div id="tableWrapper">
        <table class="table hover" id="resultTable">
            
                                <thead>
                <tr><th rowspan="1" class="checkbox-col"><input type="checkbox" id="ohrmList_chkSelectAll" name="chkSelectAll" value="" /></th>
<th rowspan="1" style="width:5%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=employeeId&amp;sortOrder=ASC" class="null">Id</a></th>
<th rowspan="1" style="width:13%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=firstMiddleName&amp;sortOrder=ASC" class="null">First (&amp; Middle) Name</a></th>
<th rowspan="1" style="width:10%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=lastName&amp;sortOrder=ASC" class="null">Last Name</a></th>
<th rowspan="1" style="width:20%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=jobTitle&amp;sortOrder=ASC" class="null">Job Title</a></th>
<th rowspan="1" style="width:15%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=employeeStatus&amp;sortOrder=ASC" class="null">Employment Status</a></th>
<th rowspan="1" style="width:15%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=subDivision&amp;sortOrder=ASC" class="null">Sub Unit</a></th>
<th rowspan="1" style="width:25%" class="header"><a href="http://demo.orangehrmlive.com/index.php/pim/viewEmployeeList?sortField=supervisor&amp;sortOrder=ASC" class="null">Supervisor</a></th>
</tr>            
                            </thead>

            <tbody>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_14" name="chkSelectRow[]" value="14" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/14">0014</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/14">Eka Banyu</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/14">Aji</a></td>
                                                    <td class="left" ></td>
                                                    <td class="left" ></td>
                                                    <td class="left" ></td>
                                                    <td class="left" ></td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_6" name="chkSelectRow[]" value="6" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/6">0006</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/6">Peter Mac</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/6">Anderson</a></td>
                                                    <td class="left" >Finance Controller</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Finance</td>
                                                    <td class="left" >John  Smith</td>
                                            </tr>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_4" name="chkSelectRow[]" value="4" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/4">0004</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/4">Nancy-Ming</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/4">Boucher</a></td>
                                                    <td class="left" >Finance Manager</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Finance</td>
                                                    <td class="left" >Peter  Mac  Anderson</td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_8" name="chkSelectRow[]" value="8" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/8">0061</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/8">Hannah</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/8">Flores</a></td>
                                                    <td class="left" >Pre-Sales Executive</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Sales</td>
                                                    <td class="left" >Nina  Patel</td>
                                            </tr>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_2" name="chkSelectRow[]" value="2" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/2">0002</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/2">Russel</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/2">Hamilton</a></td>
                                                    <td class="left" >HR Admin</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Administration</td>
                                                    <td class="left" >Jacqueline  White</td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_1" name="chkSelectRow[]" value="1" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/1">0001</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/1">Kevin</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/1">Mathews</a></td>
                                                    <td class="left" >IT Director</td>
                                                    <td class="left" >Part-Time Contract</td>
                                                    <td class="left" >IT</td>
                                                    <td class="left" >John  Smith</td>
                                            </tr>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_5" name="chkSelectRow[]" value="5" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/5">0005</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/5">Anthony</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/5">Nolan</a></td>
                                                    <td class="left" >Industrial Engineer</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Engineering</td>
                                                    <td class="left" >Kevin  Mathews</td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_9" name="chkSelectRow[]" value="9" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/9">0045</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/9">Ryan</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/9">Parker</a></td>
                                                    <td class="left" >Chief Operating Officer</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Administration</td>
                                                    <td class="left" >John  Smith</td>
                                            </tr>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_12" name="chkSelectRow[]" value="12" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/12">0012</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/12">Nina</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/12">Patel</a></td>
                                                    <td class="left" >Sales Director</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Sales</td>
                                                    <td class="left" >John  Smith</td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_10" name="chkSelectRow[]" value="10" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/10">0010</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/10">Nicky</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/10">Silverstone</a></td>
                                                    <td class="left" >Program Manager</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >IT</td>
                                                    <td class="left" >Kevin  Mathews</td>
                                            </tr>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_7" name="chkSelectRow[]" value="7" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/7">0007</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/7">John</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/7">Smith</a></td>
                                                    <td class="left" >Cheif Executive Officer</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Administration</td>
                                                    <td class="left" ></td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_15" name="chkSelectRow[]" value="15" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/15">0015</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/15">Betty</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/15">Smith</a></td>
                                                    <td class="left" ></td>
                                                    <td class="left" ></td>
                                                    <td class="left" ></td>
                                                    <td class="left" ></td>
                                            </tr>
                                            <tr class="odd">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_11" name="chkSelectRow[]" value="11" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/11">0011</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/11">Jennifer</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/11">Smith</a></td>
                                                    <td class="left" >Audit Trainee</td>
                                                    <td class="left" >Full time Contract</td>
                                                    <td class="left" >Finance</td>
                                                    <td class="left" >Nancy-Ming  Boucher</td>
                                            </tr>
                                            <tr class="even">
                    <td><input type="checkbox" id="ohrmList_chkSelectRecord_13" name="chkSelectRow[]" value="13" /></td>                                <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/13">0013</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/13">Jacqueline</a></td>
                                                    <td class="left" ><a href="/index.php/pim/viewPersonalDetails/empNumber/13">White</a></td>
                                                    <td class="left" >HR Manager</td>
                                                    <td class="left" >Full-Time Permernent</td>
                                                    <td class="left" >Administration</td>
                                                    <td class="left" >John  Smith</td>
                                            </tr>
                                </tbody>
                            </table>
        </div> <!-- tableWrapper -->
        <div class="bottom"><p>

            </div>
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
        
        <div id="footer">
            OrangeHRM Live ver 3.0.1 &copy; <a href="http://www.orangehrm.com" target="_blank">OrangeHRM</a>. 2005 - 2013 All rights reserved.
        </div> <!-- footer -->        
    </body>
    
</html>