<?php 

$countryname = $_GET['countryname'];
if($countryname == 'IN'){

echo "<option name='state_name'  value=''>--select--</option>";
echo "<option name='state_name'  value='MH'>Maharashtra</option>";
echo "<option name='state_name'  value='DH'>Delhi</option>";
echo "<option name='state_name'  value='MP'>Madya pradesh</option>";
}elseif($countryname == 'JP'){
echo "<option name='state_name'  value=''>--select--</option>";
echo "<option name='state_name'  value='tq'>Tokeo</option>";
echo "<option name='state_name'  value='jp'>japana</option>";
echo "<option name='state_name'  value='jb'>japanb</option>";
}

?>