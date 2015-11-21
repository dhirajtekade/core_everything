<legend>Free Sign Up</legend>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		
		<table>
			<tr>
				<td>
					<input type="text" name="firstname"  placeholder="First Name" id="userIn">
					<!-- <span class="error">*<?php echo $firstnameErr;?></span> -->
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="lastname"  placeholder="Last name" id="userIn">
					<!-- <span class="error">*<?php echo $lastnameErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="text" name="username"  placeholder="username" id="userIn" maxlength="15">
					<!-- <span class="error">*<?php echo $usernameErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="email" name="email"  placeholder="Email" id="userIn">
					<!-- <span class="error">*<?php echo $emailErr;?></span> -->
				</td>
			</tr>
						
			<tr>
				<td>
					<input type="password" name="userpassword"  placeholder="New Password" id="userIn">
					<!-- <span class="error">*<?php echo $userpasswordErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					Birthday
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="date" name="birthday" id="userIn">
					<!-- <span class="error">*<?php echo $birthdayErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="radio" name="sex" value="male">Male
				
					<input type="radio" name="sex" value="female">Female
				
					<!-- <span class="error">*<?php echo $sexErr;?></span> -->
				</td>
			</tr>
			<tr>
				<td>
					<?php $string ='QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
							$string_shuf= str_shuffle($string);
							$three_string_shuf=substr($string_shuf,0, strlen($string)/12); ?>
					<input type="text" id ="captcha" name="captcha" size="6" value= 
								<?php echo $three_string_shuf;?> readonly="readonly"> 
								<!--captcha  validation to be done -->
								
					<input type="text" id="captcha_match" name="captcha_match" size="3">
				
						<input type="button" value="cant see" onclick="captcha()"/>
					<script>
						function captcha(){if()}
					</script>
				</td>
			</tr>		
			<tr>
				<td>
					<input id="button" type="submit" name="submit" value="Sign Up "/>
					
				</td>
			</tr>
		</table>