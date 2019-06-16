function validate()
{
   var name;
   var product;
   var startdate;
   var enddate;
   
   var error_msg = "";
   var flag = 1;

   var name_format;
   var email_format;

   name_format=/^[a-zA-Z ]+$/; 
   

   name = document.getElementById('txtproject').value;
   product = document.getElementById('txtproduct').value;
   startdate = document.getElementById('inputField').value;
   enddate = document.getElementById('enddate').value;
   
   var divname = document.getElementById('error');
   var divproduct= document.getElementById('error1');
   var divstartdate= document.getElementById('error2');
   var divenddate= document.getElementById('error3');
  

   if(!name.match(name_format)) 
   {
      if (flag == 1) 
         document.getElementById('txtproject').focus(); 
      divname.innerHTML = "Use only alphabets ";
      document.getElementById('txtproject').style.borderColor = "#FF0000";
      flag = 0;
   }
   if(name.trim().length == 0) 
   {
   	  if (flag == 1) 
         document.getElementById('txtproject').focus(); 
      divname.innerHTML = "Name cannot be left blank ";
      document.getElementById('txtproject').style.borderColor = "#FF0000";
      flag = 0;
   }
   if(!product.match(name_format)) 
   {
      if (flag == 1) 
         document.getElementById('txtproduct').focus(); 
      divproduct.innerHTML = "Use only alphabets ";
      document.getElementById('txtproduct').style.borderColor = "#FF0000";
      flag = 0;
   }
     if (product.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('txtproduct').focus(); 
      divproduct.innerHTML = "Product cannot be blank ";
      document.getElementById('txtproduct').style.borderColor = "#FF0000";
      flag = 0;
   }
  
     if (startdate.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('inputField').focus(); 
      divstartdate.innerHTML = "Startdate cannot be blank ";
      document.getElementById('inputField').style.borderColor = "#FF0000";
      flag = 0;
   }
    if (enddate.trim().length == 0) 
   {
      if (flag == 1) 
         document.getElementById('enddate').focus(); 
      divenddate.innerHTML = "Enddate cannot be blank ";
      document.getElementById('enddate').style.borderColor = "#FF0000";
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
