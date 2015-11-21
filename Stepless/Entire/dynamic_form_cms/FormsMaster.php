<?php


/* --------------------Common PHP variables. ----------------------------------------------------------------- */
/* A variable named $author is defined to store the name of the programmer who designed/coded the page. */
    $author = 'DhirajT.';

       
/* --------------------PHP variables bound to Database Connection. ------------------------------------------- */
        $user = "root";   //  A variable holding the user name of  MySQL database
        $pwd = "root";   //  A variable holding the password of MySQL database
        $db = "php-dt-ztest_php-20150228_study_dynamicformgeneration";   //  A variable holding the database named bookdb
        $host = "localhost";   //  A variable holding the host name


/* --------------------PHP code block to establish Database connection. --------------------------------------- */
    /* Connecting to the database */
        @mysql_connect($host, $user, $pwd) or die("Connection Failed");

    /* Selecting the database */
        $dbLink = mysql_select_db($db) or die("Could not select the database!");
    ?>
<!-- ------------------HTML code block rendering the actual page begins. -------------------------------------- -->
        <HTML>
            <HEAD>
                <TITLE>Forms Master Form</TITLE>
                <!-- ------------------Link tag holding StyleSheet under the HEAD section. ---------------------------------- -->
                <LINK HREF="StyleSheets/global.css" REL="STYLESHEET" TYPE="TEXT/CSS">
            </HEAD>
<!-- ------------------BODY section. -------------------------------------------------------------------------- -->

            <BODY>


<!-- ------------------SCRIPT tag holding JavaScript under the BODY section. ---------------------------------- -->
    <SCRIPT LANGUAGE="JavaScript">
    function setEditMode(id,title,css,onLoad,param,frmName,frmAction,frmMethod)
    {       
        /* Switches the form mode to update. This is done by setting the value of hidden variable named hidMode to U. This variable will be used by the dosql.php file to understand the mode in which the form is and accordingly perform appropriate database operation */   
        document.forms[0].frmhidMode.value='U';

        // Assigning The The Hidden Variable The id passed as a parameter
        document.forms[0].hidID.value=id;

        // Assigning The Form Object txtPageTitle The Value Of The passed title parameter
        document.forms[0].txtPageTitle.value = title;
       
        // Assigning The Form Object txtPageCSS The Value Of The passed css parameter
        document.forms[0].txtPageCSS.value = css;
       
        // Assigning The Form Object txtBodyOnLoad The Value Of The passed onLoad parameter
        document.forms[0].txtBodyOnLoad.value = onLoad;
       
        // Assigning The Form Object txtBodyParam The Value Of The passed param parameter
        document.forms[0].txtBodyParam.value = param;
       
        // Assigning The Form Object txtFormName The Value Of The passed frmName parameter
        document.forms[0].txtFormName.value = frmName;
       
        // Assigning The Form Object txtFormAction The Value Of The passed frmAction parameter
        document.forms[0].txtFormAction.value = frmAction;
       
        // Assigning The Form Object cmbFormMethod The Value Of The passed frmMethod parameter
        document.forms[0].cmbFormMethod.value= frmMethod;
       
        /* Disables the delete button available on the master_lang.php form. This is done to avoid any delete operation while the form is in update mode */   
        document.forms[0].cmdDelete.disabled=true;
   
    }
   
    function setDelMode()
    {   

        /* Switches the form mode to delete. This is done by setting the value of hidden variable named hidMode to D. This variable will be used by the dosql.php file to understand the mode in which the form is and accordingly perform appropriate database operation. */   
        document.forms[0].frmhidMode.value='D';
       
        /* Calls a function named formDeleteValues with a parameter to hold list of IDs for deletion. This function generates a string of comma-separated identities of the records selected for deletion. If no records are selected, a message indicates the same. */   
        formDeleteValues('frmDelID');
       
    }
   
    function formDeleteValues(hidden)
    {
        var selValues = "";
        var firstSelBox = "";

        //A Loop To Search All Form Elements
        for (i=0;i<document.forms[0].elements.length;i++)
        {
           
            //If The Type Of Object Found Is A Check Box
            if(document.forms[0].elements[i].type == "checkbox")
            {
               
                //If firstSelBox Variable Holds Nothing 
                if (firstSelBox == "")
                {
                   
                    //Save The Counter Variable Value (Value Of i) In The firstSelBox
                    firstSelBox = i;   
                }

                //If The CheckBox Is CHECKED Then
                if (document.forms[0].elements[i].checked == true)
                {
                    // Save The Value Of The Selectd CheckBox In A Comma Separated Values
                    selValues = selValues + document.forms[0].elements[i].value + ",";
                }
            }
        }
       
        //If No CheckBox Is CHECKED Then There is No Record For Deletion
        if (selValues.length < 1)
        {
            //Intimating The User About Selecting A Record For Deletion
            alert("Please choose records you wish to delete.");
           
            eval("document.forms[0].elements[" + firstSelBox + "].focus();");
        }
        else
        {
            //Removing The Last Comma (,) From The SelValues
            selValues = selValues.substring(0,selValues.length-1);
           
            //Assinging The Form's hidden Object The SelValues
            eval("document.forms[0]."+hidden+".value = '" +selValues+"';");
           
            //Submitting The Form For Delete Operation
            document.forms[0].submit();
        }
       
    }
   
    </SCRIPT>
<!-- ------------------SCRIPT tag holding JavaScript under the BODY section ends. ----------------------------- -->


<!-- ------------------Form Section holding Data and Control objects begins. ---------------------------------- -->

<!-- The page is designed using HTML tags. The FORM tag holds ACTION pointing to the dosql.php file and onSubmit pointing to the chkBlanks javascript function declared and defined earlier. -->

<!-- Initialising a form object, which will submit data captured on the form to the PHP processing file. -->
    <FORM ACTION="doSqlMaster.php" METHOD="post" NAME="FrmFormsMast" onSubmit="return chkBlanks();" ENCTYPE="MULTIPART/FORM-DATA">
    <!-- Defining hidden form elements -->

<!-- ------------------Form Hidden Variable to hold the Form IDentity. ------------------------------------- -->

        <!-- A Hidden Form Element to hold Page ID (Usually PRIMARY KEY COLUMN). This is required in dosql.php (The Processing File) file to identify which record was selected for update (In the WHERE CLAUSE of the UDPATE statement). -->
            <INPUT NAME="hidFormName" SIZE="2" TYPE="hidden" VALUE="FormsMaster">

<!-- ------------Form Hidden Variable to determine the form operation mode. Default, being Insert operation. - -->

        <!-- A Hidden Form Element to hold the form mode. This is required in dosql.php (The Processing File) file to identify the form mode and accordingly take necessary action. -->
            <INPUT NAME="frmhidMode" TYPE="hidden" VALUE="I">

<!-- ------------Form Hidden Variable to hold comma separated values (Identities) selected for deletion. ----- -->

        <!-- A Hidden Form Element to hold list of IDs selected for deletion. -->
            <INPUT NAME="frmDelID" TYPE="hidden">
           
<!-- ------------Form Hidden Variable to Hold PageID. ------------------------------------- -->

            <!-- This is required in dosql.php (The Processing File) file to identify which record was selected for update (In the WHERE CLAUSE of the UDPATE statement). -->
            <INPUT NAME="hidID" TYPE="hidden" VALUE ="">
           
            <!-- ------------------Parent Table begins. ------------------------------------------------------------------ -->

<!-- Outer Table Code Begins. -->
    <TABLE ALIGN="center" BGCOLOR="" BORDER="0" CELLPADDING="0" CELLSPACING="0" NAME="tblOuter" WIDTH="50%">

<!-- ------------------Parent Table: First Row. -------------------------------------------------------------- -->
       
        <TR HEIGHT="300" VALIGN="top">
            <TD ALIGN="center" BORDER="1" COLSPAN="10">
            <BR>

<!-- ------------------First Child Table to hold the d/e Form objects, to Capture / Control data begins. ----- -->
            <!-- Inserting Fieldset to display the form title -->
            <FIELDSET CLASS="textfield">
                <LEGEND>Forms Master</LEGEND>

        <!-- HTML Code-spec follows for designing the form fields Author Name, Author Degree, Speciality and DOB and buttons such as Save and Cancel. -->
            <TABLE ALIGN="center"  BORDERCOLOR="" CELLPADDING="2" CELLSPACING="0"    NAME="tblFirstChild">

<!-- ------------------First Child Table: Second, Third, Fourth, Fifth, Seventh & Eighth Rows: Two columns, first column to hold the label and the second to hold the data capture object that captures data. ------------------------------------- -->

            <!-- Inserting table row that holds table data lable and text box of Page Title -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        Page Title:
                    </TD>
                    <TD WIDTH="69%" ALIGN="left">
                        <INPUT MAXLENGTH="75" NAME="txtPageTitle"  TYPE="text" SIZE="25" CLASS="textfield">
                    </TD>
                </TR>
               
                <!-- Inserting table row that holds table data lable and text box of Page CSS -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        PageCSS:
                    </TD>
                    <TD ALIGN="left">
                        <INPUT MAXLENGTH="75" NAME="txtPageCSS"  TYPE="file" SIZE="50" CLASS="textfield">
                    </TD>
                </TR>

                <!-- Inserting table row that holds table data lable and text box of BodyOnLoad -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        BodyOnLoad:
                    </TD>
                    <TD ALIGN="left">
                        <INPUT MAXLENGTH="25" NAME="txtBodyOnLoad"  TYPE="text" SIZE="25" CLASS="textfield">
                    </TD>
                </TR>
               
                <!-- Inserting table row that holds table data lable and text box of Body Parameters -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        Body Parameters:
                    </TD>
                    <TD ALIGN="left">
                        <INPUT MAXLENGTH="100" NAME="txtBodyParam"  TYPE="text" SIZE="25" CLASS="textfield">
                    </TD>
                </TR>
               
                <!-- Inserting table row that holds table data lable and text box of Form Name -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        Form Name:
                    </TD>
                    <TD ALIGN="left">
                        <INPUT MAXLENGTH="15" NAME="txtFormName"  TYPE="text" SIZE="15" CLASS="textfield">
                    </TD>
                </TR>
               
                <!-- Inserting table row that holds table data lable and text box of Form Action -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        Form Action:
                    </TD>
                    <TD ALIGN="left">
                        <INPUT MAXLENGTH="15" NAME="txtFormAction"  TYPE="text" SIZE="15" CLASS="textfield">
                    </TD>
                </TR>
               
                <!-- Inserting table row that holds table data lable and combo box of Form Method -->
                <TR>
                    <TD ALIGN="right" WIDTH="31%" CLASS="NormalText">
                        Form Method:
                    </TD>
                    <TD ALIGN="left">
                        <SELECT NAME="cmbFormMethod" CLASS="textfield">
                        <OPTION VALUE="POST">POST</OPTION>
                        <OPTION VALUE="GET">GET</OPTION>
                        </SELECT>
                    </TD>
                </TR>
<!-- ------------------First Child Table: Last Row: Columns to hold data control objects. -------------------- -->

            <!-- Inserting table row that holds inputs for Submit and Reset buttons -->
                <TR>
                    <TD COLSPAN="2" ALIGN="RIGHT">
                        <INPUT NAME="cmdSubmit" TYPE="submit" VALUE="Save" CLASS="btnStyle">
                        <INPUT NAME="cmdReset" onClick="Javascript: document.forms[0].cmdDelete.disabled=false;" TYPE="reset" VALUE="Cancel" CLASS="btnStyle">
                        <INPUT NAME="cmdNext" TYPE="button" VALUE="Next" CLASS="btnStyle" onClick="javascript:window.location.href='FormObjectsDetail.php'">
                    </TD>                   
                </TR>
            </TABLE>
            </FIELDSET>
<!-- ------------------First Child Table ends. --------------------------------------------------------------- -->

        <BR>

<!-- ------------------PHP code block to retrieve records form the AuthorMaster table. ----------------------- -->

        <?php
            /* Executes the SQL query */
            /* Storing the query in a variable */
                $query = "SELECT * FROM FormsMaster ORDER BY PageID";

                $resultSet=mysql_query($query) or die("Execution Of The SQL Query failed");
               
            /* Returns the number of rows in a result set */
                $numrows=mysql_numrows($resultSet);

            /* Verifying whether any rows are present in the database*/
                if ($numrows)
                {
        ?>

                <!-- A tabular layout is created to hold the records retrieved. This is done using if condition which traverses through the records retrieved from the table via the SQL query. While traversing through the loop the COLOR code for each row displayed in the tabular layout is switched between two different colors. This is done to improve the readability. -->

<!-- ------------------Second Child Table to hold the tabular layout (GRID), to display / control data captured begins. ------------------------------------------------------------------------------------------------------ -->

                    <TABLE ALIGN="center" BORDER="0" BORDERCOLOR="#333333" BGCOLOR="#FFFFFF" CELLPADDING="1" CELLSPACING="1" WIDTH="100%" NAME="tblSecondChild">

<!-- ------------------Second Child Table: First Row: Columns to hold the header row along with the Delete button. -------------------------------------------------------------------------------------------------------------- -->

                    <!-- Inserting a table row that holds table data of Page Title, PageCSS, Form Name, Form Action And Form Method fields -->
                        <TR BGCOLOR="#999999" BORDERCOLOR="#333333">
                            <TD WIDTH="8%" ALIGN="CENTER"><INPUT NAME="cmdDelete" onClick="setDelMode();" TYPE="button" VALUE="Delete" CLASS="btnStyle"></TD> 
                            <TD WIDTH="20%" CLASS="BOLDTEXT">Page Title</TD>
                            <TD WIDTH="14%" CLASS="BOLDTEXT">PageCSS</TD>
                            <TD WIDTH="27%" CLASS="BOLDTEXT">Form Name</TD>
                            <TD WIDTH="13%" CLASS="BOLDTEXT">Form Action</TD>
                            <TD WIDTH="18%" CLASS="BOLDTEXT">Form Method</TD>
                    </TR>
<!-- ------------------PHP code block to populate data in the tabular layout using a loop. ------------------- -->

    <!--Initializing and running a while loop that traverses through the records extracted earlier --> 
        <?php

                /* Setting up a loop */
                while($sel_array = mysql_fetch_array($resultSet))
                {       
        ?>

<!-- ------------------Second Child Table: Second Row: Columns to set data and assign colors to odd and even rows. --------------------------------------------------------------------------------------------------------------- -->

                    <!-- Inserting table row that asigns color to each row of retrieved data -->
                    <TR BORDERCOLOR="#333333" BGCOLOR="#99CCFF" onMouseOver="this.bgColor='#EFEEC9';"  onMouseOut="this.bgColor='#99CCFF';">
                        <TD ALIGN="CENTER">
                        <!-- Inputting checkbox to which value of AuthorID retrieved from the database is assigned -->
                            <INPUT NAME="chk<?php echo $sel_array['PageID'];?>" TYPE="checkbox"    VALUE="<?php echo $sel_array['PageID'];?>" >
                        </TD>
                       
                        <!-- Retrieving data by using function  and Inserting a link to the data -->
                        <TD STYLE="cursor:pointer" CLASS="NormalText" onMouseDown="setEditMode(<?php echo $sel_array['PageID'];?>,'<?php echo $sel_array['PageTitle'];?>','<?php echo $sel_array['PageCSS'];?>','<?php echo $sel_array['BodyOnLoad'];?>','<?php echo $sel_array['BodyParameters'];?>', '<?php echo $sel_array['FormName']?>', '<?php echo $sel_array['FormAction']?>', '<?php echo $sel_array['FormMethod']?>');">
                            <?php echo $sel_array['PageTitle'];?>
                        </TD>
                       
                        <TD STYLE="cursor:pointer" CLASS="NormalText"  onMouseDown="setEditMode(<?php echo $sel_array['PageID'];?>,'<?php echo $sel_array['PageTitle'];?>','<?php echo $sel_array['PageCSS'];?>','<?php echo $sel_array['BodyOnLoad'];?>','<?php echo $sel_array['BodyParameters'];?>', '<?php echo $sel_array['FormName']?>', '<?php echo $sel_array['FormAction']?>', '<?php echo $sel_array['FormMethod']?>');">
                            <?php echo $sel_array['PageCSS'];?>
                        </TD>

                        <TD STYLE="cursor:pointer" CLASS="NormalText"  onMouseDown="setEditMode(<?php echo $sel_array['PageID'];?>,'<?php echo $sel_array['PageTitle'];?>','<?php echo $sel_array['PageCSS'];?>','<?php echo $sel_array['BodyOnLoad'];?>','<?php echo $sel_array['BodyParameters'];?>', '<?php echo $sel_array['FormName']?>', '<?php echo $sel_array['FormAction']?>', '<?php echo $sel_array['FormMethod']?>');">
                            <?php echo $sel_array['FormName'];?>
                        </TD>

                        <TD STYLE="cursor:pointer" CLASS="NormalText"  onMouseDown="setEditMode(<?php echo $sel_array['PageID'];?>,'<?php echo $sel_array['PageTitle'];?>','<?php echo $sel_array['PageCSS'];?>','<?php echo $sel_array['BodyOnLoad'];?>','<?php echo $sel_array['BodyParameters'];?>', '<?php echo $sel_array['FormName']?>', '<?php echo $sel_array['FormAction']?>', '<?php echo $sel_array['FormMethod']?>');">
                            <?php echo $sel_array['FormAction'];?>
                        </TD>
                       
                        <TD STYLE="cursor:pointer" CLASS="NormalText"  onMouseDown="setEditMode(<?php echo $sel_array['PageID'];?>,'<?php echo $sel_array['PageTitle'];?>','<?php echo $sel_array['PageCSS'];?>','<?php echo $sel_array['BodyOnLoad'];?>','<?php echo $sel_array['BodyParameters'];?>', '<?php echo $sel_array['FormName']?>', '<?php echo $sel_array['FormAction']?>', '<?php echo $sel_array['FormMethod']?>');">
                            <?php echo $sel_array['FormMethod'];?>
                        </TD>
                       
                    </TR>

<!-- ------------------Loop and the Second Child table ends. ------------------------------------------------ -->

        <?php
                /* Closing the loop  */
                }
        ?>

            </TABLE>
<!-- ------------------The MySQL connection is closed and the Parent Table ends.----------------------------- -->

        <?php
            /* Closing the if condition. */
                }
            /* Close the connection */
                mysql_close();
        ?>
        </TD>
    </TR>
    </TABLE>
    </FORM>
<!-- ------------------Form to hold Data and Control objects ends. -------------------------------------------- -->

</BODY>
</HTML>
<!-- ------------------HTML code block along with BODY section rendering the actual page ends. ---------------- -->