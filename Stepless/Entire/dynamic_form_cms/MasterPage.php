<?php
/*   

*/
/* A variable holding the developer's name. */
    $author = 'Dhiraj';
/* A variable holding the path to directory holding stylesheets. */
    $styleSheetPath = "StyleSheets//";
/* A variable holding the path to directory holding javascripts. */
    $javaScriptPath = "JavaScripts//";

/* Including a .php file that holds generic PHP functions. */
    include_once "Generic/phpfunctions.php";

/* A variable holding the username. */
    $user = "root";
/* A variable holding the password. */
    $password = "root";
/* A variable holding the Db name. */
    $database = "php-dt-ztest_php-20150228_study_dynamicformgeneration";

/* Establishing Db Connection. */
    @mysql_connect(localhost, $user, $password) or die("Could Not Connect To MySQL Server");
/* Selecting A Db to work with. */
    @mysql_select_db($database) or die("Could Not Select A Database");
/* A query that will extract data from the FormsMaster table belonging to a particular PageID (received as a parameter via the URL). */
    $query = "SELECT * FROM FormsMaster WHERE PageID = $PageID";
/* Executing the query defined above. */
    $resultSet = mysql_query($query);
/* Fetching data from the resultSet and holding the same in the array $row. */
    $row = mysql_fetch_array($resultSet);
?>
<HTML>
        <HEAD>
<!-- Populating the title retrieved via the SQL query fired earlier. -->
            <TITLE>
                <?php echo $row['PageTitle'];?>
            </TITLE>
    <?php
    /* A SQL query that will extract all the javascript files names from the FormJavaScriptsDetail. */
        $query = "SELECT * FROM FormJavaScriptsDetail WHERE PageID = $PageID";
        $resultSet = mysql_query($query);
        while($rowJS = mysql_fetch_array($resultSet))
        {
        ?>
<!-- Producing SCRIPT tags referring source java script filenames. -->
            <SCRIPT LANGUAGE = "JAVASCRIPT"
                SRC = "<?php echo $javaScriptPath.$rowJS['ScriptName'];?>" TYPE = "TEXT/JAVASCRIPT">
            </SCRIPT>
        <?php
            }
        ?>

<!-- Loading an external .css (Stylesheet file) using the data retrieved via the SQL query. -->
            <LINK HREF = "<?php echo $styleSheetPath . $row['PageCSS']; ?>"  REL = "STYLESHEET" TYPE = "TEXT/CSS">
        </HEAD>   

<!-- Populating the onLoad event with appropriate function calls retrieved via the SQL query earlier. -->
    <BODY onLoad = "<?php echo $row['BodyOnLoad'];?>">
<SCRIPT  Language = "JavaScript">
/* This generic function accepts parameters (The column values available on the MasterPage GRID) and transfers the same to the form fields (usually textboxes) on the MasterPage Form for editing. It is called when a record is selected for modification. */
    function setEditMode(formname, id, field, val)
    {       
    /* Switches the form mode to update. This is done by setting the value of hidden variable named hidMode to U. This variable will be used by the dosql.php file to understand the mode in which the form is and accordingly perform appropriate database operation */
        formname.hidMode.value = 'U';
    /* Assigning The Hidden Variable hidID (usually the primary key) the value held by the variable id received as a parameter. */
        formname.hidID.value = id;
    /* Creating an array holding the value (form field names separated by "/") received by the field parameter. */
        arrField = field.split("/");
/* Creating an array holding the value (form field values separated by "/") received by the val parameter. */
        arrValue = val.split("/");
    /* The following loop traverses across all the form field names in the array arrField and assigns them the values held in the arrValue array. */
        for(i = 0; i < arrField.length-1; i++)
            eval("document.forms[0] . "+ arrField[i] + " . value = '" + arrValue[i] +"';");
    /* The Delete button available on the MasterPage.php form (in the grid section) is disabled. This is done to avoid a delete operation whilst the form is in update mode. */
        formname.cmdDelete.disabled = true;
    }
/* The function setDelMode() sets the form mode to Delete (D). Further transfers the control to the formDeleteValues() function. This function is called directly when the Delete button is clicked. */
    function setDelMode(formname)
    {   
    /* Switches the form mode to delete. This is done by setting the value of hidden variable named hidMode to D. This variable will be used by the PHP processing file dosql.php to understand the mode in which the form is and accordingly perform appropriate database operation. */   
        formname.hidMode.value = 'D';
    /* Calls a function named formDeleteValues with a parameter to hold list of IDs for deletion. This function generates a string of comma separated identities of the records selected for deletion. If no records are selected, a message indicates the same. */   
        formDeleteValues('hidDelID');
    }   
/* The formDeleteValues() function is called to create a list of records that are to be deleted. This list holds the Identity numbers of the records in a comma separated form. If no records were selected from the Tabular GRID on the form, a message indicates the same. This function is called when the DELETE button is clicked. */
    function formDeleteValues(hidden)
    {
        var selValues = "";
        var firstSelBox = "";
        for (i=0; i < document.forms[0].elements.length; i++)
        {
            if(document.forms[0].elements[i].type == "checkbox")
            {
                if (firstSelBox == "")
                {
                    firstSelBox = i;   
                }
                if (document.forms[0].elements[i].checked == true)
                {
                    selValues = selValues + document.forms[0].elements[i].value + ",";
                }
            }
        }
        if (selValues.length < 1)
        {
            alert("Please choose records you wish to delete.");
            eval("document.forms[0].elements[" + firstSelBox + "].focus();");
        }
        else
        {
            selValues = selValues.substring(0, selValues.length-1);
            eval("document.forms[0]." + hidden + ".value = '" + selValues + "';");
            document.forms[0].submit();
        }
    }
</SCRIPT>
<!-- Generating a form object, with the form name, action and method  attributes populated with the data retrieved earlier via the SQL query. This object will help submitting the data captured by the form to the PHP processing file. -->
    <FORM NAME = "<?php echo $row['FormName']; ?>"
            ACTION = "<?php echo $row['FormAction']; ?>"
            METHOD = "<?php echo $row['FormMethod']; ?>">
            <!-- A Hidden Form Element to hold Page ID (Usually a PRIMARY KEY COLUMN). This is required in dosql.php (The PHP Processing File) file to identify which record was selected for update (In the WHERE CLAUSE of the UDPATE statement). -->
    <INPUT TYPE = "hidden" NAME = "hidPageID" VALUE = "<?php echo $PageID;?>">
    <!-- A Hidden Form Element to hold the form mode. This is required in dosql.php (The PHP Processing File) file to identify the form mode and accordingly take necessary action. -->
    <INPUT TYPE = "hidden" NAME = "hidMode" VALUE = "I">
    <!-- A Hidden Form Element to hold list of IDs selected for deletion. -->
    <INPUT TYPE = "hidden" NAME = "hidDelID" VALUE = "">   
    <!-- A Hidden Form Element to hold the record identity (Primary Key). -->
    <INPUT TYPE = "hidden" NAME = "hidID" VALUE = "">   
    <!-- Outer Table Code Begins. -->
    <TABLE ALIGN = "CENTER" WIDTH = "50%" CELLPADDING = "1" CELLSPACING = "1" BORDERCOLOR = "#000000"             BGCOLOR = "#FFFFFF">
    <TR>
           <TD>
            <FIELDSET CLASS = "textfield">
                 <LEGEND>
                    <?php
                        echo $row['PageTitle'];
                    ?>
                </LEGEND>
<!-- A table that will hold Form objects retrieved from the Db
table. -->
    <TABLE ALIGN = "CENTER" CELLPADDING = "0" CELLSPACING = "0">
<?php
    /* A variable to hold the form object names retrieved from the Db table separated by a "/". */
        $frmObject = "";
    /* A variable to hold the Db column names retrieved from the Db table separated by a "/". */
        $fieldBound = "";
    /* A SQL query that will retrieve information about form objects, their names, the Db table column they are bound to, their positioning and so on. */
        $query = "SELECT * FROM FormObjectsDetail WHERE PageID = $PageID AND ObjectType NOT IN ('submit','reset') ORDER         BY ObjectSequenceNumber";
    /* Executing the SQL query.*/
        $resultSet = mysql_query($query);
    /* Checking if the query returned any records. */
    if(mysql_num_rows($resultSet) > 0)
    {
    /* Traversing across all the records retrieved. */
        while($row = mysql_fetch_array($resultSet))
        {
    ?>
<TR>
<!-- A table column to hold the Form Object Label retrieved via the
SQL query fired earlier. -->
        <TD CLASS = "NormalText" ALIGN = "RIGHT">
            <?php
                echo $row['ObjectLabel'];
            ?>:&nbsp;&nbsp;
        </TD>
        <TD>
            <?php
            /* Checking if the Object type in the current iteration is a textarea. */
                if($row['ObjectType'] == "textarea")
                {
                // Appending The Form Object's Name separated With "/"
                    $frmObject .= $row['ObjectName'] . "/";
            // Appending The Database Column's Name separated With "/"
                $fieldBound .= $row['ObjectBoundTo'] . "/";
    ?>   
<!-- Producing a textarea. -->
    <TEXTAREA
        <?php
            echo $row['ObjectParameters'];
        ?>
        NAME = "<?php echo $row['ObjectName'];?>"
        CLASS = "textfield">
    </TEXTAREA>

    <?php
    }
    /* Checking if the Object type in the current iteration is a combobox. */
        elseif($row['ObjectType'] == "Combobox")
        {
            // Appending The Form Object's Name separated With "/"
                $frmObject .= $row['ObjectName']. "/";
            // Appending The Database Column's Name separated With "/"
                $fieldBound .= $row['ObjectBoundTo'] . "/";
        /* Checking if the Object holds any dynamic Db table based values. */
            if ($row['ObjectValue'] == '')
            {
            /* Calling a user defined PHP function that will create a combobox with static values. */
            getStaticSelectBox($row['ObjectName'],
                $row['ObjectStaticValue'], "", "");
            }
            else
            {
            /* Calling a user defined PHP function that will create a combobox with dynamic Values from the Db table based on the table column name available in the resultSet. */
                getSelectBox($row['ObjectName'], "SELECT * FROM ".
                $row['ObjectTable'], $row['ObjectBoundTo'],
                $row['ObjectValue'], "", "", "false");
            }
        }
        else
        {
        // Appending The Form Object's Name separated With "/"
            $frmObject .= $row['ObjectName'] . "/";
        // Appending The Database Column's Name separated With "/"
            $fieldBound .= $row['ObjectBoundTo'] . "/";
    ?>
    <!--Producing a text box. -->
        <INPUT TYPE = "<?php echo $row['ObjectType'];?>"
                NAME = "<?php echo $row['ObjectName'];?>"
                CLASS = "textfield"
                <?php  echo $row['ObjectParameters'];?> >
        <?php
            }
        }
    }
        ?>
        </TD>   
    </TR>
    </TABLE>
    <TABLE ALIGN = "CENTER" CELLPADDING = "0" CELLSPACING = "0" WIDTH = "80%">
<?php
/* A SQL query that will retrieve all the records that belong to
command buttons for a particual Page ID. */
        $query = "SELECT * FROM FormObjectsDetail WHERE PageID = $PageID
                        AND ObjectType IN ('submit', 'reset')
                        ORDER BY ObjectSequenceNumber";
        $resultSet = mysql_query($query);
/* Checking if the SQL query defined above returns any records. */
        if(mysql_num_rows($resultSet) > 0)
        {
    ?>
<TR>
        <TD>&nbsp;</TD>
        <TD ALIGN="RIGHT">
            <?php
                while($row = mysql_fetch_array($resultSet))
                {       
                /* Checking if the button in this iteration is of type
                reset. */
                    if($row['ObjectType'] == "reset")
                    {
            ?>
    <!--Producing a reset button. -->
        <INPUT  CLASS = "btnStyle" TYPE = "<?php echo $row['ObjectType'];?>"
                VALUE = "<?php echo $row['ObjectLabel']; ?>"
            <?php  echo $row['ObjectParameters'];?>
                onClick = "Javascript:document.forms[0].cmdDelete.disabled = false;">
            <?php
                    }
                    else
                    {
                        ?>
    <!-- Producing a standard button. -->
        <INPUT  CLASS = "btnStyle" TYPE = "<?php echo $row['ObjectType'];?>"
                VALUE = "<?php echo $row['ObjectLabel']; ?>"
            <?php  echo $row['ObjectParameters'];?>>
            <?php
                    }
                }
            }
    ?>
                    </TD>
            </TR>
        </TABLE>
        <BR>
                </FIELDSET>
            </TD>
        </TR>
    </TABLE>
    <?php
    /* A SQL query to retrieve the formname of the current page identified by a PageID. */
        $query = "SELECT * FROM FormsMaster WHERE PageID = $PageID";
    /* Variable To Hold The Result (Rows) Retrieved From The Query. */
        $resultSet = mysql_query($query);
    /* Retrieving the FormName from the resultSet. */
        $formName = mysql_result($resultSet, 0, 'FormName');
    /* A SQL query to retrieve the records from the FormGridDetail table for the current page identified by a PageID. */
        $query = "SELECT * FROM FormGridDetail WHERE PageID = $PageID";
    /* Executing the SQL Query defined earlier. */
        $resultSet = mysql_query($query);
    /* Counter Variable. */
        $cnt = 0;
    /* Retrieving the TableName from the resultSet. */
        $tableName = mysql_result($resultSet, 0, 'TableName');
    /* A SQL query to retrieve the records from the tablename retrieved earlier. */
    $queryData = "SELECT * FROM " . $tableName;

/* Executing the SQL Query defined earlier. */
        $resultSetData = mysql_query($queryData);
    /* Counting the number of records returned by the SQL query fired. */
        $recCount = mysql_num_rows($resultSetData);
/* If the SQL query fired earlier returns any records. */
    if ($recCount > 0)
    {
    /* Create a table and the first row. */
        echo "<TABLE BORDER = \"0\" ALIGN = \"CENTER\" WIDTH = \"50%\"         CELLPADDING = \"1\" CELLSPACING = \"1\"     BORDERCOLOR = \"#333333\" BGCOLOR = \"#FFFFFF\"><TR ALIGN = \"LEFT\" BORDERCOLOR = \"#333333\"             BGCOLOR = \"#999999\" CLASS = \"BOLDTEXT\"><TD WIDTH = \"52\"><INPUT TYPE = \"button\" NAME = \"cmdDelete\" VALUE = \"Delete\" CLASS = \"btnstyle\"     onClick = \"setDelMode(document." . $formName.");\"></TD>";
/* Traversing through the records in the resultSet bound to the FormGridDetail. */
    while ($cnt < mysql_num_rows($resultSet))
    {
        if ($cnt == 0)
        {
        /* Retrieving the tablename. */
            $tableName = mysql_result($resultSet, $cnt, 'TableName');
        /* Retrieving the PrimaryKeyColumn's Name. */
            $selectedField = mysql_result($resultSet, $cnt, 'PrimaryKeyColumn');
        /* Retrieving the PrimaryKeyColumn's Name. */
            $priKey = mysql_result($resultSet, $cnt, 'PrimaryKeyColumn');
        }
    /* Retrieving the Db table Column Names. */
        $selectedField .= "," . mysql_result($resultSet, $cnt, 'ColumnName');
        /* Rendering the header data (column names) on the GRID. */
        echo "<TD class = \"BOLDTEXT\">" .
                    mysql_result($resultSet, $cnt, 'ColumnLabel') .
            "</TD>";
    /* Incrementing the Counter Variable Value By One. */
    $cnt++;
}
    echo "</TR>";
/* A SQL query to retrieve the records from the tablename retrieved earlier. */
        $queryData = "select " . $selectedField . " from " . $tableName;

/* Executing the SQL Query defined earlier. */
        $resultSetData = mysql_query($queryData);
/* Traversing through the data retrieved using the resultSetData. */
    while($rowData = mysql_fetch_array($resultSetData))
    {
    /* Creating the Data Row. */
        echo "<TR BORDERCOLOR = \"#333333\"  BGCOLOR = \"#99CCFF\" onMouseOver = \"this.bgColor = '#EFEEC9';\" onMouseOut = \"this.bgColor = '#99CCFF';\" CLASS = \"NormalText\">";
    /* An Array to hold the Db table column Names. */
        $arrFieldBound = split("/", $fieldBound);
    /* Traversing through all the elements in arrFieldBound array. */
    for($cntj = 0; $cntj < count($arrFieldBound)-1; $cntj++)
    {
    /* A SQL query to retrieve data based on the Db table column names
    held in the arrFieldBound array. */
        $query = "SELECT " . $arrFieldBound[$cntj] . " FROM " .
            $tableName . " WHERE " . $priKey . " = " . $rowData[0];
    /* Executing the above defined SQL query. */
$resultSetValue = mysql_query($query);
    /* If this is the first iteration. */
        if ($cntj == 0)
        {
            /* Assign the retrieved value to the variable. */
            $arrFieldValue = mysql_result($resultSetValue, 0, $arrFieldBound[$cntj]);
        }
        else
        {
        /* Append the retrieved value to the variable separated by "/".
        */
            $arrFieldValue .= "/" .
            mysql_result($resultSetValue, 0, $arrFieldBound[$cntj]) ;
        }
    }
    /* Loop through the number of columns to be displayed. */
        for($cnt=0; $cnt <= mysql_num_rows($resultSet); $cnt++)
        {
        /* If this is the first iteration render a CheckBox. */
            if ($cnt == 0)
            {
                echo "<TD ALIGN = \"Center\">    <INPUT TYPE = \"CheckBox\" NAME = \"chk" . $rowData[$cnt] . "\"                                 VALUE = \"" . $rowData[$cnt] . "\">                        </TD>";
            }
        /* Otherwise Display Column Data. */
            else
            {
                echo "<TD STYLE = \"cursor:pointer\" CLASS = \"NormalText\"
                            onMouseDown = \"setEditMode(document." .
                            $formName ."," . $rowData[0]. ",'" . $frmObject . "','".
                            $arrFieldValue . "');\">" . $rowData[$cnt] . "</TD>";
            }
        }
    echo "</TR>";
        }
        echo "</TABLE>";
    }
    /* Close the connection */
        mysql_close();
    ?>
    </FORM>
    </BODY>
</HTML>