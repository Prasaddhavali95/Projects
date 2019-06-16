function validate()
{
   var iterationname;
   var startdate;
   var enddate;
   
   var error_msg = "";
   var flag = 1;

   var name_format;
 

   name_format=/^[a-zA-Z .-_]+$/; 
   

   iterationname = document.getElementById('txtiterationname').value;
   startdate = document.getElementById('inputField').value;
   enddate = document.getElementById('inputField_enddate').value;
   
   var diviterationname = document.getElementById('error');
   var divstartdate= document.getElementById('error2');
   var divenddate= document.getElementById('error3');
  

   
   if(iterationname.trim().length == 0) 
   {
        if (flag == 1) 
         document.getElementById('txtiterationname').focus(); 
      diviterationname.innerHTML = "Iteration name cannot be left blank ";
      document.getElementById('txtiterationname').style.borderColor = "#FF0000";
       return false;
      flag = 0;
   }
   if(!iterationname.match(name_format)) 
   {
      if (flag == 1) 
         document.getElementById('txtiterationname').focus(); 
      diviterationname.innerHTML = "Use only alphabets ";
      document.getElementById('txtiterationname').style.borderColor = "#FF0000";
       return false;
      flag = 0;
   }
   
   if (startdate.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('inputField').focus(); 
      divstartdate.innerHTML = "Startdate cannot be blank ";
      document.getElementById('inputField').style.borderColor = "#FF0000";
       return false;
      flag = 0;
   }
    if (enddate.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('inputField_enddate').focus(); 
      divenddate.innerHTML = "Enddate cannot be blank ";
      document.getElementById('inputField_enddate').style.borderColor = "#FF0000";
       return false;
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
