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
            
            <input type="hidden" id="select_menu" value="2.1" />      
            <?php //include ($checkpage->web.'\include\logo.php'); ?>
            
            <!-- include Drop down Menu-->
            <?php include ($checkpage->root.'\include\dropdown.php'); ?>
            <!-- Drop down Menu End-->
            <div id="content">
                  This is our Index Page We will Customize it Later
            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->
        
        <?php var_dump($_SESSION); ?>
    </body>
    
</html>