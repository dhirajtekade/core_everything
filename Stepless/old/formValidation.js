function formValidation()  
	{  
	var firtname= document.registration.firstname;
	var lastname= document.registration.lastname;
	var username = document.registration.username;
	var userpassword = document.registration.userpassword;   
	var email = document.registration.email;
	var birthday = document.registration.birthday;
	 if(userid_validation(uid,5,12))  
		{  
		if(firstname_validation())  
			{  
			if(allLetter(uname))  
				{  
				if(alphanumeric(uadd))  
					{   
					if(countryselect(ucountry))  
						{  
						if(allnumeric(uzip))  
							{  
							if(ValidateEmail(email))  
								{  
								 
								{  
								}  
								}   
							}  
						}   
					}  
				}  
			}  
		}  
	return false;  
	}  
