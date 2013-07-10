function isAlphaNum(strString)
{
     
   var strValidChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890@#$&%_*.- ' ";
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
   var strValidChars = "0123456789.+";
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


function step1_propmatch(form)
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
  var property_type=document.forms["step1"]["property_type_group"].value;
  var area=document.forms["step1"]["area"].value;
  var valuation_price=document.forms["step1"]["valuation_price"].value;
  var builtup_Area=document.forms["step1"]["builtup_Area"].value;
  var description=document.forms["step1"]["description"].value;
  var no_of_bedrooms=document.forms["step1"]["no_of_bedrooms"].value;
  var no_of_bathrooms=document.forms["step1"]["no_of_bathrooms"].value; 
var Minimum_Term=document.forms["step1"]["Minimum_Term"].value;    
   
   //First page validations:
//Radio button validate
  if(Type == "")//Type checking for null value
  {
    alert("Please select Property Type");	
	  return false;
  }
  

  //----------------------------------------------------------------------------
  if(name == "" )//Property name checking for null value
   {
          alert("Please enter Property name ");	
	  return false;
   }
    
  if(!isAlphaNum(name))//Alphanumeric validation for property name
   {
        alert("Please enter AlphaNumeric value for Property name ");
	return false;
   }
   
   
  //----------------------------------------------------------------------------
   if(price == "")//Property Price checking for null value
    {
        
        alert("Please enter Asking Price ");	
	return false;
    }
    
   if(price <= 0)//Property price==0
    {       
    alert("price is too low");	
	return false;
    }
    
   if(!IsNumeric(price))//Property price for numeric validation
   {
      //alert(price);
	alert("Please enter Numeric value for Price ");
	 return false;
   }
   
    
  //---------------------------------------------------------------------------- 
    
   if(!IsNumeric(valuation_price))//Property valuation price is numeric
   {
      	alert("Please enter Numeric value for Valuation Price ");
	 return false;
   }

//------------------------------------------------------------------------------
   if(area == "")//Property Price checking for null value
    {
        
        alert("Please Enter Land Area for Propmatch");	
	return false;
    }
    
     if(area == 0)
    {    
     alert("Land Area is too low");	
	return false;
    }//Validation for area end
    
   //area=parseInt(area);
   if(!IsNumeric(area))//Property Land area is numeric
   {
       //alert(area);
	alert("Please enter Numeric value for Area ");
	 return false;
   }
   

  //----------------------------------------------------------------------------
      
       //Validation for builtup_Area
//   if(builtup_Area == "" )//Builtup area for null value identification
//    {
//             
//        alert("Please Enter Builtup Area");	
//	return false;
//    }
   if(builtup_Area == "" )//Builtup area for null value identification
    {
      
       
        alert("Please Enter Builtup Area");	
	return false;
    }
    
   if(!IsNumeric(builtup_Area))//Builtup area for only numeric value identification
   {
       //alert(area);
	alert("Please enter Numeric value for Builtup Area ");
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
      alert("Builtup Area should be less than Land area");
	 return false;
      
   }
   
   if(Type == "sale")
         {
                           
               if(price < 100000)//Property price==0        1 lakh = price minimum including for propmatch  
                        {       
                              //alert("price is too low");
                              alert("For Propmatch : Asking price should be more than 100000 for propmatch.");	
                              return false;
                        }
         }
         
         
 //---------------------------------------------------------------------------

if(Type == "rent"){//checking for Type=rent if Yes Minimum_Term is mandetory
if(Minimum_Term == "")//
{
alert("Propmach: Minimum Term required For Rent");
return false;
}}

   //---------------------------------------------------------------------------

   //no_of_rooms=parseInt(no_of_rooms);
   no_of_bedrooms=parseInt(no_of_bedrooms);
   no_of_bathrooms=parseInt(no_of_bathrooms);
  
return true;
}



function step2_propmatch(form)
{
  
  var block_No=document.forms["step2"]["block_No"].value;
  var street=document.forms["step2"]["street"].value;
  var postal_Code=document.forms["step2"]["postal_Code"].value;
  var contact_no=document.forms["step2"]["contact_no"].value;
   var property_type=document.forms["step2"]["property_type"].value;
   var district=document.forms["step2"]["district"].value;
   var estate=document.forms["step2"]["estate"].value;
   //Second page validation
   //Validations only for HDB apt
   
    

   if(block_No == "")//Validation for block_no null value if Property Type = HDB property
   {
      if(property_type == "HDB Apartment")
      {
          alert("For HDB property:Block number is mandatory field on Propmatch");	
	  return false;
      }
   }
   else
   {
   if(!isAlphaNum(block_No))//If Entered Block number should be alphanumeric
   {
        alert("Please enter valid Block No ");
	return false;
   }
   }
   
   if(street == "")//Validation for Street not null value if Property Type = HDB property
   {
      if(property_type == "HDB Apartment")
      {
          alert("For HDB property: Street is mandatory");	
	  return false;
      }
   }
   //document.myform.options[document.myform.selectedIndex].text
   
   if(postal_Code == "")//validation for postal code not null Property Type = HDB property
    {
      if(property_type == "HDB Apartment"){
        
        alert("Please Enter Postal code");	
	return false;
      }
    }
   else
   {
      
      if(postal_Code == "")//validation for postal code not null Property Type = HDB property
       {
       alert("Postal code is manatory field on Propmatch");	
	return false;
       }
       
      if(!IsNumeric(postal_Code))
      {
      	alert("Please enter numeric value for Postal Code");
	return false;
      }
      
      postal_Code_sub=postal_Code.substr(0,2);
      postal_Code_sub=parseInt(postal_Code_sub);
      if(postal_Code.length != 6)
      {
         alert("Please enter 6 digit postal code");
         return false;
         
      }
      else
      if(postal_Code_sub == 74 || postal_Code_sub > 82)
      {
         alert("Please enter valid Postal Code");
         return false;
      }
   }
   
   if(district=="")
   {
           
        alert("Please select District for Propmatch");	
	return false;
   }
   
  
 
  if(estate=="")
  {
   if(property_type == "HDB Apartment"){
        
        alert("For HDB Apartment: Estate is mandatory field on Propmatch");	
	return false;
      }
  }
    
  
   if(!IsNumeric(contact_no))
   {
      //alert(price);
	alert("Please enter Numeric value for Contact no");
	 return false;
   }
 //------------------------------------------------------------
   return true;
 
}



function step3_propmatch(form)
{
   var No_Of_Storey=document.forms["step3"]["No_Of_Storey"].value;
    if(!IsNumeric(No_Of_Storey))
      {
      	alert("Please enter Numeric value for 'No Of Storey' ");
	return false;
      }
      
      
      return true;
}





   
