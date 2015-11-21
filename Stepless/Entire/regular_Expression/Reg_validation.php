<?php
try {
	list($m, $d, $y) = split("/", $_POST['date']);
	if ($m >12 ) {
		throw new Exception("Month should be less than 12");
		}
	} 
	catch(Exception $exception) {
		echo "Month should be less than 12";
}
if($_POST['txtAuthorName']=="") {
	echo "<FONT COLOR='RED'>Please Enter Authors's Name<FONT>";
	echo "<HR>";
	include("Form.php");
}
elseif($_POST['txtCompany']=="") {
	echo "<FONT COLOR='RED'>Please Enter Company Name<FONT>";
	echo "<HR>";
	include("Form.php");
}

elseif($_POST['txtEmail']=="") {
	echo "<FONT COLOR='RED'>Please Enter Email ID<FONT>";
	echo "<HR>";
	include("Form.php");
}
//this will validate the email address on all browsers
elseif(ereg("^[a-zA-Z]+@[a-zA-z]+\.[a-zA-Z]+$", $_POST['txtEmail'])== FALSE) {
	echo "Please Enter Valid email address";
	
}
elseif($_POST['date']=="" || ereg("([0-9]{1,2})[/.-]([0-9]{1,2})[/.-]([0-9]{4})", $_POST['date'])== FALSE) {
	echo "<FONT COLOR='RED'>Please Enter valid date<FONT>";
	echo "<HR>";
	include("Form.php");
}



else {

	echo "<HR><FONT COLOR='BLUE'>The Form Name is ".$_POST['frmForm']."--This is a hidden Variable<FONT><BR>";
	echo "<FONT COLOR='BROWN'>Data Entered Successfully</FONT>";
	list($fname, $mname, $lname) = split(" ", $_POST['txtAuthorName']);
	echo "<BR>First Name: ".$fname;
	echo "<BR>Last Name: ".$lname;
	echo "<BR>Email: ".$_POST['txtEmail'];
	echo "<BR>date: ".$_POST['date'];
	

	echo "<HR>";
	$_POST="";
	include("Form.php");
	
}

?>