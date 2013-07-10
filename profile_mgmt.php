<?php
session_start();
ob_start();
include 'header.php';
include 'includeFiles.php';

if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}


$tbl_name='user';
$tbl_name_UserSites='user_site';
$tbl_name_sites="sites";
$is_admin=$_SESSION['Is_Admin'];
$user_Id=$_SESSION['User_ID'];

?>
<?php
              
	        $sql="SELECT * FROM $tbl_name WHERE User_ID='$user_Id'";
		$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());
        
	//$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());;

		while($row = mysql_fetch_array($result))
		{
                    
                $fname=$row['FirstName'];
		$lname=$row['LastName'];
		$is_admin_row=$row['Is_Admin'];
                $address=$row['Address'];
		$email=$row['Email'];
                $user_Id_row =$row['User_ID'];
                $username=$row['App_UserName'];
                $password=$row['App_Password'];             
                //$propertyguru_uname=$row['propertyguru_UserName'];
                //$propertyguru_upassword=$row['propertyguru_Password'];
                //$iproperty_uname=$row['iproperty_UserName'];
                //$iproperty_upassword=$row['iproperty_Password'];
                //$propmatch_uname=$row['propmatch_UserName'];
                //$propmatch_upassword=$row['propmatch_Password'];
                //$rentinsingapore_uname=$row['rentinsingapore_UserName'];
                //$rentinsingapore_upassword=$row['rentinsingapore_Password'];
                //$sisvrealink_uname=$row['SISVREAL_UserName'];
                //$sisvrealink_upassword=$row['SISVREAL_Password'];
                //$wordpress_uname=$row['wordpress_UserName'];
                //$wordpress_upassword=$row['wordpress_Password'];
                //$cobrokehub_uname=$row['CobrokeHub_UserName'];
                //$cobrokehub_upassword=$row['CobrokeHub_Password'];
                ////$_SESSION['App_ID']=$user_Id_row;
		
                

  		}
?>


<script type="text/javascript">
	function valid_usrpwd(form)
	{
		
		if(form.propertyguru_upassword.value == form.propertyguru_upasswordcmf.value)
			{}else{
				alert("Error: Your Propertyguru Password do not match.");
				form.propertyguru_upassword.focus();
				form.propertyguru_upasswordcmf.focus();
				return false;
				}
			
		if(form.iproperty_upassword.value == form.iproperty_upasswordcmf.value)
			{}else{
				alert("Error: Your Iproperty Password do not match.");
				form.iproperty_upassword.focus();
				form.iproperty_upasswordcmf.focus();
				return false;
				}
						
		if(form.propmatch_upassword.value == form.propmatch_upasswordcmf.value)
			{}else{
				alert("Error: Your Propmatch Password do not match.");
				form.propmatch_upassword.focus();
				form.propmatch_upasswordcmf.focus();
				return false;
				}
			
		if(form.rentinsingapore_upassword.value == form.rentinsingapore_upasswordcmf.value)
			{}else{
				alert("Error: Your Rentinsingapore Password do not match.");
				form.rentinsingapore_upassword.focus();
				form.propertyguru_upasswordcmf.focus();
				return false;
				}
						
		if(form.sisvrealink_upassword.value == form.sisvrealink_upasswordcmf.value)
			{}else{
				alert("Error: Your Sisvrealink Password do not match.");
				form.sisvrealink_upassword.focus();
				form.sisvrealink_upasswordcmf.focus();
				return false;
				}
						
		if(form.Wordpress_upassword.value == form.Wordpress_upasswordcmf.value)
			{}else{
				alert("Error: Your Wordpress Password do not match.");
				form.Wordpress_upassword.focus();
				form.Wordpress_upasswordcmf.focus();
				return false;
				}
			
		if(form.cobrokehub_upassword.value == form.cobrokehub_upasswordcmf.value)
			{}else{
				alert("Error: Your CobrokeHub Password do not match.");
				form.cobrokehub_upassword.focus();
				form.cobrokehub_upasswordcmf.focus();
				return false;
				}
		if(form.password.value == form.passwordcmf.value)
			{
				if(form.password.value.length < 6)
				{ alert("Error: Password must contain at least six characters");
				form.password.focus();
				return false;
				}
				if(form.password.value.length > 32)
				{ alert("Error: Password should not exceed 32 characters");
				form.password.focus();
				return false;
				}

                        }else{
				alert("Error: Your Passwords do not match, try again.");
				form.password.focus();
				form.passwordcmf.focus();
				return false;
				}				
		//
		//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)){ }
		//else {
		//		alert("Invalid E-mail Address! Please re-enter.");
		//		return (false);
		//}		
		
			
		//	
		//if((form.username.value !== "" && form.password.value == "" )||(form.username.value == "" && form.password.value !== ""))
		//	{
		//		
		//	alert("Error: Please Enter both the Login username & Login password ");
		//	form.username.focus(); 
		//	form.password.focus(); 
		//	return false;
		//	}		
		
		//if((form.propertyguru_uname.value !== "" && form.propertyguru_upassword.value == "" )||(form.propertyguru_uname.value == "" && form.propertyguru_upassword.value !== ""))
		if((form.propertyguru_uname.value != "" && form.propertyguru_upassword.value == "" )||(form.propertyguru_uname.value.trim() == "" && form.propertyguru_upassword.value != ""))
			{
				if(form.propertyguru_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for PropertyGuru Username");
                                       form.propertyguru_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for PropertyGuru");
			form.propertyguru_uname.focus(); 
			form.propertyguru_upassword.focus();
			return false;
			}
		if((form.iproperty_uname.value != "" && form.iproperty_upassword.value == "" )||(form.iproperty_uname.value.trim() == "" && form.iproperty_upassword.value != ""))
			{
				
				if(form.iproperty_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for Iproperty Username");
                                       form.iproperty_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for Iproperty");
			form.iproperty_uname.focus(); 
			form.iproperty_upassword.focus(); return false;
			}
		if((form.propmatch_uname.value != "" && form.propmatch_upassword.value == "")||(form.propmatch_uname.value.trim() == "" && form.propmatch_upassword.value != ""))
			{
				if(form.propmatch_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for Propmatch Username");
                                       form.propmatch_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for Propmatch");
			form.propmatch_uname.focus();
			form.propmatch_upassword.focus(); return false;
			}
		if((form.rentinsingapore_uname.value != "" && form.rentinsingapore_upassword.value == "")||(form.rentinsingapore_uname.value.trim() == "" && form.rentinsingapore_upassword.value != ""))
			{
				if(form.rentinsingapore_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for Rentinsingapore Username");
                                       form.rentinsingapore_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for Rentinsingapore");
			form.rentinsingapore_uname.focus();
			form.rentinsingapore_upassword.focus(); return false;
			}
		if((form.sisvrealink_uname.value != "" && form.sisvrealink_upassword.value == "")||(form.sisvrealink_uname.value.trim() == "" && form.sisvrealink_upassword.value != ""))
			{
				
				if(form.sisvrealink_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for Sisvrealink Username");
                                       form.sisvrealink_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for Sisvrealink");
			form.sisvrealink_uname.focus();
			form.sisvrealink_upassword.focus(); return false;
			}
		if((form.Wordpress_uname.value != "" && form.Wordpress_upassword.value == "")||(form.Wordpress_uname.value.trim() == "" && form.Wordpress_upassword.value != ""))
			{
				if(form.Wordpress_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for Wordpress Username");
                                       form.Wordpress_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for Wordpress");
			form.Wordpress_uname.focus(); 
			form.Wordpress_upassword.focus(); return false;
			}
		if((form.cobrokehub_uname.value != "" && form.cobrokehub_upassword.value == "")||(form.cobrokehub_uname.value.trim() == "" && form.cobrokehub_upassword.value != ""))
			{
				if(form.cobrokehub_uname.value.match(/^\s*$/))
                               {
                                       alert("Error: Please Enter valid characters for Cobrokehub Username");
                                       form.cobrokehub_uname.focus();
                                        return false;
                               }
			alert("Error: Please Enter Username/Password for Cobrokehub");
			form.cobrokehub_uname.focus();
			form.cobrokehub_upassword.focus(); return false;
			}
		if((form.username.value != "" && form.password.value == "")||(form.username.value == "" && form.password.value != ""))
			{
			alert("Username & Password are Mandatory.");
			form.username.focus();
			form.password.focus(); return false;
			}
		if(form.username.value.trim() == "")
			{
			alert("Username is Mandatory.");
			form.username.focus();
			//form.password.focus();
			return false;
			}
			
			

				
		//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.Cobrokehub_uname.value)){
		//		return (true);
		//		}
		//		else{
		//		alert("Cobrokehub Username should be as Ex : 'abc@abc.com.' ");
		//		return (false);
		//		}	
		//	
			
			return true;
	}		
	
		
</script>


<SCRIPT LANGUAGE="JavaScript">

function checkEmail(myemail) { 
//alert('am called!');
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myemail.email.value))
{
return (true);
}
alert("Invalid E-mail Address! Please re-enter.");
return (false);
}
</script>


<SCRIPT LANGUAGE="JavaScript">

//function siteEmail(semail)
//{
//		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.propertyguru_uname.value))
//		
//		{
//		      //return true;
//		}
//		else{
//		      alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
//		     return false;
//		     }
//
//
//		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.rentinsingapore_uname.value))
//		{
//       		      //return true;
//		}
//		else{
//		      alert("Rentinsingapore Username should be as Ex : 'abc@abc.com.' ");
//		      return false;
//		     }
//		     
//		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.propmatch_uname.value))
//		{
//       		      //return true;
//		}
//		else{
//		      alert("Propmatch Username should be as Ex : 'abc@abc.com.' ");
//		      return false;
//		     }
//		     
//		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.cobrokehub_uname.value))
//		{
//       		      //return true;
//		}
//		else{
//		      alert("Cobrokehub Username should be as Ex : 'abc@abc.com.' ");
//		      return false;
//		     }     
//		     return true;
//}
</script>


//
//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myemail.propertyguru_uname.value))
//		{
//		return (true);
//		}
//		alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
//		return (false);

				//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.propertyguru_uname.value))
				//		{
				//		alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
				//		//return (true);
				//		}
				//		//alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
				//		//return (false);
				//
		

//
//function siteEmail(semail)
//{
//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.propertyguru_uname.value))
//{
//return (true);
//alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
//}


//
//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.propertyguru_uname.value))
//{
//return (true);
//alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
//}
//
//if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(semail.propertyguru_uname.value))
//{
//return (true);
//alert("Propertyguru Username should be as Ex : 'abc@abc.com.' ");
//}
//return (false);		
//}
	



<!--          
<script type="text/javascript">

// to validate password chars
var req=['propertyguru_upassword','iproperty_upassword','propmatch_upassword','rentinsingapore_upassword','sisvrealink_upassword','wordpress_upassword','cobrokehub_upassword']
	function Passwd(fp)
	{
		var i=0, t
		//alert ('pass')
		
		while(t=fp[req[i++]]){
			if(t.value.length < 6){
				alert('Error: Password must contain at least six characters!');
				t.focus();return false;
			}
		}
		return true;
		
	}

</script>

<script type="text/javascript">
// to validate whether all fiels are completed.
var req=['propertyguru_uname','propertyguru_upassword','iproperty_uname','iproperty_upassword','propmatch_uname','propmatch_upassword','rentinsingapore_uname','rentinsingapore_upassword','sisvrealink_uname','sisvrealink_upassword','wordpress_uname','wordpress_upassword','cobrokehub_uname','cobrokehub_upassword']

function valid(f){
var i=0, t


while(t=f[req[i++]]){
	if(t.value==''){
		alert('Please complete all the required fields!');
		t.focus();return false;
	}
}
return true;
}
	
</script>-->

<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Profile Management</h1>
	</div>
	<!-- end page-heading -->

                <!--user edit form-->

                <!--Website form-->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->

				<!--  end message-green -->
		
		 
				<!--  start product-table .........................................onsubmit="return (valid_usrpwd(this) && checkEmail(this));"............................. return (valid_usrpwd(this) && checkEmail(this))............... -->
				<form method="post"  id="mainform" action="insert_profile.php" onsubmit="return (valid_usrpwd(this) && checkEmail(this));"> <!--return( valid(this) && Passwd(this) );-->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr><font color="red" size="2">' * '  Fields are Mandatory</font></tr>
                                <tr class="alternate-row">
					<td > First Name </td>

					<td colspan=3><input type="text" name="fname" value="<?php echo "$fname";?>" class="inp-form"  /></td>                                      
                                </tr>
                                <tr class="alternate-row">
                                        <td >Last Name </td>
                                
					<td colspan=3><input type="text" name="lname" value="<?php echo "$lname";?>" class="inp-form"  /></td>                                    
                                </tr>
                                <tr class="alternate-row">
					<td >Address</td>
					<td colspan=3><input type="text" name="address" value="<?php echo "$address";?>"  class="inp-form" /></td> <!--     value="************"  -->
                                    
                                </tr>
                                <tr class="alternate-row">
 					<td><font color="red">*</font> Email </td>
					<td  colspan=3><input type="text" name="email" value="<?php echo "$email";?>"  class="inp-form" /></td> <!--     value="************"  -->
                                   
                                </tr>
                                <tr class="alternate-row">
					<td><font color="red">*</font> Change  Username</td>
					<td colspan=3><input type="text" name="username" value="<?php echo "$username";?>"  class="inp-form" /></td> <!--     value="************"  -->
                                    
                                </tr>
                                <tr class="alternate-row">
 					<td><font color="red">*</font> Change Password</td>
					<td  colspan=3><input type="password" name="password" value="<?php echo "$password";?>"  class="inp-form" /></td> <!--     value="************"  -->
                                 <!--  <td  colspan=3><input type="password" name="password" value=""  onfocus="this.value=''" class="inp-form" /></td> --><!--     value="************"  -->
				 
                                </tr>
                                <tr class="alternate-row">
 					<td><font color="red">*</font> Confirm Password</td>
					<td  colspan=3><input type="password" name="passwordcmf" value="<?php echo "$password";?>"  class="inp-form" /></td> <!--     value="************"  -->
                                  <!-- <td  colspan=3><input type="password" name="cmfpassword" value=""  onfocus="this.value=''" class="inp-form" /></td>--> <!--     value="************"  -->
				 
                                </tr>   				
                                    
                                
                                 
<?php                                    
       if(isset($_GET['action']))
		{
                  if(trim($_GET['action']) == 'profile_inserted')
			{
                        echo '<center><b>Your Profile details are submitted successfuly.Thankyou .</b></center> ';
		       echo "</br>";
                        }

		 if($_GET['action'] == 'email_exits')	
		        {
		        
                        echo '<center><font color ="Red">Please try another Email as it is already in Database.Retry to Submit.</font></center> ';
			echo "</br>";
                        }
		 if($_GET['action'] == 'username_exits')
			{
			echo '<center><font color ="Red">Please try another Username as it is already in Database.Retry to Submit.</font></center> ';
			echo "</br>";
			//echo $_SESSION['Is_Admin'];
				
			}
		 }
?>  

 


                              

				</table>
				
				
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
<!--					<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Site Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Site Username</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Site Password</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Confirm Password</a></th>

				</tr>
				
<?php
              
	        $sql="SELECT * FROM $tbl_name_sites";
		$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());
                //$num_rows=mysql_query($result);
		
	
	
	//$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());;

		while($row = mysql_fetch_array($result))
		{
		         $Site_ID = $row['Site_ID'];
				 
		         $sql1="SELECT * FROM $tbl_name_UserSites where User_ID='$user_Id' and Site_ID = $Site_ID ";                   //need to get site id also  /*and Site_ID='$Site_ID'*/
		         $result1=mysql_query($sql1) or die('Cannot Execute:'. mysql_error());
			 //$num_rows1=mysql_query($result1);
			  //echo "site id 1:$result1";
				while($row1 = mysql_fetch_array($result1))
				{
						$Site_Username_row=$row1['Site_Username'];
						$Site_Password_row=$row1['Site_Password'];
				
				}	// need to end	to view all site rows below

               ?>
		
	
				<tr>
				<td><?php  echo $row['Site_Name']; ?></td>
<!--                                <td><input type="text" name="<?php echo $row['Site_Name']; ?>_uname" value="<?php if(isset($Site_Username_row)){ echo $Site_Username_row;}else{echo "";}?>" class="inp-form"  /></td>
				<td><input type="password" name="<?php echo $row['Site_Name']; ?>_upassword" value="<?php echo $Site_Password_row;?>" class="inp-form"  /></td>
				<td><input type="password" name="<?php echo $row['Site_Name']; ?>_upasswordcmf" value="<?php echo $Site_Password_row;?>" class="inp-form"  /></td>
-->
                                <td><input type="text" name="<?php echo $row['Site_Name']; ?>_uname" value="<?php if(isset($Site_Username_row)){ echo $Site_Username_row;}else{echo "";}?>" class="inp-form"  /></td>
				<td><input type="password" name="<?php echo $row['Site_Name']; ?>_upassword" value="<?php if(isset($Site_Password_row)){ echo $Site_Password_row;}else{echo "";}?>" class="inp-form"  /></td>
				<td><input type="password" name="<?php echo $row['Site_Name']; ?>_upasswordcmf" value="<?php if(isset($Site_Password_row)){ echo $Site_Password_row;}else{echo "";}?>" class="inp-form"  /></td>
				</tr>
				

				
		<?php
				//}
				
				//$Site_Username_row="";
				//$Site_Password_row="";
				$Site_Username_row="";
				$Site_Password_row="";
		}

		?>

				</table>		
                                <center><input type="submit"  value="Add" class="submit-login"  align="center" /></center><!---->
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
<!--			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>-->
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
	<!--		<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
	-->
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>

 
</body>
</html>
