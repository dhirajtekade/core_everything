<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#country_name').change(function() {  
	alert("hello");
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();
    alert('hello');
$.ajax({
  url: 'getoption.php',
  type: 'GET',
  data: 'countryname=selectvalue',
  success: function(data) {
	//called when successful
	$('#states').html(data);
  },
  error: function() {
	//called when there is an error
	//console.log(e.message);
  }
});
});
});
</script>

<html>
<select id="contry">
<option name="country_name" id="country_name" value="">--select--</option>
<option name="country_name" id="country_name" value="IN">India</option>
<option name="country_name" id="country_name" value="JP">Japan</option>
<option name="country_name" id="country_name" value="Ch">China</option>
</select>
<select id="states">
</select>

</html>