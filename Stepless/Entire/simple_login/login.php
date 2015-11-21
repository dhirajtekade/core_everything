<?php
/*to built a trusted system with clients/customer websites need to restrict access on several aspects
	need login form
	need db management system with login registartion
	php program on web server that will process data and validations.
	Whenever any web server runs ona computer, it creates several objects. 
	One of these objects is an array named POST. The POST array accepts form data being returned by an HTML form to the web server.
	 
* */

?>
<html>
	<head>
		<title>
			PARAMSS.COM-LOGIN
		</title>
	</head>
	<body>
		<FORM ACTION="validation.php" METHOD="POST" NAME="frmLogin" ENCTYPE="multipart/form-data">
			<TABLE>
				<TR>
					<TD ALIGN="center">
						<IMG SRC="images/security.jpg" WIDTH="64" HEIGHT="64" BORDER="0">
						<BR>
						Welcome to Param software services  website<BR>
						Use a valid username and passowrd<BR>
						to gain access to the administartion console
					</TD>
					<TD BORDERCOLOR="#DEEFF9">
						<TABLE WIDTH="25%" BORDER="1" ALIGN="center" CELLPADDING="3" CELLSPACING="1" BORDERCOLOER="#000000">
							<TR BORDERCOLOR="#92CAEB" BGCOLOR="white">
								<TD COLSPAN="2">Member Login</TD>
							</TR>
							<TR BORDERCOLOR="#E6F3FB">
								<TD ALIGN="right">USername:</TD>
								<TD>
									<INPUT NAME="txtusername" TYPE="text" TABINDEX=1 VALUE="<?php echo $_POST['txtusername'] ?>"  SIZE="15" MAXLENGTH="15">
								</TD>
							</TR>
							<TR BORDERCOLOR="#E6F3FB">
								<TD ALIGN="right">Password:</TD>
								<TD>
									<INPUT NAME="txtpassword" TYPE="password" TABINDEX=2 VALUE="<?php echo $_POST['txtpassword'] ?>"  SIZE="15" MAXLENGTH="15">
								</TD>
							</TR>
							<TR BORDERCOLOR="#E0EEF7">
								<TD>&nbsp;</TD>
								<TD ALIGN="right">
									<INPUT NAME="submit" TYPE="submit" VALUE="Sign In" TABINDEX=3>
								</TD>
							</TR>
						</TABLE>
					</TD>
				</TR>
			</TABLE>
		</FORM>	
	</body>
</html>