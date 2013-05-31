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
                <div class="box">

                    <div class="head">
                        <h1>Add Employee</h1>
                    </div>

                    <div class="inner">
                        <form method="post" enctype="multipart/form-data">
                            <fieldset>
                                <ol>
                                    <li class="nameContainer"><label class="hasTopFieldHelp">Full Name</label>
                                        <ol class="fieldsInLine">
                                            <li>
                                                <div class="fieldDescription"><em>*</em> First Name</div>
                                                <input class="" maxlength="30" type="text" name="firstName">
                                            </li>
                                            <li>
                                                <div class="fieldDescription">Middle Name</div>
                                                <input class="" maxlength="30" type="text" name="middleName">
                                            </li>
                                            <li>
                                                <div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input class="" maxlength="30" type="text" name="lastName">
                                            </li>
                                        </ol>
                                    </li>
                                    <li><label for="photofile">Photograph</label>
                                        <input class="" type="file" name="photofile"><label class="fieldHelpBottom">Accepts jpg, .png, .gif up to 1MB. Recommended dimensions: 200px X 200px</label>
                                    </li>
                                    <li class="required">
                                        <em>*</em> Required field
                                    </li>
                                </ol>
                                <p>
                                    <input type="button" class="" id="btnSave" value="Save">
                                </p>
                            </fieldset>
                        </form>
                    </div>

                    
                </div>
            </div> <!-- content -->
          
        </div> <!-- wrapper -->
        
        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->      
        
    </body>
    
</html>