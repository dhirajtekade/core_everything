

	<!--  	<fieldset style="width:30%"><legend id="legendSignin"> Sign In Here </legend> -->
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		User Name :<br><input type="text" name="username" size="40"  id="userIn" autofocus><br>
		Password :<br><input type="password" name="userpassword" size="40"  id="userIn" ><br><br>
		<input type="checkbox" name="saveme" value="saveme">Save Me</input>
		<br><br>
		<input id="button" type="submit" name="submit" value="Sign In "/>
		</form>
		</fieldset>

