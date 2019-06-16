function validate()
{
   var story;

   
  var error_msg = "";
   var flag = 1;

   var name_format;
   
   name_format=/^[a-zA-Z ,]+$/;
   

   story = document.getElementById('txtstory').value;
  
   
   var divstory = document.getElementById('error1');
  
  

   if(!story.match(name_format)) 
   {
      if (flag == 1) 
      document.getElementById('txtstory').focus(); 
      divstory.innerHTML = "Use only alphabets ";
      document.getElementById('txtstory').style.borderColor = "#FF0000";
      flag = 0;
   }
   if(story.trim().length == 0) 
   {
   	if (flag == 1) 
      document.getElementById('txtstory').focus(); 
      divstory.innerHTML = "Story cannot be left blank ";
      document.getElementById('txtstory').style.borderColor = "#FF0000";
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
