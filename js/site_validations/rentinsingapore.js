function isAlphaNum(strString)
{
     
   var strValidChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890@#$_*&.-% ' ";
   var strChar;
   var blnResult = true;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
      
}//isAlphaNum() ends


function IsNumeric(strString)
{
   var strValidChars = "0123456789";
   var strChar;
   var blnResult = true;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
}

String.prototype.trim = function () {
return this.replace(/^\s*|\s*$/,"");
}

function step1_rentinsingapore(form)
{
   var Type;
  var radioLength = document.forms["step1"]["Type"].length;
	if(radioLength == undefined){}
		if(document.forms["step1"]["Type"].checked)
			Type = document.forms["step1"]["Type"].value;
		else
			Type = "";
	for(var i = 0; i < radioLength; i++) {
		if(document.forms["step1"]["Type"][i].checked) {
			Type = document.forms["step1"]["Type"][i].value;
			break;
		}
	}

  var name=document.forms["step1"]["property_name"].value;
  var price=document.forms["step1"]["price"].value;
  var description=document.forms["step1"]["description"].value;
  description = document.forms["step1"]["description"].value.replace(/^\s*|\s*$/g,'');
  var area=document.forms["step1"]["area"].value;
  var valuation_price=document.forms["step1"]["valuation_price"].value;
  var builtup_Area=document.forms["step1"]["builtup_Area"].value;
  
  
  if(Type == "")
  {
    alert("Please Select Property Type ");	
	  return false;
  }
    //------------------------------------------------------------
    if(name == "" )
    {
          alert("Please Enter Property Name ");
          return false;
    }
    

   //Validation for price
 //------------------------------------------------------------
   if(price == "")
    {
        
        alert("Please Enter Asking Price ");	
	return false;
    }
    
    if(price <= 0)//Property price==0
    {       
    alert("Asking Price too low");	
	return false;
    }
    
   if(!IsNumeric(price))//Property price for numeric validation
   {
      //alert(price);
	alert("Please enter Numeric value for Asking Price ");
	 return false;
   }

 //Validation for price end
 
 
   if(!IsNumeric(valuation_price))//Property valuation price is numeric
   {
      	alert("Please enter Numeric value for Valuation Price ");
	 return false;
   }


//------------------------------------------------------------
//

   if(area == "")//Property Price checking for null value
    {
        
        alert("Please Enter Land Area ");	
	return false;
    }
    
     if(area == 0)
    {    
     alert("Land Area too low");	
	return false;
    }//Validation for area end
    
   //area=parseInt(area);
   if(!IsNumeric(area))//Property Land area is numeric
   {
       //alert(area);
	alert("Please enter numeric value for Land Area ");
	 return false;
   }
 //----------
 
    if(builtup_Area == "" )//Builtup area for null value identification
    {
      
       
        alert("Please Enter Builtup Area");	
	return false;
    }
    
   if(!IsNumeric(builtup_Area))//Builtup area for only numeric value identification
   {
       //alert(area);
	alert("Please enter numeric value for Builtup Area ");
	 return false;
   }
   
 builtup_Area=parseInt(builtup_Area);
   area=parseInt(area);
    
   //if(builtup_Area == 0)//builtup area==0
   // {
   //   alert("builtup_Area is too low");	
   //   return false;
   // }
      
   if(area < builtup_Area)
   {
      alert("Builtup Area should be less than Land Area");
	 return false;
      
   }
//   
     //Validation for description
   //description.trim();
   
   if(description == "")
    {
       
        alert("Please Fillup Description");	
	return false;
    }
   
    
   //Validation for description end
   //------------------------------------------------------------
   return true;
} // validate_all

function step2_rentinsingapore(form)
{
   var property_type=document.forms["step2"]["property_type"].value;
   var district=document.forms["step2"]["district"].value;
   var estate=document.forms["step2"]["estate"].value;
   var contact_no=document.forms["step2"]["contact_no"].value;

   if(district=="(select)")
   {
           
        alert("Please select District");	
	return false;
   }
   
   if(estate=="(select)"){
   if(property_type == "HDB Apartment"){
        
        alert("For HDB Apartment: Estate is mandatory field on RentInSingapore");	
	return false;
      }
   
}
 if(!IsNumeric(contact_no))
   {
      //alert(price);
	alert("Please enter numeric value for Contact no ");
	 return false;
   }
   return true;
}

function step3_rentinsingapore(form)
{	
  var No_Of_Storey=document.forms["step3"]["No_Of_Storey"].value;
   
     if(!IsNumeric(No_Of_Storey))
      {
      	alert("Please enter numeric value for 'No Of Storey'");
	return false;
      }
   return true;
}
