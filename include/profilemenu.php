<div id="sidebar">
    <div id="profile-pic">
        <h1><?php echo implode(' ',array($basic_info['firstname'],$basic_info['middlename'],$basic_info['lastname'])); ?></h1>
        <div class="imageHolder">
            <a href="../../images/extra/default_emp_pic.jpg" title="Change Photo" class="tiptip">
                <img alt="Employee Photo" src="../../images/extra/default_emp_pic.jpg" border="0" id="empPic" 
                 width="200" height="200"/>
              </a>
        </div>    
    </div> 

    <ul id="sidenav">
        <li><a href="<?php echo $checkpage->web."/employee/profile/profile.php?emid=$emp_id"; ?>">Personal Details</a></li>
        <li><a href="<?php echo $checkpage->web."/employee/profile/contact.php?emid=$emp_id"; ?>">Contact/Emergency Contact</a></li>
        <li><a href="">Emergency Contacts</a></li>
        <li><a href="">Dependents</a></li>
        <li><a href="">Immigration</a></li>
        <li><a href="">Job</a></li>
        <li><a href="">Salary</a></li>
        <li><a href="">Report-to</a></li>
        <li><a href="">Qualifications</a></li>
        <li><a href="">Memberships</a></li>
        <li><a href="">Training Details</a></li>
    </ul>
</div>