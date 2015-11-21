<html>
	<head>
		<title>
			BMR
		</title>		
	</head>
	<body>
		<TABLE WIDTH="396" ALIGN="center" CELLPADDING="1" CELLSPACING="1" BORDERCOLOR="#000000" BGCOLOR="#FFFFFF">
			<TR>
				<TD>
					<FIELDSET>
						<LEGEND>
							<FONT COLOR="blue">User Details</FONT>
						</LEGEND>
						<!-- ENCTYPE is necessary for the form element of file type -->
						<TABLE WIDTH ="389" ALIGN="center" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#FFFFFF">
							<FORM ACTION="validation.php" METHOD="POST" NAME="userform" ENCTYPE="multipart/form-data" ><!--  onsubmit="alert('Confirm');" --> 
								<TR>
									<TD COLSPAN=2>Enter Your Name:</TD>
									<TD>
										<SELECT NAME="salutation">
											<OPTION <?php if($_POST['salutation']=='Mr') echo 'SELECTED'; ?>>Mr</OPTION>
											<OPTION <?php if($_POST['salutation']=='Mrs') echo 'SELECTED'; ?>>Mrs</OPTION>
											<OPTION <?php if($_POST['salutation']=='Miss') echo 'SELECTED'; ?>>Miss</OPTION>
											<!-- 
											<OPTION <?php if($_POST['salutation']=='PHP') echo 'SELECTED'; ?>>Dr</OPTION>
											<OPTION <?php if($_POST['salutation']=='PHP') echo 'SELECTED'; ?>>Prof</OPTION>
											 -->
										</SELECT>
										<INPUT TYPE="Text" NAME="fistName" SIZE="30" MAXLENGTH="15" TABINDEX="1" PLACEHOLDER="First Name" onFocus="this.select()"
										VALUE="<?php echo $_POST['fistName'] ?>"><span></span>
										<INPUT TYPE="Text" NAME="lastName" SIZE="30" MAXLENGTH="15" TABINDEX="1" PLACEHOLDER="Last Name" onFocus="this.select()"
										VALUE="<?php echo $_POST['lastName'] ?>"><span></span>
									</TD>
								</TR>
								<TR><!-- Adding another textbox. Used readonly-->
									<TD COLSPAN=2>Current Weight: </TD>
									<TD><!-- ask for current weight and weight wanted to maintain -->
										<INPUT PLACEHOLDER="Kg" TYPE="Text" NAME="weight" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['weight'] ?>">
									</TD>
								</TR>
								<TR>
									<TD COLSPAN=2>Desired Weight: </TD>
									<TD><!-- ask for current weight and weight wanted to maintain -->
										<INPUT PLACEHOLDER="Kg" TYPE="Text" NAME="dweight" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['dweight'] ?>">
									</TD>
								</TR>
								<!-- Adding radio buttons -->
								<TR>
									<TD COLSPAN=2>Height</TD>
									<TD>
										<INPUT PLACEHOLDER="cm" TYPE="Text" NAME="height" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['height'] ?>">
									</TD>
								</TR>
								<!-- 
								either ask for dd-mm-yyyy dropdown or use datetimepicker property
								either ask for timezone you born in or ask for birthplace and calculate using google place or something like that
								either calculate from sitetimezone but there may mismatch then in data for some cases
								 -->
								<TR>
									<TD COLSPAN=2>Date Of Birth:</TD>
									<TD>
										<?php include("dob.php"); ?>
									</TD>
									<TD>
										<!-- Select timezone dropdown -->
										
									</TD>
								</TR>
								<!-- Adding a select box -->
								<TR>
									<TD COLSPAN=2>WorkType:</TD>
									<TD>
										<SELECT NAME="worktype" SIZE="1" TABINDEX="7">
											<OPTION <?php if($_POST['worktype']=='sedentary') echo 'SELECTED'; ?>>Sedentary</OPTION>
											<OPTION <?php if($_POST['worktype']=='lightlyactive') echo 'SELECTED'; ?>>Lightly Active</OPTION>
											<OPTION <?php if($_POST['worktype']=='moderatelyactive') echo 'SELECTED'; ?>>Moderately Active</OPTION>
											<OPTION <?php if($_POST['worktype']=='veryactive') echo 'SELECTED'; ?>>Very Active</OPTION>
										</SELECT>
										INFO
									</TD>
								</TR>
								<!-- Adding a password field -->
								<TR>
									<TD COLSPAN=2>Food Preference:</TD>
									<TD>
										<INPUT TYPE="radio" NAME="optBook" VALUE="vegetarian" CHECKED="true" TABINDEX="3" <?php if($_POST['foodPreference']=='vegetarian') echo 'CHECKED=TRUE'; ?>>vegetarian
										<INPUT TYPE="radio" NAME="optBook" VALUE="Non-vegetarian" TABINDEX="4"  <?php if($_POST['foodPreference']=='Non-vegetarian') echo 'CHECKED=TRUE'; ?>>Non-vegetarian
									</TD>
								<TR>
									<TD COLSPAN=2>Gender:</TD>
									<TD>
										<INPUT TYPE="radio" NAME="gender" VALUE="Male" CHECKED="true" TABINDEX="3" <?php if($_POST['gender']=='Male') echo 'CHECKED=TRUE'; ?>><img src="images/male-sign.jpg" height="25px" width="25px">
										<INPUT TYPE="radio" NAME="gender" VALUE="Female" TABINDEX="4"  <?php if($_POST['gender']=='Female') echo 'CHECKED=TRUE'; ?>><img src="images/female-sign.jpg" height="25px" width="25px">
									</TD>
								</TR>
								<TR>
									<TD>
										<!--  <INPUT TYPE="Submit" NAME="cmdSub" VALUE="SUBMIT">-->
										<!--  type:button to avoid unconscious use of 'enter' button on keyword -->
										<INPUT TYPE="Button" VALUE="SUBMIT" onClick="submit()">
									</TD>
									<!-- Adding reste button -->
									<TD>
										<INPUT TYPE="Reset" NAME="cmdReset" VALUE="RESET">
									</TD>
								</TR>
								<!-- Adding a hidden input tag -->
								<TR>
								
								</TR>
							</FORM>
						</TABLE>
					</FIELDSET>
				</TD>
			</TR>
		</TABLE>
	</body>
</html>
<?php

?>