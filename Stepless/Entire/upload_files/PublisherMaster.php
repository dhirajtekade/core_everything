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
							<FONT COLOR="blue">Publisher Details</FONT>
						</LEGEND>
						<!-- ENCTYPE is necessary for the form element of file type -->
						<TABLE WIDTH ="389" ALIGN="center" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#FFFFFF">
							<FORM ACTION="PubMas.php" METHOD="POST" NAME="frmPublisherMAster" ENCTYPE="multipart/form-data">
								<TR>
									<TD COLSPAN=2>Publisher Name: </TD>
									<TD><!-- used value so that form elements retain their old values -->
										<INPUT TYPE="Text" NAME="txtPubName" SIZE="30" MAXLENGTH="15" TABINDEX="1" onFocus="this.select()"
										VALUE="<?php echo $_POST['txtPubName'] ?>">
									</TD>
								</TR>
								<TR><!-- Adding another textbox. Used readonly-->
									<TD COLSPAN=2>Company Name: </TD>
									<TD>
										<INPUT READONLY="true" PLACEHOLDER="PARAM SOFTWARE SERVICES" TYPE="Text" NAME="txtCompany" SIZE="30" MAXLENGTH="15" TABINDEX="2"
										VALUE="<?php echo $_POST['txtCompany'] ?>">
									</TD>
								</TR>
								<!-- Adding radio buttons -->
								<TR>
									<TD COLSPAN=2>Type OF Book</TD>
									<TD>
										<INPUT TYPE="radio" NAME="optBook" VALUE="Technical" CHECKED="true" TABINDEX="3" <?php if($_POST['optBook']=='Technical') echo 'CHECKED=TRUE'; ?>>Technical
										<INPUT TYPE="radio" NAME="optBook" VALUE="Non-Technical" TABINDEX="4"  <?php if($_POST['optBook']=='Non-Technical') echo 'CHECKED=TRUE'; ?>>Non-Technical
									</TD>
								</TR>
								<!-- Adding check boxes -->
								<TR>
									<TD COLSPAN=2>Location:</TD>
									<TD>
										<INPUT TYPE="Checkbox" NAME="chkBook" VALUE="Mumbai" CHECKED="True" TABINDEX="5" <?php if($_POST['chkBook']=='Mumbai') echo 'CHECKED=TRUE'; ?> >Mumbai
										<INPUT TYPE="Checkbox" NAME="chkBook" VALUE="Pune"  TABINDEX="6" <?php if($_POST['chkBook']=='Pune') echo 'CHECKED=TRUE'; ?>>Pune
									</TD>
								</TR>
								<!-- Adding a select box -->
								<TR>
									<TD COLSPAN=2>Select A Book:</TD>
									<TD>
										<SELECT NAME="selectBook" SIZE="1" TABINDEX="7">
											<OPTION <?php if($_POST['selectBook']=='MySQL5') echo 'SELECTED'; ?>>MySQL5</OPTION>
											<OPTION <?php if($_POST['selectBook']=='ORACLE') echo 'SELECTED'; ?>>ORACLE</OPTION>
											<OPTION <?php if($_POST['selectBook']=='PHP') echo 'SELECTED'; ?>>PHP</OPTION>
											<OPTION <?php if($_POST['selectBook']=='APACHE') echo 'SELECTED'; ?>>APACHE</OPTION>
										</SELECT>
									</TD>
								</TR>
								<!-- Adding a password field -->
								<TR>
									<TD COLSPAN=2>Publisher Code:</TD>
									<TD>
										<INPUT TYPE=PASSWORD NAME="pwdPub" SIZE="30" MAXLENGTH="15" TABINDEX="8" VALUE="<?php echo $_POST['pwdPub']; ?>">
									</TD>
								</TR>
								<!-- Uploading files to the web server -->
								<!--  <TR>
									<TD COLSPAN=2>File Uploading</TD>
									<TD>
										<INPUT TYPE="File" NAME="file4Upload"></INPUT>
									</TD>
								</TR>-->
								<!-- Adding a text area -->
								<TR>
									<TD COLSPAN=2>Comments:</TD>
									<TD>
										<TEXTAREA NAME="Comment" ROWS=6 COLS=30 TABINDEX="9" VALUE="<?php echo $_POST['Comment']; ?>"></TEXTAREA>
									</TD>
								</TR>
								<!-- Adding a submit button -->
								<TR>
									<TD>
										<!--  <INPUT TYPE="Submit" NAME="cmdSub" VALUE="SUBMIT">-->
										<!--  type:button to avoid unconscious use of 'enter' button on keyword -->
										<INPUT TYPE="Button" VALUE="Submit" onClick="submit()">
									</TD>
									<!-- Adding reste button -->
									<TD>
										<INPUT TYPE="Reset" NAME="cmdReset" VALUE="RESET">
									</TD>
								</TR>
								<!-- Adding a hidden input tag -->
								<TR>
									<TD>
										<INPUT TYPE="Hidden" NAME="frmName" VALUE="Publisher Details" />
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