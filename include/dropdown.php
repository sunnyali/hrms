<?php
     require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();

?>
<div class="menu" id="menu">
    
    <ul>
        <li><img class="cursor" src="<?php echo $checkpage->web; ?>/images/logo/logo1.jpg" width="40" height="40" alt="Sunrise Staffing"/></li>            
        
        <li data-menu="1"><a href="#" class=""><b>Home</b></a> </li>            
        
        <li data-menu="2"><a href="#" class="firstLevelMenu"><b>Employee</b></a>
            
            <ul>                
                <li data-menu="2.1"><a href="#" class="arrow">Configuration</a>
                    <ul>
                        <li><a href="#" >Optional Fields</a></li>
                            <li><a href="#" >Custom Fields</a></li>
                            <li><a href="#" >Data Import</a></li>
                                                                
                    </ul> <!-- third level -->                        
                </li>  

                <li data-menu="2.2"><a href="#" >Employee List</a> </li>   
                    
                <li data-menu="2.3"><a href="<?php echo $checkpage->web."/employee/add.php" ?>" >Add Employee</a> </li>   
                    
                <li data-menu="2.4"><a href="#" >Reports</a> </li>   
                                                
            </ul> <!-- second level -->                        
        </li>
                    
        <li data-menu="3" class="_current"><a href="#" class="firstLevelMenu"><b>Announcements</b></a>
            <ul>
                <li data-menu="3.1" class="_selected"><a href="#" >Documents</a> </li>   
                    
                <li data-menu="3.2"><a href="#" >News</a> </li>   
                    
                                                
            </ul> <!-- second level -->                        
        </li>
    
    </ul> <!-- first level -->
    
</div> <!-- menu -->