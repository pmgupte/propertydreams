function isAlphaNum(strString)
{
     
   var strValidChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890*.- '";
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
   var strValidChars = "0123456789.-";
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

function validate_all(form)
{
  // document.write(document.documentElement.getAttribute(document.forms["create_Ad"]["Type"]));	
   // get all form elements
   //Validation for property name
  //var Type=document.forms["create_Ad"]["Type"].value;
  var Type;
  var radioLength = document.forms["create_Ad"]["Type"].length;
	if(radioLength == undefined){}
		if(document.forms["create_Ad"]["Type"].checked)
			Type = document.forms["create_Ad"]["Type"].value;
		else
			Type = "";
	for(var i = 0; i < radioLength; i++) {
		if(document.forms["create_Ad"]["Type"][i].checked) {
			Type = document.forms["create_Ad"]["Type"][i].value;
			break;
		}
	}

  var name=document.forms["create_Ad"]["property_name"].value;
  var price=document.forms["create_Ad"]["price"].value;
  var description=document.forms["create_Ad"]["description"].value;
  
 // document.write(document.forms["create_Ad"]["Type"].value);
//return false;
  if(Type == "")
  {
    alert("Property Type should not be blank");	
	  return false;
  }
    //------------------------------------------------------------
    if(name == "" )
    {
          alert("Property name should not be blank");	
	  return false;
    }
    
//    if(!isAlphaNum(name))
//   {
//        alert("Property name should be alphanumeric");
//	return false;
//   }//-->Validation for property name end
//   
   
   //Validation for price
 //------------------------------------------------------------
   if(price == "")
    {
        
        alert("Property price should not be blank");	
	return false;
    }
    
//   if(!IsNumeric(price))
//   {
//      //alert(price);
//	alert("Price should be numeric");
//	 return false;
//   }
//   
//   if(price == 0)
//    {       
//    alert("price is too low");	
//	return false;
//    }
//     //Validation for price end
   
     //------------------------------------------------------------
    //Validation for valuation_price
//   if(valuation_price == "")
//    {
//       
//        alert("valuation_price should not be blank");	
//	return false;
//    }
    
//   if(!IsNumeric(valuation_price))
//   {
//       //alert(area);
//	alert("valuation_price should be numeric");
//	 return false;
//   }
//   if(valuation_price == 0)
//    {
//       
//        alert("valuation_price is too low");	
//	return false;
//    }

   //Validation for valuation_price end
 
   //------------------------------------------------------------
   //Validation for area
//   if(area == "")
//    {
//       
//        alert("Area should not be blank");	
//	return false;
//    }
//    
//   if(!IsNumeric(area))
//   {
//       //alert(area);
//	alert("Area should be numeric");
//	 return false;
//   }
//   
//    if(area == 0)
//    {    
//     alert("Area is too low");	
//	return false;
//    }//Validation for area end
//   //------------------------------------------------------------
//      
//   
//    
//   //Validation for builtup_Area
//   if(builtup_Area == "" )
//    {
//       
//        alert("builtup_Area should not be blank");	
//	return false;
//    }
//    
//   if(!IsNumeric(builtup_Area))
//   {
//       //alert(area);
//	alert("builtup_Area should be numeric");
//	 return false;
//   }
//   
//     if(builtup_Area == 0)
//    {   alert("builtup_Area is too low");	
//	return false;
//    }
//   builtup_Area=parseInt(builtup_Area);
//   area=parseInt(area);
//   if(area < builtup_Area)
//   {
//      alert("builtup_Area should less than Land area");
//	 return false;
//      
//   }//Validation for builtup_Area end
//   //------------------------------------------------------------
//   no_of_rooms=parseInt(no_of_rooms);
//   no_of_bedrooms=parseInt(no_of_bedrooms);
//   no_of_bathrooms=parseInt(no_of_bathrooms);
//  
//   if(no_of_bedrooms>no_of_rooms)
//   {
//    alert("No bedrooms can not be more than no of rooms");
//	 return false;
//   }
//   //------------------------------------------------------------
//   if(no_of_rooms<no_of_bathrooms)
//   {
//    alert("No bathrooms can not be more than no of rooms");
//	 return false;
//   }
//   //------------------------------------------------------------
//   
     //Validation for description
   if(description == "")
    {
       
        alert("description should not be blank");	
	return false;
    }
   //Validation for description end
   //------------------------------------------------------------
   
} // validate_all
