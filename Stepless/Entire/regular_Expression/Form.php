<html>
	<head>
		<title>
			PUBLISHER MASTER
		</title>
	</head>
	<body>
		<TABLE WIDTH="396" ALIGN="center" CELLPADDING="1" CELLSPACING="1" BORDERCOLOR="#000000" BGCOLOR="#FFFFFF">
			<TR>
				<TD>
					<FIELDSET>
						<LEGEND>
							<FONT COLOR="blue">Author's Details</FONT>
						</LEGEND>
						<!-- ENCTYPE is necessary for the form element of file type -->
						<TABLE WIDTH ="389" ALIGN="center" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#FFFFFF">
							<FORM ACTION="Reg_validation.php" METHOD="POST" NAME="frmForm">
								<TR>
									<TD COLSPAN=2>Author  Name: </TD>
									<TD>
										<INPUT TYPE="Text" PLACEHOLDER="FirstName MiddleName LastName" NAME="txtAuthorName" SIZE="30" MAXLENGTH="30" TABINDEX="1" onFocus="this.select()"
										VALUE="<?php echo $_POST['txtAuthorName'] ?>">
									</TD>
								</TR>
								<TR>
									<TD COLSPAN=2>Company Name: </TD>
									<TD>
										<INPUT  TYPE="Text" NAME="txtCompany" SIZE="30" MAXLENGTH="50" TABINDEX="2"
										VALUE="<?php echo $_POST['txtCompany'] ?>">
									</TD>
								</TR>
								<TR><!-- Adding  Email.and validating it in reg_validation.php input type=email is not choosen-->
									<TD COLSPAN=2>Email: </TD>
									<TD>
										<INPUT  TYPE="Text" NAME="txtEmail" SIZE="30" MAXLENGTH="50" TABINDEX="3"
										VALUE="<?php echo $_POST['txtEmail'] ?>">
									</TD>
								</TR>
								<TR><!-- format mm/dd/yyy or mm-dd-yyyy or mm.dd.yyyy is acceptable-->
									<TD COLSPAN=2>Date(mm/dd/yyy): </TD>
									<TD>
										<INPUT  TYPE="date" NAME="date" SIZE="30" MAXLENGTH="50" TABINDEX="4"
										VALUE="<?php echo $_POST['date'] ?>">
									</TD>
								</TR>

								<TR>
									<TD>
										<INPUT TYPE="Button" VALUE="Submit" onClick="submit()">
									</TD>
									<TD>
										<INPUT TYPE="Reset" NAME="cmdReset" VALUE="RESET">
									</TD>
								</TR>
								<TR>
									<TD>
										<INPUT TYPE="Hidden" NAME="frmForm" VALUE="Author Details" />
									</TD>
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