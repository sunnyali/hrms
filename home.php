<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
    <head>

        <title>OrangeHRM</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                
        <link rel="shortcut icon" href="/webres_51935fa5eb1833.05057125/themes/default/images/favicon.ico" />
        
        <!-- Library CSS files -->
        <link href="css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="/webres_51935fa5eb1833.05057125/themes/default/css/tipTip.css" rel="stylesheet" type="text/css"/>
        <link href="/webres_51935fa5eb1833.05057125/themes/default/css/jquery/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css"/>
        <link href="/webres_51935fa5eb1833.05057125/themes/default/css/jquery/jquery.autocomplete.css" rel="stylesheet" type="text/css"/>
        
        <!-- Custom CSS files -->
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->        



    <link rel="stylesheet" type="text/css" media="all" href="/webres_51935fa5eb1833.05057125/orangehrmCorePlugin/css/ohrmWidgetSelectableGroupDropDown.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/webres_51935fa5eb1833.05057125/orangehrmCorePlugin/css/_ohrmList.css" />
</head>
    <body>
      
        <div id="wrapper">
            
            <div id="branding">
                <img src="/webres_51935fa5eb1833.05057125/themes/default/images/logo.png" width="283" height="56" alt="OrangeHRM"/>
                <a href="http://www.orangehrm.com/user-survey-registration.php" class="subscribe" target="_blank">Join OrangeHRM Community</a>
                <a href="#" id="welcome" class="panelTrigger">Welcome Admin</a>
                <div id="welcome-menu" class="panelContainer">
                    <ul>
                        <li><a href="/index.php/admin/changeUserPassword">Change Password</a></li>
                        <li><a href="/index.php/auth/logout">Logout</a></li>
                    </ul>
                </div>
                <a href="#" id="help" class="panelTrigger">Help & Training</a>
                <div id="help-menu" class="panelContainer">
                    <ul>
                        <li><a href="http://www.orangehrm.com/support-plans.php?utm_source=application_support&amp;utm_medium=app_url&amp;utm_campaign=orangeapp" target="_blank">Support</a></li>
                        <li><a href="http://www.orangehrm.com/training.php?utm_source=application_traning&amp;utm_medium=app_url&amp;utm_campaign=orangeapp" target="_blank">Training</a></li>
                        <li><a href="http://www.orangehrm.com/addon-plans.shtml?utm_source=application_addons&amp;utm_medium=app_url&amp;utm_campaign=orangeapp" target="_blank">Add-Ons</a></li>
                        <li><a href="http://www.orangehrm.com/customizations.php?utm_source=application_cus&amp;utm_medium=app_url&amp;utm_campaign=orangeapp" target="_blank">Customizations</a></li>
                        <li><a href="http://forum.orangehrm.com/" target="_blank">Forum</a></li>
                        <li><a href="http://blog.orangehrm.com/" target="_blank">Blog</a></li>
                        <li><a href="http://sourceforge.net/apps/mantisbt/orangehrm/view_all_bug_page.php" target="_blank">Bug Tracker</a></li>                        
                    </ul>
                </div>
            </div> <!-- branding -->      
            
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

        <script type="text/javascript">

            var employees_empsearch_employee_name = [];

            $(document).ready(function() {
            
                var nameField = $("#empsearch_employee_name_empName");
                var idStoreField = $("#empsearch_employee_name_empId");
                var typeHint = 'Type for hints...';
                var hintClass = 'inputFormatHint';
                var loadingMethod = 'ajax';
                var loadingHint = 'Loading';
            
                nameField.data('typeHint', typeHint);
                nameField.data('loadingHint', loadingHint);
                
                nameField.one('focus', function() {

                        if ($(this).hasClass(hintClass)) {
                            $(this).val("");
                            $(this).removeClass(hintClass);
                        }

                    });
                    
                if( loadingMethod != 'ajax'){
                    if (nameField.val() == '' || nameField.val() == typeHint) {
                        nameField.val(typeHint).addClass(hintClass);
                    }

                    

                    nameField.autocomplete(employees_empsearch_employee_name, {

                        formatItem: function(item) {
                            return $('<div/>').text(item.name).html();
                        },
                        formatResult: function(item) {
                            return item.name
                        }
                      ,matchContains:true
                        }).result(function(event, item) {
                            idStoreField.val(item.id);
                        }

                    );
                 }else{
                        var value = nameField.val().trim();
                        nameField.val(loadingHint).addClass('ac_loading');
                        $.ajax({
                               url: "/index.php/pim/getEmployeeListAjax",
                               data: "",
                               dataType: 'json',
                               success: function(employeeList){

                                     nameField.autocomplete(employeeList, {

                                                formatItem: function(item) {
                                                    return $('<div/>').text(item.name).html();
                                                },
                                                formatResult: function(item) {
                                                    return item.name
                                                }
                                                
                                                ,matchContains:true
                                            }).result(function(event, item) {
                                                idStoreField.val(item.id);
                                            }

                                        );
                                         nameField.removeClass('ac_loading'); 
                                        
                                         if(value==''){
                                            nameField.val(typeHint).addClass(hintClass);
                                         } else {
                                            nameField.val(value).addClass();
                                         }
                                    }
                             });
                 }
                
            }); // End of $(document).ready

                 
        </script>


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

<script type="text/javascript" src="/webres_51935fa5eb1833.05057125/orangehrmCorePlugin/js/_ohrmList.js"></script>


                    <script type="text/javascript">

                        var rootPath = '/';

                        $(document).ready(function() {
                            ohrmList_init();

                        });
                                              

</script>

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
<script type="text/javascript">

    $(document).ready(function() {
        
        var supervisors = [{"name":"Peter Mac Anderson","id":"6"},{"name":"Nancy-Ming Boucher","id":"4"},{"name":"Kevin Mathews","id":"1"},{"name":"Nina Patel","id":"12"},{"name":"John Smith","id":"7"},{"name":"Jacqueline White","id":"13"}];
        
        $('#btnDelete').attr('disabled', 'disabled');
        
        $("#ohrmList_chkSelectAll").click(function() {
            if($(":checkbox").length == 1) {
                $('#btnDelete').attr('disabled','disabled');
            }
            else {
                if($("#ohrmList_chkSelectAll").is(':checked')) {
                    $('#btnDelete').removeAttr('disabled');
                } else {
                    $('#btnDelete').attr('disabled','disabled');
                }
            }
        });
        
        $(':checkbox[name*="chkSelectRow[]"]').click(function() {
            if($(':checkbox[name*="chkSelectRow[]"]').is(':checked')) {
                $('#btnDelete').removeAttr('disabled');
            } else {
                $('#btnDelete').attr('disabled','disabled');
            }
        });

        // Handle hints
        if ($("#empsearch_id").val() == '') {
            $("#empsearch_id").val('Type Employee Id...')
            .addClass("inputFormatHint");
        }

        if ($("#empsearch_supervisor_name").val() == '') {
            $("#empsearch_supervisor_name").val('Type for hints...')
            .addClass("inputFormatHint");
        }

        $("#empsearch_id, #empsearch_supervisor_name").one('focus', function() {

            if ($(this).hasClass("inputFormatHint")) {
                $(this).val("");
                $(this).removeClass("inputFormatHint");
            }
        });

        $("#empsearch_supervisor_name").autocomplete(supervisors, {
            formatItem: function(item) {
                return $('<div/>').text(item.name).html();
            },
            formatResult: function(item) {
                return item.name
            }  
            ,matchContains:true
        }).result(function(event, item) {
        }
    );

        $('#searchBtn').click(function() {
            $("#empsearch_isSubmitted").val('yes');
            $('#search_form input.inputFormatHint').val('');
            $('#search_form input.ac_loading').val('');
            $('#search_form').submit();
        });

        $('#resetBtn').click(function(){
            $("#empsearch_isSubmitted").val('yes');
            $("#empsearch_employee_name_empName").val('');
            $("#empsearch_supervisor_name").val('');
            $("#empsearch_id").val('');
            $("#empsearch_job_title").val('0');
            $("#empsearch_employee_status").val('0');
            $("#empsearch_sub_unit").val('0');
            $("#empsearch_termination").val('1');
            $('#search_form').submit();
        });

        $('#btnAdd').click(function() {
            location.href = "/index.php/pim/addEmployee";
        });
        $('#btnDelete').click(function(){
            $('#frmList_ohrmListComponent').submit(function(){
                $('#deleteConfirmation').dialog('open');
                return false;
            });
        });

        /* Delete confirmation controls: Begin */
        $('#dialogDeleteBtn').click(function() {
            document.frmList_ohrmListComponent.submit();
        });
        /* Delete confirmation controls: End */
        
    }); //ready
    
    function submitPage(pageNo) {
        document.frmEmployeeSearch.pageNo.value = pageNo;
        document.frmEmployeeSearch.hdnAction.value = 'paging';
        $('#search_form input.inputFormatHint').val('');
        $('#search_form input.ac_loading').val('');
        $("#empsearch_isSubmitted").val('no');
        document.getElementById('search_form').submit();
    }   
</script>

            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
        <div id="footer">
            OrangeHRM Live ver 3.0.1 &copy; <a href="http://www.orangehrm.com" target="_blank">OrangeHRM</a>. 2005 - 2013 All rights reserved.
        </div> <!-- footer -->        
        
        
 
        <script type="text/javascript">

            $(document).ready(function() {                            
                
                /* Enabling tooltips */
                $(".tiptip").tipTip();

                /* Toggling header menus */
                $("#welcome").click(function () {
                    $("#welcome-menu").slideToggle("fast");
                    $(this).toggleClass("activated-welcome");
                    return false;
                });
                
                $("#help").click(function () {
                    $("#help-menu").slideToggle("fast");
                    $(this).toggleClass("activated-help");
                    return false;
                });
                
                $('.panelTrigger').outside('click', function() {
                    $('.panelContainer').stop(true, true).slideUp('fast');
                });                

                /* 
                 * Button hovering effects 
                 * Note: we are not using pure css using :hover because :hover applies to even disabled elements.
                 * The pseudo class :enabled is not supported in IE < 9.
                 */                
                $(document).on({
                    mouseenter: function () {
                        $(this).addClass('hover');                        
                    },
                    mouseleave: function () {
                        $(this).removeClass('hover');                        
                    }

                }, 'input[type=button], input[type=submit], input[type=reset]'); 
  
                /* Fading out main messages */
                $(document).on({
                    click: function() {
                        $(this).parent('div.message').fadeOut("slow");
                    }
                }, '.message a.messageCloseButton');                

                /* Toggling search form: Begins */
                //$(".toggableForm .inner").hide(); // Disabling this makes search forms to be expanded by default.

                $(".toggableForm .toggle").click(function () {
                    $(".toggableForm .inner").slideToggle('slow', function() {
                        if($(this).is(':hidden')) {
                            $('.toggableForm .tiptip').tipTip({content:'Expand for Options'});
                        } else {
                            $('.toggableForm .tiptip').tipTip({content:'Hide Options'});
                        }
                    });
                    $(this).toggleClass("activated");
                });
                /* Toggling search form: Ends */

                /* Enabling/disabling form fields: Begin */
                
                $('form.clickToEditForm input, form.clickToEditForm select, form.clickToEditForm textarea').attr('disabled', 'disabled');
                $('form.clickToEditForm input.calendar').datepicker('disable');
                $('form.clickToEditForm input[type=button]').removeAttr('disabled');
                
                $('form input.editButton').click(function(){
                    $('form.clickToEditForm input, form.clickToEditForm select, form.clickToEditForm textarea').removeAttr('disabled');
                    $('form.clickToEditForm input.calendar').datepicker('enable');
                });
                
                /* Enabling/disabling form fields: End */
                
            });
            
        </script>        

    </body>
    
</html>