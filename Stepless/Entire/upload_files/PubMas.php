<?php
if($_POST['txtPubName']=="") {
	echo "<FONT COLOR='RED'>Please Enter Publisher's Name<FONT>";
	echo "<HR>";
	include("PublisherMaster.php");
}
/*elseif($_POST['txtCompany']=="") {
	echo "<FONT COLOR='RED'>Please Enter Company Name<FONT>";
	echo "<HR>";
	include("PublisherMaster.php");
}*/
elseif($_POST['optBook']<>TRUE) {
	echo "<FONT COLOR='RED'>Please Select Type of Book<FONT>";
	echo "<HR>";
	include("PublisherMaster.php");
}
elseif($_POST['chkBook']<>TRUE) {
	echo "<FONT COLOR='RED'>Please Select Location<FONT>";
	echo "<HR>";
	include("PublisherMaster.php");
}
elseif(($_POST['pwdPub']=="") || (is_numeric($_POST['pwdPub'])==FALSE)) {
	echo "<FONT COLOR='RED'>Please Enter Numeric Publisher's code<FONT>";
	echo "<HR>";
	include("PublisherMaster.php");
}
else {
	echo "<FONT COLOR='BLUE'>The Form Name is ".$_POST['frmName']."--This is a hidden Variable<FONT><BR>";
	echo "<FONT COLOR='BROWN'>Data Entered Successfully</FONT>";
	echo "<HR>";
	$_POST="";
	include("PublisherMaster.php");
}

$target_path = "uploads/";
//adding the original filename to our target path
$target_path = $target_path.basename($_FILES['file4Upload']['name']);
//getiing the temporary file
$_FILES['file4Upload']['tmp_name'];
?>