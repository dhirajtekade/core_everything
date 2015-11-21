<html>
	<head>
		<title>
			Timezone
		</title>
	<link rel="stylesheet" media="all" type="text/css" href="stylecss/timezone.css">
	 	<script src="script/jstz-1.0.4.min.js"></script> 
	<div class="validation">
	 <link rel= "stylesheet" type="text/css" href="../style/login.css">
	 <link rel= "stylesheet" type="text/css" href="../style/DadaCartHomeStyle.css">
	</head>
	<body>
	<?php
	//	include("validation.php");
	?>
	</div>
		<div id="main_div">
		<table id="header"><tr><td id="header_title">DadaCart </td></tr></table><br>
		<TABLE  CLASS="table" ALIGN="center" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#FFFFFF" BORDER=0> 
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
				<TR><TD COLSPAN=2><p>Timezone Converter</p></TD></TR>
				<TR>
					<TD COLSPAN=2>Source Date:</TD>
					<TD>
					<input type="textbox" name="day" value="<?php echo $_POST['day']; ?>" placeholder="day" size="1">&nbsp;
					<input type="textbox" name="month" value="<?php echo $_POST['month']; ?>" placeholder="month" size="1">&nbsp;
					<input type="textbox" name="year" value="<?php echo $_POST['year']; ?>" placeholder="year" size="4">&nbsp;- &nbsp;
					<input type="textbox" name="hours" value="<?php echo $_POST['hours']; ?>" placeholder="hrs" size="1">&nbsp;
					<input type="textbox" name="minutes" value="<?php echo $_POST['minutes']; ?>" placeholder="min" size="1">&nbsp;
					<input type="textbox" name="seconds" value="<?php echo $_POST['seconds']; ?>" placeholder="sec" size="1">&nbsp;<br><br>
						 
					</TD>
				</TR>
				<TR>
					<TD COLSPAN=2>Source Timezone:</TD>
					<TD>
						<?php include('source_timezonedropdown.php'); ?>
					</TD>
				</TR>
				<TR>
					<TD COLSPAN=2>Target Timezone:</TD>
					<TD>
						<?php include('target_timezonedropdown.php'); ?>
					</TD>
				</TR>
				<TR><TD>
					<INPUT TYPE="Button" VALUE="SUBMIT" onClick="submit()" class="myButton"><br/>
					</TD>
				</TR>
			</FORM>
		</TABLE> 
		<div class="resultBox">
			<?php
				include('commonfunctions.php');
			?>
		</div>
		</div>
	</body>
</html>
<?php

?>