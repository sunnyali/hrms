<?php
     require_once ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
     $checkpage = new allowpage();

?>
<div class="menu" id="menu">
    
    <ul>
        <li><img class="cursor" src="<?php echo $checkpage->web; ?>/images/logo/logo1.jpg" width="40" height="40" alt="Sunrise Staffing"/></li>            
        
        <li><a href="<?php echo $checkpage->web."/index.php" ?>" class=""><b>Home</b></a> </li>            
        
        <li><a href="#" class="firstLevelMenu"><b>Employee</b></a>
            
            <ul>                
                
                <li><a href="<?php echo $checkpage->web."/employee/employeelist.php" ?>" >Employee List</a> </li>   
                    
                <li><a href="<?php echo $checkpage->web."/employee/add.php" ?>" >Add Employee</a> </li>   
                                                
            </ul> <!-- second level -->                        
        </li>
    
        <li><a href="<?php echo $checkpage->web."/include/logout.php" ?>" class=""><b>Log Out</b></a> </li>            
    </ul> <!-- first level -->
    
</div> <!-- menu -->