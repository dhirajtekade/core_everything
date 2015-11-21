<html>
	<head>
		<title>
			BMR
		</title>
	<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.21/themes/ui-lightness/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    </script><script type="text/javascript" src="http://192.168.0.65:90/xd-dt/eventhub/stable/html/themes/eventhub/scripts/jquery.session.js"><!--Empty tag workaround for script tag--></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<script type="text/javascript" src="script/jquery-ui-sliderAccess.js"></script>
	<script type="text/javascript" src="script/jquery-ui-timepicker-addon.js"></script>   
	<link rel="stylesheet" media="all" type="text/css" href="style/jquery-ui-timepicker-addon.css">
		
	</head>
	<body>
		<TABLE  ALIGN="center" CELLPADDING="1" CELLSPACING="1" BORDERCOLOR="#000000" BGCOLOR="#FFFFFF">
			<TR>
				<TD>
					<FIELDSET>
						<LEGEND>
							<FONT COLOR="blue">User Details</FONT>
						</LEGEND>
						<!-- ENCTYPE is necessary for the form element of file type -->
						<TABLE  ALIGN="center" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#FFFFFF">
							<!--  <FORM ACTION="validation.php" METHOD="POST" NAME="userform" ENCTYPE="multipart/form-data" >--> <!--  onsubmit="alert('Confirm');" --> 
							<form method="post" action="validation.php">	
								<TR>
									<TD COLSPAN=2>Enter Your Name:</TD>
									<TD>
										<SELECT NAME="salutation">
											<OPTION <?php if($_POST['salutation']=='Mr') echo 'SELECTED'; ?>>Mr</OPTION>
											<OPTION <?php if($_POST['salutation']=='Mrs') echo 'SELECTED'; ?>>Mrs</OPTION>
											<OPTION <?php if($_POST['salutation']=='Miss') echo 'SELECTED'; ?>>Miss</OPTION>
											<OPTION <?php if($_POST['salutation']=='Dr') echo 'SELECTED'; ?>>Dr</OPTION>
											<OPTION <?php if($_POST['salutation']=='Prof') echo 'SELECTED'; ?>>Prof</OPTION>
										</SELECT><BR>
										<INPUT TYPE="Text" NAME="firstName" SIZE="30" MAXLENGTH="15" TABINDEX="1" PLACEHOLDER="First Name" onFocus="this.select()"
										VALUE="<?php echo $_POST['firstName'] ?>">
										<span class="error">* <?php echo $firstNameErr;?></span><br>
										<INPUT TYPE="Text" NAME="lastName" SIZE="30" MAXLENGTH="15" TABINDEX="1" PLACEHOLDER="Last Name" onFocus="this.select()"
										VALUE="<?php echo $_POST['lastName'] ?>">
										<span class="error">* <?php echo $lastNameErr;?></span><br>
									</TD>
								</TR>
								<!-- Use mailto function to send the mail using SMTP settings -->
								<TR><!-- -->
									<TD COLSPAN=2>Email: </TD>
									<TD><!-- ask for current weight and weight wanted to maintain -->
										<INPUT PLACEHOLDER="Email" TYPE="email" NAME="email" SIZE="30" MAXLENGTH="60" TABINDEX="2"
										VALUE="<?php echo $_POST['email'] ?>"><span></span>
									</TD>
								</TR>
								<TR><!-- -->
									<TD COLSPAN=2>Current Weight: </TD>
									<TD><!-- ask for current weight and weight wanted to maintain -->
										<INPUT PLACEHOLDER="Kg" TYPE="Text" NAME="weight" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['weight'] ?>">
										<span class="error">* <?php echo $weightErr;?></span>
									</TD>
								</TR>
								<TR>
									<TD COLSPAN=2>Desired Weight: </TD>
									<TD><!-- ask for current weight and weight wanted to maintain -->
										<INPUT PLACEHOLDER="Kg" TYPE="Text" NAME="dweight" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['dweight'] ?>">
										<span class="error">* <?php echo $dweightErr;?></span>
									</TD>
								</TR>
								<!-- Adding radio buttons -->
								<TR>
									<TD COLSPAN=2>Height</TD>
									<TD>
										<INPUT PLACEHOLDER="cm" TYPE="Text" NAME="height" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['height'] ?>">
										<span class="error">* <?php echo $heightErr;?></span><br>
									</TD>
								</TR>
								<!-- 
								either ask for dd-mm-yyyy dropdown or use datetimepicker property
								either ask for timezone you born in or ask for birthplace and calculate using google place or something like that
								either calculate from sitetimezone but there may mismatch then in data for some cases
								 -->
								<TR>
									<TD COLSPAN=2>Date Of Birth:</TD>
									<TD><input type="text" name="datetimepicker" id="datetimepicker" VALUE="<?php echo $_POST['datetimepicker'] ?>"/>
										<script type="text/javascript">
									           $('#datetimepicker').datetimepicker({
									                showSecond: false,
									                timeFormat: 'hh:mm',
									                stepHour: 1,
									                stepMinute: 5,
									                stepSecond: 10
									            });
									
									        </script>
									</TD>
								<TR>
									<TD COLSPAN=2>Timezone of Birth Place:</TD>
									<TD>
										<!-- Select timezone dropdown -->
										<?php include('timezonedropdown.php'); ?>
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
										<INPUT TYPE="radio" NAME="foodPreference" VALUE="vegetarian" CHECKED="true" TABINDEX="3" <?php if($_POST['foodPreference']=='vegetarian') echo 'CHECKED=TRUE'; ?>><img src="images/veg.svg" height="25px" width="25px" alt="Vegetarian" title="Vegetarian">
										<INPUT TYPE="radio" NAME="foodPreference" VALUE="Non-vegetarian" TABINDEX="4"  <?php if($_POST['foodPreference']=='Non-vegetarian') echo 'CHECKED=TRUE'; ?>><img src="images/non-veg.jpg" height="25px" width="25px" alt="Non-Vegetarian" title="Non-Vegetarian">
									</TD>
								<TR>
									<TD COLSPAN=2>Gender:</TD>
									<TD>
										<INPUT TYPE="radio" NAME="gender" VALUE="Male" CHECKED="true" TABINDEX="3" <?php if($_POST['gender']=='Male') echo 'CHECKED=TRUE'; ?>><img src="images/male-sign.jpg" height="25px" width="25px" alt="Male" title="Male">
										<INPUT TYPE="radio" NAME="gender" VALUE="Female" TABINDEX="4"  <?php if($_POST['gender']=='Female') echo 'CHECKED=TRUE'; ?>><img src="images/female-sign.jpg" height="25px" width="25px" alt="Female" title="Female">
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