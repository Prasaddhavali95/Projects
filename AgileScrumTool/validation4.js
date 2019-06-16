function validate()
{
   var name;
   var email;
   var password;
   
   var error_msg = "";
   var flag = 1;

  var name_format;
   var email_format;

   name_format=/^[a-zA-Z]+$/; 
   email_format=/^[a-zA-Z][\w+\.\-]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
 
   

   name = document.getElementById('txtname').value;
   email = document.getElementById('txtemail').value;
   password = document.getElementById('txtpassword').value;
   
   var divname = document.getElementById('error');
   var divemail = document.getElementById('error1');
   var  divpassword = document.getElementById('error2');;
  
  

   

   if(name.trim().length == 0) 
   {
        if (flag == 1) 
         document.getElementById('txtname').focus(); 
      divname.innerHTML = "Name cannot be left blank ";
      document.getElementById('txtname').style.borderColor = "#FF0000";
       return false;
      flag = 0;
   }
   if(!name.match(name_format)) 
   {
      if (flag == 1) 
         document.getElementById('txtname').focus(); 
      divname.innerHTML = "Use only alphabets ";
      document.getElementById('txtname').style.borderColor = "#FF0000";
       return false;
      flag = 0;
   }

   if (!email.match(email_format)) 
   {
      if (flag == 1) 
         document.getElementById('txtemail').focus(); 
      divemail.innerHTML = " Enter a valid email ";
      document.getElementById('txtemail').style.borderColor = "#FF0000";
      flag = 0;
   }

     if (email.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('txtemail').focus(); 
      divemail.innerHTML = "Email cannot be blank ";
      document.getElementById('txtemail').style.borderColor = "#FF0000";
      flag = 0;
   }
   
   if(password.trim().length < 6 || password.trim().length > 10)
  {
         if (flag == 1) 
     {
         document.getElementById('txtpassword').focus(); 
        
     }

      divpassword.innerHTML = "Password length should be between 6 and 10 characters";
      document.getElementById('txtpassword').style.borderColor = "#FF0000";
      flag = 0;  

  }
    if (password.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('txtpassword').focus(); 
      divpassword.innerHTML = "Password cannot be blank ";
      document.getElementById('txtpassword').style.borderColor = "#FF0000";
      flag = 0;
   }
   
  

   if(flag == 0)
   {
     //divname.innerHTML = error_msg;     
       return false;
   }
   else
   {
       return true;
   }    
}
