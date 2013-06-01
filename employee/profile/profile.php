<?php
     require ($_SERVER['DOCUMENT_ROOT'].'/hrms/classes/__autoload.php');
    $checkpage = new allowpage();
    dbName::mysql_db(0);
    $lock = new lock();
    
    if(isset($sucess)) {
        header("Location:$checkpage->phpself?sucess=true");
        die();
    }
    else if(isset($error)) {
        header("Location:$checkpage->phpself?fail=true&msg=$fmsg");
        die();
    }
    else if(isset($nothing)) {
        header("Location:$checkpage->phpself");
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
                    
                <ul id="sidenav">
                    
                                <li class="selected"><a href="/index.php/pim/viewPersonalDetails/empNumber/0014">Personal Details</a></li>
                    
                                <li><a href="/index.php/pim/contactDetails/empNumber/0014">Contact Details</a></li>
                            
                            
                        <li><a href="/index.php/pim/viewEmergencyContacts/empNumber/0014">Emergency Contacts</a></li>
                            
                            
                        <li><a href="/index.php/pim/viewDependents/empNumber/0014">Dependents</a></li>
                            
                            
                        <li><a href="/index.php/pim/viewImmigration/empNumber/0014">Immigration</a></li>
                            
                            
                        <li><a href="/index.php/pim/viewJobDetails/empNumber/0014">Job</a></li>
                            
                    
                            
                        <li><a href="/index.php/pim/viewSalaryList/empNumber/0014">Salary</a></li>
                            
                            
                            
                        <li><a href="/index.php/pim/viewReportToDetails/empNumber/0014">Report-to</a></li>
                            
                    
                            
                        <li><a href="/index.php/pim/viewQualifications/empNumber/0014">Qualifications</a></li>
                            
                    
                            
                        <li><a href="/index.php/pim/viewMemberships/empNumber/0014">Memberships</a></li>
                        <li >
                                <a href="/index.php/training/employeeViewTraining/empNumber/0014">
                                    Training Details                    </a></li>
                                    </ul>

            </div> <!-- sidebar -->
                
                <div class="personalDetails" id="pdMainContainer">
                    
                    <div class="head">
                        <h1>Personal Details</h1>
                    </div> <!-- head -->
                
                    <div class="inner">

                        
                        



                        <form id="frmEmpPersonalDetails" method="post" action="/index.php/pim/viewPersonalDetails">

                            <input type="hidden" name="personal[_csrf_token]" value="286f8a3e5448dcc999e24cf23ef9598a" id="personal__csrf_token" />                <input value="14" type="hidden" name="personal[txtEmpID]" id="personal_txtEmpID" />
                            <fieldset>
                                <!--
                                <div class="helpLabelContainer">
                                    <div><label>First Name</label></div>
                                    <div><label>Middle Name</label></div>
                                    <div><label>Last Name</label></div>
                                </div>
                                -->
                                <ol>
                                    <li class="line nameContainer">
                                        <label for="Full_Name" class="hasTopFieldHelp">Full Name</label>
                                        <ol class="fieldsInLine">
                                            <li>
                                                <div class="fieldDescription"><em>*</em> First Name</div>
                                                <input value="Owais" type="text" name="personal[txtEmpFirstName]" class="block default editable" maxlength="30" title="First Name" id="personal_txtEmpFirstName" />                                </li>
                                            <li>
                                                <div class="fieldDescription">Middle Name</div>
                                                <input value="Ali" type="text" name="personal[txtEmpMiddleName]" class="block default editable" maxlength="30" title="Middle Name" id="personal_txtEmpMiddleName" />                                </li>
                                            <li>
                                                <div class="fieldDescription"><em>*</em> Last Name</div>
                                                <input value="baig" type="text" name="personal[txtEmpLastName]" class="block default editable" maxlength="30" title="Last Name" id="personal_txtEmpLastName" />                                </li>
                                        </ol>    
                                    </li>
                                </ol>
                                <ol>
                                    <li>
                                        <label for="personal_txtEmployeeId">Employee Id</label>
                                        <input value="0014" type="text" name="personal[txtEmployeeId]" maxlength="10" class="editable" id="personal_txtEmployeeId" />                        </li>
                                    <li>
                                        <label for="personal_txtOtherID">Other Id</label>
                                        <input value="" type="text" name="personal[txtOtherID]" maxlength="30" class="editable" id="personal_txtOtherID" />                        </li>
                                    <li class="long">
                                        <label for="personal_txtLicenNo">Driver's License Number</label>
                                        <input value="" type="text" name="personal[txtLicenNo]" maxlength="30" class="editable" id="personal_txtLicenNo" />                        </li>
                                    <li>
                                        <label for="personal_txtLicExpDate">License Expiry Date</label>
                                        <input id="personal_txtLicExpDate" type="text" name="personal[txtLicExpDate]" class="calendar editable calendar" />                         </li>
                                                                                
                                </ol>
                                <ol>
                                    <li class="radio">
                                        <label for="personal_optGender">Gender</label>
                                        <ul class="radio_list"><li><input name="personal[optGender]" type="radio" value="1" id="personal_optGender_1" class="editable" />&nbsp;<label for="personal_optGender_1">Male</label></li>
            <li><input name="personal[optGender]" type="radio" value="2" id="personal_optGender_2" class="editable" />&nbsp;<label for="personal_optGender_2">Female</label></li></ul>                        </li>
                                    <li>
                                        <label for="personal_cmbMarital">Marital Status</label>
                                        <select name="personal[cmbMarital]" class="editable" id="personal_cmbMarital">
            <option value="" selected="selected">-- Select --</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Other">Other</option>
            </select>                        </li>
                                    <li class="new">
                                        <label for="personal_cmbNation">Nationality</label>
                                        <select name="personal[cmbNation]" class="editable" id="personal_cmbNation">
            <option value="0">-- Select --</option>
            <option value="1">Afghan</option>
            <option value="2">Albanian</option>
            <option value="3">Algerian</option>
            <option value="4">American</option>
            <option value="5">Andorran</option>
            <option value="6">Angolan</option>
            <option value="7">Antiguans</option>
            <option value="8">Argentinean</option>
            <option value="9">Armenian</option>
            <option value="10">Australian</option>
            <option value="11">Austrian</option>
            <option value="12">Azerbaijani</option>
            <option value="13">Bahamian</option>
            <option value="14">Bahraini</option>
            <option value="15">Bangladeshi</option>
            <option value="16">Barbadian</option>
            <option value="17">Barbudans</option>
            <option value="18">Batswana</option>
            <option value="19">Belarusian</option>
            <option value="20">Belgian</option>
            <option value="21">Belizean</option>
            <option value="22">Beninese</option>
            <option value="23">Bhutanese</option>
            <option value="24">Bolivian</option>
            <option value="25">Bosnian</option>
            <option value="26">Brazilian</option>
            <option value="27">British</option>
            <option value="28">Bruneian</option>
            <option value="29">Bulgarian</option>
            <option value="30">Burkinabe</option>
            <option value="31">Burmese</option>
            <option value="32">Burundian</option>
            <option value="33">Cambodian</option>
            <option value="34">Cameroonian</option>
            <option value="35">Canadian</option>
            <option value="36">Cape Verdean</option>
            <option value="37">Central African</option>
            <option value="38">Chadian</option>
            <option value="39">Chilean</option>
            <option value="40">Chinese</option>
            <option value="41">Colombian</option>
            <option value="42">Comoran</option>
            <option value="43">Congolese</option>
            <option value="44">Costa Rican</option>
            <option value="45">Croatian</option>
            <option value="46">Cuban</option>
            <option value="47">Cypriot</option>
            <option value="48">Czech</option>
            <option value="49">Danish</option>
            <option value="50">Djibouti</option>
            <option value="51">Dominican</option>
            <option value="52">Dutch</option>
            <option value="53">East Timorese</option>
            <option value="54">Ecuadorean</option>
            <option value="55">Egyptian</option>
            <option value="56">Emirian</option>
            <option value="57">Equatorial Guinean</option>
            <option value="58">Eritrean</option>
            <option value="59">Estonian</option>
            <option value="60">Ethiopian</option>
            <option value="61">Fijian</option>
            <option value="62">Filipino</option>
            <option value="63">Finnish</option>
            <option value="64">French</option>
            <option value="65">Gabonese</option>
            <option value="66">Gambian</option>
            <option value="67">Georgian</option>
            <option value="68">German</option>
            <option value="69">Ghanaian</option>
            <option value="70">Greek</option>
            <option value="71">Grenadian</option>
            <option value="72">Guatemalan</option>
            <option value="73">Guinea-Bissauan</option>
            <option value="74">Guinean</option>
            <option value="75">Guyanese</option>
            <option value="76">Haitian</option>
            <option value="77">Herzegovinian</option>
            <option value="78">Honduran</option>
            <option value="79">Hungarian</option>
            <option value="80">I-Kiribati</option>
            <option value="81">Icelander</option>
            <option value="82">Indian</option>
            <option value="83">Indonesian</option>
            <option value="84">Iranian</option>
            <option value="85">Iraqi</option>
            <option value="86">Irish</option>
            <option value="87">Israeli</option>
            <option value="88">Italian</option>
            <option value="89">Ivorian</option>
            <option value="90">Jamaican</option>
            <option value="91">Japanese</option>
            <option value="92">Jordanian</option>
            <option value="93">Kazakhstani</option>
            <option value="94">Kenyan</option>
            <option value="95">Kittian and Nevisian</option>
            <option value="96">Kuwaiti</option>
            <option value="97">Kyrgyz</option>
            <option value="98">Laotian</option>
            <option value="99">Latvian</option>
            <option value="100">Lebanese</option>
            <option value="101">Liberian</option>
            <option value="102">Libyan</option>
            <option value="103">Liechtensteiner</option>
            <option value="104">Lithuanian</option>
            <option value="105">Luxembourger</option>
            <option value="106">Macedonian</option>
            <option value="107">Malagasy</option>
            <option value="108">Malawian</option>
            <option value="109">Malaysian</option>
            <option value="110">Maldivan</option>
            <option value="111">Malian</option>
            <option value="112">Maltese</option>
            <option value="113">Marshallese</option>
            <option value="114">Mauritanian</option>
            <option value="115">Mauritian</option>
            <option value="116">Mexican</option>
            <option value="117">Micronesian</option>
            <option value="118">Moldovan</option>
            <option value="119">Monacan</option>
            <option value="120">Mongolian</option>
            <option value="121">Moroccan</option>
            <option value="122">Mosotho</option>
            <option value="123">Motswana</option>
            <option value="124">Mozambican</option>
            <option value="125">Namibian</option>
            <option value="126">Nauruan</option>
            <option value="127">Nepalese</option>
            <option value="128">New Zealander</option>
            <option value="129">Nicaraguan</option>
            <option value="130">Nigerian</option>
            <option value="131">Nigerien</option>
            <option value="132">North Korean</option>
            <option value="133">Northern Irish</option>
            <option value="134">Norwegian</option>
            <option value="135">Omani</option>
            <option value="136">Pakistani</option>
            <option value="137">Palauan</option>
            <option value="138">Panamanian</option>
            <option value="139">Papua New Guinean</option>
            <option value="140">Paraguayan</option>
            <option value="141">Peruvian</option>
            <option value="142">Polish</option>
            <option value="143">Portuguese</option>
            <option value="144">Qatari</option>
            <option value="145">Romanian</option>
            <option value="146">Russian</option>
            <option value="147">Rwandan</option>
            <option value="148">Saint Lucian</option>
            <option value="149">Salvadoran</option>
            <option value="150">Samoan</option>
            <option value="151">San Marinese</option>
            <option value="152">Sao Tomean</option>
            <option value="153">Saudi</option>
            <option value="154">Scottish</option>
            <option value="155">Senegalese</option>
            <option value="156">Serbian</option>
            <option value="157">Seychellois</option>
            <option value="158">Sierra Leonean</option>
            <option value="159">Singaporean</option>
            <option value="160">Slovakian</option>
            <option value="161">Slovenian</option>
            <option value="162">Solomon Islander</option>
            <option value="163">Somali</option>
            <option value="164">South African</option>
            <option value="165">South Korean</option>
            <option value="166">Spanish</option>
            <option value="167">Sri Lankan</option>
            <option value="168">Sudanese</option>
            <option value="169">Surinamer</option>
            <option value="170">Swazi</option>
            <option value="171">Swedish</option>
            <option value="172">Swiss</option>
            <option value="173">Syrian</option>
            <option value="174">Taiwanese</option>
            <option value="175">Tajik</option>
            <option value="176">Tanzanian</option>
            <option value="177">Thai</option>
            <option value="178">Togolese</option>
            <option value="179">Tongan</option>
            <option value="180">Trinidadian or Tobagonian</option>
            <option value="181">Tunisian</option>
            <option value="182">Turkish</option>
            <option value="183">Tuvaluan</option>
            <option value="184">Ugandan</option>
            <option value="185">Ukrainian</option>
            <option value="186">Uruguayan</option>
            <option value="187">Uzbekistani</option>
            <option value="188">Venezuelan</option>
            <option value="189">Vietnamese</option>
            <option value="190">Welsh</option>
            <option value="191">Yemenite</option>
            <option value="192">Zambian</option>
            <option value="193">Zimbabwean</option>
            </select>                        </li>
                                    <li>
                                        <label for="personal_DOB">Date of Birth</label>
                                        <input id="personal_DOB" type="text" name="personal[DOB]" class="editable calendar" />                         </li>
                                                            <li class="required new">
                                        <em>*</em> Required field                        </li>
                                                        </ol>    
                                                        

                                                    <p><input type="button" id="btnSave" value="Edit" /></p>
                                
                            </fieldset>
                        </form>

                        
                    </div> <!-- inner -->
                    
                </div> <!-- pdMainContainer -->

                
                
                


            <a name="attachments"></a>

            <div id="addPaneAttachments">
                <div class="head" id="saveHeading">
                    <h1>Add Attachment</h1>
                </div> <!-- head -->
                <div class="inner">
                    
                    



                    <form name="frmEmpAttachment" id="frmEmpAttachment" method="post" enctype="multipart/form-data" action="/index.php/pim/updateAttachment/empNumber/14">

                        <input type="hidden" name="_csrf_token" value="606702d8fd600f272959709f94cf7e77" id="csrf_token" />            <input type="hidden" name="EmpID" value="14"/>
                        <input type="hidden" name="seqNO" id="seqNO" value=""/>
                        <input type="hidden" name="screen" value="personal" />
                        <input type="hidden" name="commentOnly" id="commentOnly" value="0" />

                        <fieldset>
                            <ol>
                                <li id="currentFileLi">
                                    <label>Current File</label>
                                    <span id="currentFileSpan"></span>
                                </li>                    
                                <li class="fieldHelpContainer">
                                    <label id="selectFileSpan" style="height:100%">Select File <em>*</em></label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />                        
                                    <input type="file" name="ufile" id="ufile" />
                                    <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                </li>
                                <li class="largeTextBox">
                                    <label>Comment</label>
                                    <textarea name="txtAttDesc" id="txtAttDesc" rows="3" cols="35" ></textarea>
                                </li>
                                <li class="required"><em>*</em> Required field</li>
                            </ol>
                            <p>
                                <input type="button" name="btnSaveAttachment" id="btnSaveAttachment" value="Upload" />
                                <input type="button" id="btnCommentOnly" value="Save Comment Only" />
                                <input type="button" class="cancel" id="cancelButton" value="Cancel" />
                            </p>
                        </fieldset>        

                    </form> <!-- frmEmpAttachment -->   
                    
                </div> <!-- inner -->
            </div> <!-- addPaneAttachments -->


            <div id="attachmentList" class="miniList">
                <div class="head">
                    <h1>Attachments</h1>
                </div>
                <div class="inner">
                    
                    



                    <form name="frmEmpDelAttachments" id="frmEmpDelAttachments" method="post" action="/index.php/pim/deleteAttachments/empNumber/14">

                        <input type="hidden" name="employeeAttachmentDelete[_csrf_token]" value="1086300b253953709f4222fa18a95de0" id="employeeAttachmentDelete__csrf_token" />            <input type="hidden" name="EmpID" value="14"/>

                        <p id="attachmentActions">
                                            <input type="button" class="addbutton" id="btnAddAttachment" value="Add" />
                                                        </p>
                        
                                    
                    </form> 

                </div>
            </div> <!-- attachmentList -->    

                
            </div> <!-- employee-details -->
 
            </div> <!-- content -->
          
        </div> <!-- wrapper -->

        <!-- include Footer-->
            <?php include ($checkpage->root.'\include\footer.php'); ?>
        <!-- Footer End-->      
    </body>
    
</html>

