<?php
/*echo "data validation will be here. IF passed then it will move to pubMas.php!!";
//the path of the file i.e where the file is going to be placed
$target_path = "uploads/";
//adding the original filename to our target path
$target_path = $target_path.basename($_FILES['file4Upload']['name']);

//getiing the temporary file
$_FILES['file4Upload']['tmp_name'];*/

$target_path = "uploads/";
$target_path = $target_path.basename($_FILES['uploadedFile']['name']);
//
if(move_uploaded_file($_FILES['uploadedFile']['tmp_name'],$target_path)) {
	echo "The file ".basename($_FILES['uploadedFile']['name'])."has been uploaded";
}
else {
	echo "There was an error uploading the file, please try again!";
}
?>