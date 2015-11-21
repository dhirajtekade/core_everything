<?php 
	include ("ccelko.php");
	
	function print_celko ($celko, $IDParent)
	{
		$rs_nodes = $celko->SelectSubNodes($IDParent);
		if ($rs_nodes)
		{
			print ("<table>");
			print ("<tr>");
			print ("<td>IDNode</td>");
			print ("<td>IDParent</td>"); 
			print ("<td width='150'>&nbsp;</td>"); 
			print ("<td>Left</td>"); 
			print ("<td>Right</td>"); 
			print ("<td width='150'>&nbsp;</td>"); 
			print ("<td>Differ</td>");
			print ("<td>Level</td>"); 
			print ("<td>Order</td>"); 
			print ("<td>Ignore</td>"); 
			print ("<tr>");
			while ($row_nodes = mysql_fetch_assoc ($rs_nodes))
			{ 
				print ("<tr>");
				print ("<td>" . $row_nodes["IDNode"] . "</td>");
				print ("<td>" . $row_nodes["IDParent"] . "</td>"); 
				print ("<td width='150'>&nbsp;</td>"); 
				print ("<td>" . $row_nodes["NSLeft"] . "</td>"); 
				print ("<td>" . $row_nodes["NSRight"] . "</td>"); 
				print ("<td width='150'>&nbsp;</td>"); 
				print ("<td>" . $row_nodes["NSDiffer"] . "</td>");
				print ("<td>" . $row_nodes["NSLevel"] . "</td>"); 
				print ("<td>" . $row_nodes["NSOrder"] . "</td>"); 
				print ("<td>" . $row_nodes["NSIgnore"] . "</td>"); 
				print ("<tr>");
			}
			print ("</table>");
			mysql_free_result ($rs_nodes);
		}
	}
	
	
	$celko = new CCelkoNastedSet(); 

	$mylink = mysql_connect ("localhost", "root", "root");
	mysql_select_db("celko", $mylink);

	$celko->MyLink = $mylink; 
	$celko->TableName = "tblnastedsets"; 
	$celko->FieldID = "IDNode"; 
	$celko->FieldIDParent = "IDParent"; 
	$celko->FieldLeft = "NSLeft"; 
	$celko->FieldRight = "NSRight"; 
	$celko->FieldDiffer = "NSDiffer";
	$celko->FieldLevel = "NSLevel"; 
	$celko->FieldOrder = "NSOrder"; 
	$celko->TransactionTable = " tblcelkotranstable"; 

	$celko->BeginTransaction ();
	$celko->ClearNodes();

	$IDParent = $celko->AddRootNode ();
	$IDLeft = $celko->AddNode ($IDParent);
	$IDRight = $celko->AddNode ($IDParent);
	$celko->AddNode ($IDLeft);
	$Dest = $celko->AddNode ($IDLeft);
	$Src = $celko->AddNode ($IDRight);
	$celko->AddNode ($IDRight);
	$celko->AddNode ($Src);
	$celko->AddNode ($Src);

	print ("Move " . $Src . " to " . $Dest . "<br><br>");
	print_celko ($celko, $IDParent);
	$celko->MoveNode ($Src, $Dest); 
	print ("<br><br>");
	print_celko ($celko, $IDParent);

	$celko->EndTransaction ();
?>