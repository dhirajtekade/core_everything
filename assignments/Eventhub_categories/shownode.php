<table><tr><td>
<?php 
//node id need to be fetched
include 'dbconn.php';
global $id, $LeftID, $RightID;
$node_id= $_GET["id"];
//$LeftID= $_GET["LeftID"];
//$RightID= $_GET["RightID"];
$query = "SELECT * FROM ".$table;
$result = mysql_query($query) or die("sql query failed");

//$result= mysql_query($query) or die("sql query failed");
//$node_data = mysql_fetch_assoc($result);
	if (!empty($node_id)) 
	{
		echo "<strong>1) Fetched record from position table for id =".$node_id.": </strong><br>";
		$node_data = getNodeData($node_id);
		displayNodeDetail($node_data);
		echo '<br><br>';
		
	#from ledt id
		$LeftID= $node_data['left_id'];
		echo "<strong>2) Fetched record from position table using LeftID=".$LeftID.": </strong><br>";
		displayNodeWithLeftID($node_data);
		echo '<br><br>';
		
	#from right id
		$RightID= $node_data['right_id'];
		echo "<strong>3) Fetched record from position table using RightID=".$RightID.": </strong><br>";
		displayNodeWithRightID($node_data);
		echo '<br><br>';
	}
	
	function displayNodeDetail($node_data)
	{	
		echo 'Node ID: '.$node_data['id'].'<br>';
		echo 'Node Name: <strong>'.$node_data['name'].'</strong><br>';
		echo 'Left ID: '.$node_data['left_id'].'<br>';
		echo 'Right ID: '.$node_data['right_id'].'<br>';
	}
	
	function getNodeData($node_id)
	{
		include 'dbconn.php';
		$query = "SELECT * FROM ".$table." WHERE id = ".$node_id;
		$result= mysql_query($query) or die("sql query failed");
		$node_data = mysql_fetch_assoc($result);
		return $node_data;
	}
	
	function displayNodeWithLeftID($node_data)
	{
		include 'dbconn.php';
		global $LeftID;
		echo "Display Node With Left ID";
		//explode($node_data);
		$search_id = $node_data['left_id'] - 1;
		//$query= "SELECT child.id,child.name,child.left_id, child.right_id FROM celkotable parent, celkotable child WHERE child.right_id = 5";
		$query = "SELECT child.id,child.name,child.left_id, child.right_id FROM ".$table." parent,".$table." child WHERE child.right_id =".$search_id;
		//echo $query;
		$result= mysql_query($query) or die("sql query failed");
		$row = mysql_fetch_assoc($result);
		//print_r($row);
		if (!empty($row)) 
		{
			$query = "SELECT name FROM ".$table." WHERE right_id =".$search_id;
			$result= mysql_query($query) or die("sql query failed");
			$leftrelated_with = mysql_fetch_assoc($result);
			echo '<br><strong>'.$leftrelated_with['name'].'</strong> is my sibling before me';
			echo '<br><br>'.$leftrelated_with['name'].'<br>|<br>'.$node_data['name'];
		}
		else
		{
			//Find A node (item) that has LeftID = [My LeftID
			$query = "SELECT child.id,child.name,child.left_id, child.right_id FROM ".$table." parent,".$table." child WHERE child.left_id = ".$search_id;
			$result= mysql_query($query) or die("sql query failed");
			$row = mysql_fetch_assoc($result);
			//print_r($row);
			if(!empty($row))
			{
				$query = "SELECT name FROM ".$table." WHERE left_id =".$search_id;
				$result= mysql_query($query) or die("sql query failed");
				$leftrelated_with = mysql_fetch_assoc($result);
				echo '<br><strong>'.$leftrelated_with['name'].'</strong> is my parent and I am first child of it';
				echo '<br>'.$leftrelated_with['name'];
				echo '<br>|<br>---'.$node_data['name'];
			}
			else
			{
				echo '<br>Either there is some problem in data or I am at the top in the tree';
			}

		}
		
	}	
	
	function displayNodeWithRightID($node_data)
	{
		include 'dbconn.php';
		global $RightID;
		echo "Display Node With Right ID";
		//explode($node_data);
		$search_id = $node_data['right_id'] + 1;
		//$query= "SELECT child.id,child.name,child.left_id, child.right_id FROM celkotable parent, celkotable child WHERE child.right_id = 5";
		$query = "SELECT child.id,child.name,child.left_id, child.right_id FROM ".$table." parent,".$table." child WHERE child.left_id =".$search_id;
		//echo $query;
		$result= mysql_query($query) or die("sql query failed");
		$row = mysql_fetch_assoc($result);
		//print_r($row);
		if (!empty($row)) 
		{
			$query = "SELECT name FROM ".$table." WHERE left_id =".$search_id;
			$result= mysql_query($query) or die("sql query failed");
			$rightrelated_with = mysql_fetch_assoc($result);
			echo '<br><strong>'.$rightrelated_with['name'].'</strong> is my sibling after me';
			echo '<br>'.$node_data['name'].'<br>|';
			echo '<br>'.$rightrelated_with['name'];
		}
		else
		{
			//Find A node (item) that has RightID = [My RightID+1]
			$query = "SELECT child.id,child.name,child.left_id, child.right_id FROM ".$table." parent,".$table." child WHERE child.right_id = ".$search_id;
			$result= mysql_query($query) or die("sql query failed");
			$row = mysql_fetch_assoc($result);
			//print_r($row);
			if(!empty($row))
			{
				$query = "SELECT name FROM ".$table." WHERE right_id =".$search_id;
				$result= mysql_query($query) or die("sql query failed");
				$rightrelated_with = mysql_fetch_assoc($result);
				echo '<br><strong>'.$rightrelated_with['name'].'</strong> is my parent and I am last child of it';
			}
			else
			{
				echo '<br>Either there is some problem in data or I am at the top in the tree';
			}

		}
		
	}	
/*				echo '<br>'.$leftrelated_with['name'];
				echo '<br>|<br>--'.$node_data['name'];
				echo '<br>'.$rightrelated_with['name'];*/
	
?></td><td>
	
	</td></tr></table>