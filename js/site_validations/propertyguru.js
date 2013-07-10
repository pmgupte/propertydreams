function isAlphaNum(strString)
{
     
   var strValidChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890@#$_*&%.- ' ";
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


function step1_propertyguru(form)
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
   
   //First page validations:
//Radio button validate
  if(Type == "")//Type checking for null value
  {
    alert("Please Select Property Type");	
	  return false;
  }


  //----------------------------------------------------------------------------
  if(name == "" )//Property name checking for null value
   {
          alert("Please enter Property Name ");	
	  return false;
   }
    
  if(!isAlphaNum(name))//Alphanumeric validation for property name
   {
        alert("Please enter AlphaNumeric value for Property Name ");
	return false;
   }
   
   
  //----------------------------------------------------------------------------
   if(price == "")//Property Price checking for null value
    {
        
        alert("Please enter Asking Price ");	
	return false;
    }
    
   if(price <= 0)
   {
         alert("Asking price too low");
         return false;
   } 
    
   if(!IsNumeric(price))//Property price for numeric validation
   {
      //alert(price);
	alert("Please enter Numeric value for Asking Price ");
	 return false;
   }

//   if(price <= 0)//Property price==0
//    {       
//    alert("price is too low");	
//	return false;
//    }
 
    
                                                              // select property type if (price.sale > 100000000){ error}
    
  //---------------------------------------------------------------------------- 
    
   if(!IsNumeric(valuation_price))//Property valuation price is numeric
   {
      	alert("Please enter numeric value for Valuation Price ");
	 return false;
   }

//------------------------------------------------------------------------------    
//if(area == "")
    //{    
      //alert("Please enter Land Area");	
       //return false;
    //}
    //if(area == 0)
      // {    
        //alert("Land Area too low");	
          // return false;
       //}//Validation for area end
//   area=parseInt(area);
   if(!IsNumeric(area))//Property Land area is numeric
      {
       //alert(area);
	alert("Please enter numeric value for Land Area ");
	 return false;
      }
	if(property_type == 'Landed House')
	{
		if(area == "")
    		{
			alert("For Landed House :Land Area is mandatory on PropertyGuru");	
			return false;	
		}
		if(area <= 0)
      	 	{    
     			 alert("Land Area too low");	
      			 return false;
      		}	//Validation for area end

		if(builtup_Area == "" )//Builtup area for null value identification
    		{
      			 alert("For Landed House :Builtup Area is mandatory on PropertyGuru");	
			 return false;
    		}
    
  	 	if(builtup_Area <= 0 )//Builtup area for 0 value identification
    		{
      			alert("Builtup Area is too low");	
			return false;
    		}
	}
	if(property_type == 'Land')
	{
		if(area == "")
    		{
			alert("For Land :Land Area is mandatory on PropertyGuru");	
			return false;	
		}
		if(area <= 0)
      	 	{    
     			 alert("Land Area too low");	
      			 return false;
      		}	//Validation for area end
		if(builtup_Area != "" )//Builtup area for 0 value identification
    		{	if(builtup_Area <= 0)
      			{
				alert("Builtup Area is too low");	
				return false;
			}
    		}
	}
//    if(area == "")
//    {    
//      alert("Please enter Land Area");	
//	return false;
//    }
  //----------------------------------------------------------------------------
      
       //Validation for builtup_Area
   if(builtup_Area == "" )//Builtup area for null value identification
    {
      if(property_type != 'Land')
	{
       		alert("Please enter Builtup Area");	
		return false;
        }
    }

   if(builtup_Area == 0 )//Builtup area for 0 value identification
    {
      
       if(property_type != 'Land')
	{
        	alert("Please enter Builtup Area more than zero.");	
		return false;
	}
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
      alert("Builtup Area should be less than Land area");
	 return false;
      
   }
  // if(no_of_bedrooms == 0)
    //   {
      //   alert("No of Bedrooms should be greater than 0 for Propertyguru");
        // return false;
       //}
   
     
   if(Type == "sale")
         {
            
            if(property_type == 'Apartment or Condo' || property_type =='Landed House' || property_type =='HDB Apartment')
                {           

                        if(price >= 1000000000 || valuation_price >= 1000000000)//Property price==0        1 million = price
                                 {       
                                       //alert("price is too low");
                                       alert("For PropertyGuru : Asking price and Valuation price should be less than 1000000000 ");	
                                       return false;
                                 }
                                 
                        else{
                                    price=parseInt(price);
                                    price_psf=price/builtup_Area;
                                    
                                 if(price_psf<50)
                                  {
                                    alert("For PropertyGuru : Cannot list Sale price below S$50 psf ");
                                    return false;
                                  }
                              }
                }
                else
                {
                  
                        if(price >= 1000000000 || valuation_price >= 1000000000)//Property price==0        1 million = price
                                 {       
                                       //alert("price is too low");
                                       alert("For PropertyGuru : Asking price and Valuation price should be less than 1000000000");	
                                       return false;
                                 }                  
                }
          }            
         
   if(Type == "rent")
        {

         if(property_type == 'Apartment or Condo' || property_type =='Landed House' || property_type =='HDB Apartment')
            {                  
               if(price >= 1000000000 || valuation_price >= 1000000000)//Property price==0
                        {       
                             alert("For PropertyGuru : Asking price and Valuation price should be less than 1000000000");	
                              return false;
                        }  

                 else{
                      price=parseInt(price);
                      price_psf=price/builtup_Area;
                        if(price_psf>50)
                         {
                             alert("For PropertyGuru : Cannot list Rent price above S$50 psf ");
                             return false;
                         }
			if(price_psf<0.5)
                         {
                             alert("For PropertyGuru : Cannot list Rent price below S$0.5 psf ");
                             return false;
                         }
                     }
            }
            else
            {
                        if(price >= 1000000000 || valuation_price >= 1000000000)//Property price==0        1 million = price
                                 {       
                                       //alert("price is too low");
                                       alert("For PropertyGuru : Asking price and Valuation price should be less than 1000000000");	
                                       return false;
                                 }                  
            }
         }            
    
  
   
//    price=parseInt(price);
//      price_psf=price/builtup_Area;
//    
//    
//   if(price_psf<=50)
//   {
//      alert("Cannot list Sale price below S$50 psf");               //org
//      //alert("Please enter sale asking price S$50 psf");
//	 return false;
//   }
//

   //---------------------------------------------------------------------------

   //no_of_rooms=parseInt(no_of_rooms);
   no_of_bedrooms=parseInt(no_of_bedrooms);
   no_of_bathrooms=parseInt(no_of_bathrooms);
   
  
return true;
}



function step2_propertyguru(form)
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
   
 

 //  if(block_No == "")//Validation for block_no null value if Property Type = HDB property
   //{
     // if(property_type == "HDB Apartment")
      //{
        //  alert("For HDB property:Block number is mandatory for Propertyguru");	
	  //return false;
//      }
  // }
   //else
   //{
   if(!isAlphaNum(block_No))//If Entered Block number should be alphanumeric
   {
        alert("Please enter valid Block No ");
	return false;
   }
  // }
     // if(postal_Code == "")//validation for postal code not null Property Type = HDB property
       //{
         //alert("Postal Code is mandatory PropertyGuru");	
	//return false;
       //}
       
   // if(postal_Code == "")//validation for postal code not null Property Type = HDB property
    //{
      //if(property_type == "HDB Apartment"){
        
       // alert("Please enter Postal Code");	
	//return false;
      //}
    //}
   //else
   //{

//      if(postal_Code == "")//validation for postal code not null Property Type = HDB property
//       {
//         alert("Postal code is mandatory Propertyguru");	
//	return false;
//       }
       
      if(!IsNumeric(postal_Code))
      {
      	alert("Please enter numeric value for Postal Code");
	return false;
      }
       

      
      postal_Code_sub=postal_Code.substr(0,2);
      postal_Code_sub=parseInt(postal_Code_sub);
      if(postal_Code.length != "")
      { if(postal_Code.length < 6 || postal_Code.length > 6)
 	{
         alert("Please enter 6 digit Postal Code");
         return false;
         }
      }
     // else
      if(postal_Code_sub == 74 || postal_Code_sub > 82)
      {
         alert("Please enter valid Postal Code");
         return false;
      }
   //}
   
   //if(street == "")//Validation for Street not null value if Property Type = HDB property
   //{
    //
      //    alert("Street is mandatory");	
	//  return false;
      
  // }
   
   if(district== "(select)")
   {
        if(property_type != "HDB Apartment")  
        {
	alert("Please select District");	

	return false;
   	}
   }   
  
 
  if(estate== "(select)")
    {	 if(property_type == "HDB Apartment")
	 {
           alert(" For Property Type HDB : Estate is mandatory on PropertyGuru");	
           return false;
         }
      }
 
   if(!IsNumeric(contact_no))
   {
      //alert(price);
	alert("Please enter numeric value for Contact no ");
	 return false;
   }
   
 //------------------------------------------------------------
   return true;
 
}

function step3_propertyguru(form)
{
   var No_Of_Storey=document.forms["step3"]["No_Of_Storey"].value;
    if(!IsNumeric(No_Of_Storey))
      {
      	alert("Please enter numeric value for 'No Of Storey'");
	return false;
      }
      return true;
}





   
