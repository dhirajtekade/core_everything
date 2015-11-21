<?php

/* --------------------Common PHP variables. ----------------------------------------------------------------- */
/* A variable named $author is defined to store the name of the programmer who designed/coded the page. */
    $author = 'DhirajT';

       
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


//******************************** Processing For Forms Master Starts Here ************************************


    // IF hidFormName Holds Value FormsMaster Then Processing Need To Be Done For FormsMaster.php File
    if($_POST['hidFormName'] == "FormsMaster")
    {
        //IF frmhidMode Holds Value I (For Insert) Then New Record Need To Be Inserted In The Table formsmaster
        if($_POST['frmhidMode'] == "I")
        {
            //A SQL Query Is Executed To Retrieve The Maximum PageID + 1 Value
            $getID_qry = "SELECT MAX(PageID)+1 PID FROM FormsMaster";

            //A Resultset To Execute The getID_qry
            $res_getID = mysql_query($getID_qry);
           
            //If Resultset Returns Any Value Then
            if (mysql_result($res_getID,0,PID))

                //Assigning The Retrieved Value To A Variable
                $id = mysql_result($res_getID,0,PID);

            //Otherwise, There is no record
            else
                //Assigning Constant Value one To The Variable
                $id = 1;
               
            //An INSERT query To Insert New Record
            $insert_qry = "INSERT INTO FormsMaster VALUES (". $id .",'". $_POST['txtPageTitle']."','" . $_FILES['txtPageCSS']['name'] . "','" . $_POST['txtBodyOnLoad'] . "','" . $_POST['txtBodyParam'] . "','" . $_POST['txtFormName'] . "','" . $_POST['txtFormAction']  . "','" . $_POST['cmbFormMethod'] ."')";
           
            //Resultset To Execute The Query
            $insert_res = mysql_query($insert_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormsMaster.php");
        }
       
        //IF frmhidMode Holds Value U (For Update) Then Existing Record Need To Be Updated In The Table formsmaster
        if($_POST['frmhidMode'] == "U")
        {
       
            //An UPDATE query To Update Existing Record
            $update_qry = "UPDATE FormsMaster SET PageTitle='". $_POST['txtPageTitle']."',PageCSS='" . $_FILES['txtPageCSS']['name'] . "',BodyOnLoad='" . $_POST['txtBodyOnLoad'] . "',BodyParameters='" . $_POST['txtBodyParam'] . "',FormName='" . $_POST['txtFormName'] . "',FormAction='" . $_POST['txtFormAction']  . "',FormMethod='" . $_POST['cmbFormMethod'] ."' WHERE PageID=" .$_POST['hidID'];
           
            //Resultset To Execute The Query
            $update_res = mysql_query($update_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormsMaster.php");
           
        }
       
        //IF frmhidMode Holds Value D (For Delete) Then Existing Record Need To Be Deleted From The Table formsmaster
        if($_POST['frmhidMode'] == "D")
        {

            //An DELTE query To Delete Existing Record
            $delete_qry = "DELETE FROM FormsMaster WHERE PageID IN (" .$_POST['frmDelID'] .")";
           
            //Resultset To Execute The Query
            $delete_res = mysql_query($delete_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormsMaster.php");
        }
    }


//******************************** Processing For Forms Master Ends Here ************************************




//******************************** Processing For Form Object Details Starts Here ******************************
   
    // IF hidFormName Holds Value FormObjectsDetail Then Processing Need To Be Done For FormObjectsDetail.php File
    if($_POST['hidFormName'] == "FormObjectsDetail")
    {
        //IF frmhidMode Holds Value I (For Insert) Then New Record Need To Be Inserted In The Table formObjectsDetail
        if($_POST['frmhidMode'] == "I")
        {
            //A SQL Query Is Executed To Retrieve The Maximum SrNo + 1 Value
            $getID_qry = "SELECT MAX(SrNo)+1 FROM formObjectsDetail";

            //A Resultset To Execute The getID_qry
            $res_getID = mysql_query($getID_qry);
           
            //If Resultset Returns Any Value Then
            if (mysql_result($res_getID,0))

                //Assigning The Retrieved Value To A Variable
                $id = mysql_result($res_getID,0);

            //Otherwise, There is no record
            else
            //Assigning Constant Value one To The Variable
                $id = 1;
               
            //An INSERT query To Insert New Record
            $insert_qry = "INSERT INTO formObjectsDetail VALUES (". $id . "," . $_POST['cmbPageID'] .",". $_POST['txtObjSeqNumber'].",'" . $_POST['txtObjName'] . "','" . $_POST['txtObjLabel'] . "','" . $_POST['cmbObjType'] . "','" . $_POST['txtObjParam'] . "','" . $_POST['txtObjValue']  . "','" . $_POST['txtObjStValue'] . "','" . $_POST['txtObjBoundTo'] . "','" . $_POST['txtObjTable'] . "','" . $_POST['txtObjQuery'] . "')";

            //Resultset To Execute The Query
            $insert_res = mysql_query($insert_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormObjectsDetail.php");
        }
       
        //IF frmhidMode Holds Value U (For Update) Then Existing Record Need To Be Updated In The Table formObjectsDetail
        if($_POST['frmhidMode'] == "U")
        {
       
            //An UPDATE query To Update Existing Record
            $update_qry = "UPDATE FormObjectsDetail SET PageID=". $_POST['cmbPageID'] . ", ObjectSequenceNumber=". $_POST['txtObjSeqNumber'].", ObjectName='" . $_POST['txtObjName'] . "', ObjectLabel='" . $_POST['txtObjLabel'] . "', ObjectType='" . $_POST['cmbObjType'] . "', ObjectParameters='" . $_POST['txtObjParam'] . "', ObjectValue='" . $_POST['txtObjValue']  . "', ObjectStaticValue='" . $_POST['txtObjStValue'] . "', ObjectBoundTo='" . $_POST['txtObjBoundTo'] . "', ObjectTable='" . $_POST['txtObjTable'] . "', ObjectQuery='" . $_POST['txtObjQuery'] . "' WHERE SrNo=" .$_POST['hidID'];
           
            //Resultset To Execute The Query
            $update_res = mysql_query($update_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormObjectsDetail.php");
           
        }
       
        //IF frmhidMode Holds Value D (For Delete) Then Existing Record Need To Be Deleted From The Table formObjectsDetail
        if($_POST['frmhidMode'] == "D")
        {
            echo "Delete Mode";

            //An DELTE query To Delete Existing Record
            $delete_qry = "DELETE FROM FormObjectsDetail WHERE SrNo IN (" .$_POST['frmDelID'] .")";
           
            //Resultset To Execute The Query
            $delete_res = mysql_query($delete_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormObjectsDetail.php");
        }
    }
   
//******************************** Processing For Form Object Details Ends Here ******************************



//******************************** Processing For Form Grid Details Starts Here *******************************
   
    // IF hidFormName Holds Value FormObjectsDetail Then Processing Need To Be Done For FormGridDetail.php File
    if($_POST['hidFormName'] == "FormGridDetail")
    {
        //IF frmhidMode Holds Value I (For Insert) Then New Record Need To Be Inserted In The Table formgridDetail 
        if($_POST['frmhidMode'] == "I")
        {
            //A SQL Query Is Executed To Retrieve The Maximum SrNo + 1 Value
            $getID_qry = "SELECT MAX(SrNo)+1 SNO FROM formgridDetail";

            //A Resultset To Execute The getID_qry
            $res_getID = mysql_query($getID_qry);
           
            //If Resultset Returns Any Value Then
            if (mysql_result($res_getID,0,SNO))

                //Assigning The Retrieved Value To A Variable
                $id = mysql_result($res_getID,0,SNO);

            //Otherwise, There is no record
            else
                //Assigning Constant Value one To The Variable
                $id = 1;
               
            //An INSERT query To Insert New Record
            $insert_qry = "INSERT INTO formgridDetail VALUES (". $id . "," . $_POST['cmbPageID'] .",'". $_POST['txtPKValue']."','" . $_POST['txtColName'] . "','" . $_POST['txtColLabel'] . "','" . $_POST['txtTblName'] . "')";
           
            //Resultset To Execute The Query
            $insert_res = mysql_query($insert_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormGridDetail.php");
        }
       
        //IF frmhidMode Holds Value U (For Update) Then Existing Record Need To Be Updated In The Table formgridDetail
        if($_POST['frmhidMode'] == "U")
        {
       
            //An UPDATE query To Update Existing Record
            $update_qry = "UPDATE formgridDetail SET PageID=". $_POST['cmbPageID'] . ", PrimaryKeyColumn='". $_POST['txtPKValue']."', ColumnName='" . $_POST['txtColName'] . "', ColumnLabel='" . $_POST['txtColLabel'] . "', TableName='" . $_POST['txtTblName'] . "' WHERE SrNo=" .$_POST['hidID'];
           
            //Resultset To Execute The Query
            $update_res = mysql_query($update_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormGridDetail.php");
           
        }
       
        //IF frmhidMode Holds Value D (For Delete) Then Existing Record Need To Be Deleted From The Table formgridDetail
        if($_POST['frmhidMode'] == "D")
        {
            //An DELTE query To Delete Existing Record
            $delete_qry = "DELETE FROM formgridDetail WHERE SrNo IN (" .$_POST['frmDelID'] .")";
           
            //Resultset To Execute The Query
            $delete_res = mysql_query($delete_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormGridDetail.php");
        }
    }
   
//******************************** Processing For Form Grid Details Ends Here *******************************



//******************************** Processing For Form Java Script Details Starts Here *******************************
   
    // IF hidFormName Holds Value FormJSDetail Then Processing Need To Be Done For FormJScriptDetail.php File
    if($_POST['hidFormName'] == "FormJSDetail")
    {
        //IF frmhidMode Holds Value I (For Insert) Then New Record Need To Be Inserted In The Table formJavaScriptsDetail 
        if($_POST['frmhidMode'] == "I")
        {
            //A SQL Query Is Executed To Retrieve The Maximum SrNo + 1 Value
            $getID_qry = "SELECT MAX(SrNo)+1 SNO FROM formJavaScriptsDetail";

            //A Resultset To Execute The getID_qry
            $res_getID = mysql_query($getID_qry);
           
            //If Resultset Returns Any Value Then
            if (mysql_result($res_getID,0,SNO))

                //Assigning The Retrieved Value To A Variable
                $id = mysql_result($res_getID,0,SNO);

            //Otherwise, There is no record
            else
                //Assigning Constant Value one To The Variable
                $id = 1;
               
            //An INSERT query To Insert New Record
            $insert_qry = "INSERT INTO formJavaScriptsDetail VALUES (". $id . "," . $_POST['cmbPageID'] .",'" . $_FILES['txtScriptName']['name'] . "')";

            //Resultset To Execute The Query
            $insert_res = mysql_query($insert_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormJScriptDetail.php");
        }
       
        //IF frmhidMode Holds Value U (For Update) Then Existing Record Need To Be Updated In The Table formJavaScriptsDetail
        if($_POST['frmhidMode'] == "U")
        {
       
            //An UPDATE query To Update Existing Record
            $update_qry = "UPDATE formJavaScriptsDetail SET PageID=". $_POST['cmbPageID'] . ", ScriptName='". $_FILES['txtScriptName']['name'] . "' WHERE SrNo=" .$_POST['hidID'];
           
            //Resultset To Execute The Query
            $update_res = mysql_query($update_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormJScriptDetail.php");
           
        }
       
        //IF frmhidMode Holds Value D (For Delete) Then Existing Record Need To Be Deleted From The Table formJavaScriptsDetail
        if($_POST['frmhidMode'] == "D")
        {
            //An DELTE query To Delete Existing Record
            $delete_qry = "DELETE FROM formJavaScriptsDetail WHERE SrNo IN (" .$_POST['frmDelID'] .")";
           
            //Resultset To Execute The Query
            $delete_res = mysql_query($delete_qry);   
           
            //Displaying The Same Page In The Browser
            header("location:FormJScriptDetail.php");
        }
    }
   
//******************************** Processing For Form Java Script Details Ends Here *******************************
?>