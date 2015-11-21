<?php


    /* A variable named $author is defined to store the name of the programmer who designed/coded the page. */
        $author = 'DhirajT';

    /* Variables to hold the connection parameters. */
        $user = "root";
        $pwd = "root";
        $db = "php-dt-ztest_php-20150228_study_dynamicformgeneration";
       
    // Connecting to the database
        @mysql_connect(localhost, $user, $pwd) or die("Connection Failed");

    // Selecting the database
        mysql_select_db($db) or die("Could not select the database!");
        /* Verifying that the form is currently in the INSERT mode. */
    /* If the Form Is in INSERT Mode Then. */
    if($_POST['hidMode'] =="I")
    {
    /* A SQL query to get the object name, database field name, and table name based on the current PageID. */
        $query = "SELECT ObjectName, ObjectBoundTo, ObjectTable                     FROM FormObjectsDetail WHERE ObjectType NOT IN ('submit', 'reset') AND PageID = " . $_POST['hidPageID'];
       
    // Resultset to hold the retrieved records
        $resultSetFirst = mysql_query($query);


    // Query to retrieve the primary key column
        $query = "SELECT PrimaryKeyColumn    FROM FormGridDetail WHERE PageID = " . $_POST['hidPageID'];
       
    // Resultset to hold the primary key column
        $resultSetSecond = mysql_query($query);
       
    // Query to retrieve the maximum value of the primary key column and add 1 to it
        $query = "SELECT MAX(" . mysql_result($resultSetSecond, 0,
                        PrimaryKeyColumn) .") + 1 ID
                            FROM " . mysql_result($resultSetFirst, 0, ObjectTable);
       
    // Resultset to hold the maximum value of the primary key column with one added to it
        $resultSetThird = mysql_query($query);

    // Retrieving the Value Of The Primary Key Column
        $arr =  mysql_fetch_array($resultSetThird);

    // Initializing the Primary key value
        if ($arr[0])
            $MAXID = mysql_result($resultSetThird, 0, ID);
        else
            $MAXID = 1;

    // Variable to hold database source fields for insertion
        $insertField = "";
       
    // Variable to hold the values for database fields for insertion
        $insertValue = "";
   
    // To Hold The Record Count
        $recCount = mysql_num_rows($resultSetFirst);

    /* Loop until counter variable value reaches the recordcount, this loop is used to create a comma separated list of source field names and the destination values in the insert statement. */
        for($cnt = 0; $cnt < $recCount; $cnt++)
        {
        /* If Counter Variable Holds Zero (i.e. holds only one column)
        Then. */
            if ($cnt ==0)
            {
                $insertField = mysql_result($resultSetFirst, $cnt, ObjectBoundTo);
                $insertValue = "'"  . $_REQUEST[mysql_result($resultSetFirst,
                                                        $cnt, ObjectName)] . "'";
            }


        // Otherwise
            else
            {
                $insertField .= ", " . mysql_result($resultSetFirst, $cnt, ObjectBoundTo);
                $insertValue .= ", '" . $_REQUEST[mysql_result($resultSetFirst,
                                                        $cnt, ObjectName)] . "'";
            }
        }

    // Insertion Query
        $query = "INSERT INTO " . mysql_result($resultSetFirst, 0, ObjectTable) . "(" .
                    mysql_result($resultSetSecond, 0, PrimaryKeyColumn) . "," .
                    $insertField . ") VALUES (" . $MAXID . "," . $insertValue . ")";
       
    // Executing the Insert SQL query
        mysql_query($query);

    // Passing the control over to the MasterPage.php
        header("Location:masterpage.php?PageID=" . $_POST['hidPageID']);
    }
    /* Verifying that the form is currently in the UPDATE mode. */
    if($_POST['hidMode'] == "U")
    {
    /* A SQL query to get the object name, database field name, and table name based on the current PageID. */
        $query = "SELECT ObjectName, ObjectBoundTo, ObjectTable                     FROM FormObjectsDetail WHERE ObjectType NOT IN ('submit', 'reset') AND PageID = " . $_POST['hidPageID'];
       
    // Resultset to hold the retrieved records
        $resultSetFirst = mysql_query($query);
// A SQL query to retrieve the primary key column
        $query = "SELECT PrimaryKeyColumn FROM FormGridDetail WHERE PageID = " . $_POST['hidPageID'];
       
    // Resultset to hold the primary key column
        $resultSetSecond = mysql_query($query);

    // To hold the record count
        $recCount = mysql_num_rows($resultSetFirst);

    /* Loop until counter variable value reaches the recordcount, this loop is used to create a comma separated list of source field names and the destination values in the update statement. */
        for($cnt=0; $cnt < $recCount; $cnt++)
        {
        // If counter variable holds zero then
            if ($cnt == 0)
            {
                $query = "UPDATE " . mysql_result($resultSetFirst, $cnt, ObjectTable)
                            . " SET " . mysql_result($resultSetFirst, $cnt, ObjectBoundTo)
                            ."='" . $_REQUEST[mysql_result($resultSetFirst,                                $cnt, ObjectName)] . "'";
            }
        // Otherwise
            else
            {
                $query .= ", " . mysql_result($resultSetFirst, $cnt, ObjectBoundTo)
                            . "='" . $_REQUEST[mysql_result($resultSetFirst,
                                                        $cnt, ObjectName)] ."'";
            }
        }       

    // Update Query
        $query .= " WHERE " . mysql_result($resultSetSecond, 0, PrimaryKeyColumn)
                    . "=" . $_REQUEST['hidID'];

    // Executing the Update SQL query
        mysql_query($query);

    // Passing the control over to the MasterPage.php
        header("Location:masterpage.php?PageID=" . $_POST['hidPageID']);
    }
// If the Form Is in DELETE Mode Then
    if($_POST['hidMode'] == "D")
    {
    /* A SQL query to get the object name, database field name, and table name based on the current PageID. */
        $query = "SELECT ObjectTable FROM FormObjectsDetail                     WHERE ObjectType NOT IN ('submit', 'reset') AND PageID = " . $_POST['hidPageID'];
       
    // Resultset to hold the retrieved records
        $resultSetFirst = mysql_query($query);

    // Query to retrieve the primary key column
        $query = "SELECT PrimaryKeyColumn FROM FormGridDetail                     WHERE PageID = " . $_POST['hidPageID'];

    // Resultset to hold the primary key column
        $resultSetSecond = mysql_query($query);
       
    /* Building and executing a SQL query for deletion. */
        $query = "DELETE FROM " . mysql_result($resultSetFirst, 0, ObjectTable)
                    ." WHERE " . mysql_result($resultSetSecond, 0, PrimaryKeyColumn)
                    . " IN(" . $_REQUEST['hidDelID'] .")";

    // Executing the Delete SQL query
        mysql_query($query);

    // Passing the control over to the MasterPage.php
        header("Location:masterpage.php?PageID=" . $_POST['hidPageID']);
    }