// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('desc').value == "") {
alert("Fill Name and Description Fields !");
} else {
document.getElementById('form').submit();
//oText = oForm.elements["name"];

// get entered values
// insert records in db
alert("form submitted!");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}

function show_addbookForm() {
	document.getElementById('show_table').style.display = "none";
	document.getElementById('show_form').style.display = "block";
}