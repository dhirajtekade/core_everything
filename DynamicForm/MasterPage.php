<?php
/* Date:- 28-02-2015
 * Author: Dhiraj Tekade
 * 1.This file accepts a paramter (PageID) via the URL that calls it
 * 2.This Parameter will help identifying the page (form) to be generated
 * 3.Once the page is identified base on the PageID recieved as a paramter 
 *   appropriate records bound to that PageID are extracted from the respective DB tables defined
* */
$author = 'Dhiraj';
$styleSheetPath = "StyleSheets//";
$javaScriptPath = "JavaScript//";

//include php file that holds generic PHP functions
include_once "Generic/phpfunctions.php";

//varaibles for database
$user = "root";
$password = "root";
$database = "php-dt-ztest_php-20150228_study_dynamicformgeneration";

@mysql_connect(localhost, $user, $password) or die("Could Not Select A Database");
@mysql_select_db($database) or die("Could Not Select A Database");

$query = "SELECT * FROM FormsMaster WHERE PageID = $PageID";

print_r($query); exit;
$row = mysql_fetch_array($resultSet); 
?>
<HTML>
	<HEAD>
		<TITLE>
			<?php echo $row['PageTitle']; ?>
		</TITLE>
		<?php
			/* Query that will extract al the javascript files names from the FormJavaScriptDetails*/
			$query = "SELCT * FROM FormJavaScriptDetail WHERE PageID = $PageID";
			$resultSet = mysql_query($query);
			while($rowJS = mysql_fetch_array($resultSet)) {
		?>
	<!-- Producing script tags referring source java script filename -->
		<SCRIPT LANGUAGE = "JAVASCRIPT" 
				SRC = "<?php echo $javaScriptPath.$rowJS['ScriptName']; ?>"
				TYPE = "TEXT/JAVASCRIPT" >
		</SCRIPT>
		<?php 
			}
		?>
		<!-- Loading external css using data retrieved via the SQL query -->
		<LINK HREF = "<?php echo $styleSheetPath.$row['PageCSS']; ?>"
			  REL = "STYLESHEET" TYPE = "TEXT/CSS" >
	</HEAD>
		<!-- Onload events with approapriate function calls retrieved via SQL query ealier -->
	<BODY onLoad = "<?php echo $row['BodyonLoad']; ?>">
		<SCRIPT Language = "Javascript">
			function setEditMode(formname, id, field, val) {
				formname.hidMode.value = 'U';
				formname.hidID.value = id;
				arrField = field.split("/");
				arrValue = var.split("/");
				for(i = 0; i < arrField.length-1; i++)
					eval("document.form[0]."+arrField[i]+".value='"+arrValue[i]+"';");
				formname.cmdDelete.disabled = true;
			}
			function setDelMode(forname) {
				formname.hidMode.value = 'D';
				formDeleteValues('hidDelID');
			}
			function formDleteValues(hidden) {
				var selValues = "";
				var firstSelBox = "";
				for (i = 0; i < document.forms[0].element.length; i++) {
					if (document.forms[0].elements[i].type == "checkbox") {
						if (firstSelBox == "") {
							firstSelBox = i;
						}
						if (document.forms[0].element[i].checked == true) {
							selValues = selValues + document.forms[0].element[i].value + ",";
						}
					}
				}
				if (selValues.length < 1) {
					alert("Please choose records you wish to delete.");
					eval("document.forms[0].elements["+ firstSelBox + "].focus();");
				}
				else {
					selValues = selValues.substring(0, selValues.length-1);
					eval("document.forms[0]." + hidden + ".value = '" + selValues + "';");
					document.forms[0].submit();
				}
			}
		</SCRIPT>
		<FORM NAME = "<?php echo $row['FormName']; ?>"
			  ACTION = "<?php echo $row['FormAction']; ?>"
			  METHOD = "<?php echo $row['FormMethod'] ?>" >
			  <INPUT TYPE = "hidden" NAME = "hidPageID" VALUE = "<?php echo $PageID; ?>">
			  <INPUT TYPE = "hidden" NAME = "hidMode" VALUE = "I">
			  <INPUT TYPE = "hidden" NAME = "hidDelID" VALUE = "">
			  <INPUT TYPE = "hidden" NAME = "hidID" VALUE = "">
			  <TABLE ALIGN = "CENTER" WIDTH = "50%" CELLSPACING = "1" CELLSPADDING = "1" BORDERCOLOR = "#000000" BGCOLOR = "#FFFFFF">
			  	<TR>
			  		<TD>
			  			<FIELDSET CLASS = "textfield">
			  				<LEGEND>
			  					<?php echo $row['PageTitle']; ?>
			  				</LEGEND>
			  			<TABLE ALIGN = "CENTER" CELLSPACING = "0" CELLSPADDING = "0">
			  				<?php 	$frmObject = "";
									$fieldBound = "";
									$query = "SELECT * FROM FormObjectDetail
												WHERE PageID = $PageID
												AND ObjectType NOT IN ('submit','reset' )
												ORDER BY ObjectSequenceNumber";
									$resultSet = mysql_query($query);
									if (mysql_num_rows($resultSet) > 0) {
										while($row = mysql_fetch_array($resultSet)) {
							?>
							<TR>
								<TD CLASS = "NormalText" ALIGN = "RIGHT">
									<?php
										echo $row['ObjectLable'];
									?>:&nbsp;&nbsp;
								</TD>
								<TD>
									<?php
										if ($row['ObjectType']=="textarea") {
											$frmObject.= $row['ObjectName']."/";
											$fieldBound.= $row['ObjectBoundTo']."/";
									?>
									<TEXTAREA 
										<?php
											echo $row['ObjectParameters'];
										?>
										NAME = "<?php echo $row['ObjectName']; ?>"
										CLASS = "textfield">
										</TEXTAREA>
										<?php
											}
											elseif($row['ObjectType'] == "Combobox")
											{
												$frmObject.= $row['ObjectName']."/";
												$fieldBound.=$row['ObjectBoundTo']."/";
												if($row['ObjectValue']=="")
												{
													getStaticSelectBox($row['ObjectName'],
													$row['ObjectStaticValue'],"","");
												}
												else
												{
													getSelectBox($row['ObjectName'],"SELECT * FROM".
													$row['ObjectTable'], $row['ObjectBoundTo'],
													$row['ObjectValue'],"","","false");	
												}
											}
											else 
											{
												$frmObject.= $row['ObjectName']."/";
												$fieldBound.= $row['ObjectBoundTo']."/";
										?>
										<!-- Producing a text box -->
										<INPUT TYPE = "<?php echo $row['ObjectType']; ?>"
												CLASS = "textfield"
												<?php echo $row['ObjectParameters']; ?> >
										<?php 
												}
											}
										}
										?>
								</TD>
							</TR>
			  			</TABLE>
			  			<TABLE ALIGN = "CENTER" CELLPADDING = "0" CELLSPACING = "0" WIDTH="80%">
			  				<?php
								$query = "SELECT * FROM FormObjectsDetail WHERE PAgeID = $PageID
											AND ObjectType IN ('submit', 'reset')
											ORDER BY ObjectSequenceNumber";
								$resultSet = mysql_query($query);
								if(mysql_num_rows($resultSet) > 0)
								{
			  				?>
			  				</TR>
			  					<TD>&nbsp;</TD>
			  					<TD ALIGN = "RIGHT">
			  						<?php
										while($row = mysql_fetch_array($resultSet))
										{
											if ($row['ObjectType']=="reset")
											{	
			  						?>
			  						<!-- producing reset button -->
			  						<INPUT CLASS = "btnStyle" TYPE = "<?php echo $row['ObjectType']; ?>"
			  								VALUE = "<?php echo $row['ObjectLabel']; ?>"
			  								<?php echo $row['ObjectParameters']; ?>
			  								onClick = "Javascript:document.form[0].cmdDelete.disabled = false;">
			  								<?php 
											}
			  								else
			  								{
			  								?>
			  						<!-- producing a standard button -->
			  						<INPUT CLASS = "btnStyle" TYPE = "<?php echo $row['ObjectType']; ?>"
			  								VALUE = "<?php echo $row['ObjectLabel']; ?>"
			  								<?php echo $row['ObjectParameters']; ?>>
			  								<?php 
													}
												}
											}
			  								?>
			  							</TD>
			  						</TR>
			  					</TABLE>
			  					<BR>
			  			</FIELDSET>
			  		</TD>
			  	</TR>
			  </TABLE>
			  <?php
				$query = "SELECT * FROM FormsMaster WHERE PageID = $PageID";
				$resultSet = mysql_query($query);
				$formName = mysql_result($resultSet, 0, 'FormName');
				$query = "SELECT * FROM FormGridDetail WHERE PageID = $PageID";
				$resultSet = mysql_query($query);
				$cnt = 0;
				$tableName = mysql_result($resultSet, 0, 'TableName');
				$queryData = "SELECT * FROM ".$tableName;
				$resultSetData = mysql_query($queryData);
				$recCount = mysql_num_rows($resultSetData);
				
				if($recCount > 0) {
					echo "<TABLE BORDER = \"0\" ALIGN = \"CENTER\" WIDTH = \"50%\" 
							CELLPADDING = \"1\" CELLSPACING = \"1\" 
							BORDERCOLOR = \"#333333\" BGCOLOR = \"#FFFFFF\">
							 <TR ALIGN =\"LEFT\" BORDERCOLOR = \"#333333\" BGCOLOR = \"#999999\" 
							   CLASS = \"BOLDTEXT\">
							 	<TD WIDTH = \"52\">
							 		<INPUT TYPE = \"button\" NAME = \"cmdDelete\"
							 			VALUE = \"Delete\" CLASS = \"btnstyle\" onClick = \"setDelMode(document.".$formName.");\">
								</TD>";
					while($cnt < mysql_num_rows($resultSet)) {
						if ($cnt == 0) {
							$tableName = mysql_result($resultSet, $cnt, 'TableName');
							$selectedField = mysql_result($resultSet, $cnt, 'PrimaryKeyColumn');
							$priKey = mysql_result($resultSet, $cnt, 'PrimaryKeyColumn');
						} 
						$selectedField.= ",".mysql_result($resultSet,$cnt, 'ColumnName');
						echo "<TD class = \"BOLDTEXT\">".mysql_result($resultSet, $cnt, 'ColumnLabel')."</TD>";
						$cnt ++;
					}
					echo "</TR>";
					$queryData = "SELECT ".$selectedField. " FROM ".$tableName;
					$resultSetData = mysql_query($queryData);
					
					while($rowData = mysql_fetch_array($resultSetData)) {
						echo "<TR BORDERCOLOR = \"#333333\" BGCOLOR = \"#99CCFF\"
								onMouseOver = \"this.bgColor = '#EFEEC9';
								onMouseOut = \"this.bgColor = '#99CCFF';\"
								CLASS = \"NormalText\">";
						$arrFieldBound = split("/", fieldBound);
						for($cntj = 0; $cntj < count($arrFieldBound)-1; $cntj++) {
							$query = "SELECT ".$arrFieldBound[$cntj]." FROM ".$tableName. " WHERE ".$priKey. "=".$rowData[0];
							$resultSetValue = mysql_query($query);
							
							if($cntj == 0) {
								$arrFieldValue = mysql_result($resultSetValue, 0, $arrFieldBound[$cntj]);
							}
							else 
							{
								$arrFieldValue.="/";
								mysql_result($resultSetValue, 0, $arrFieldBound[$cntj]);
							}
						}
						for($cnt = 0; $cnt <= mysql_num_rows($resultSet); $cnt++) {
							if ($cnt == 0){
								echo "<TD ALIGN = \"CENTER\">
										<INPUT TYPE = \"checkbox\" NAME = \"chk".$rowData[$cnt]."\"
							 			VALUE = \"".$rowData[$cnt]."\">
										<TD>";
							}
							else
							{
								echo "<TD SYTLE = \"cursor:pointer\" CLASS = \"NormalText\" 
											onMouseDown = \"setEditMode(document.".$formName.",".$rowData[0].",".$frmObject."','".$arrFieldValue."');\">".$rowData[$cnt]."</TD>";
							}
						}
						echo "</TR>";
					}
					echo "</TABLE>";
				}
				mysql_close();
			  ?>
			</FORM>	
	</BODY>
</HTML>













