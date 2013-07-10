<?php
include 'header.php';
$user_Id=$_SESSION['User_ID'];
//echo " user :$user_Id";
$username=$_SESSION['App_UserName'];
//echo " username is :$username";
$Is_Admin =$_SESSION['Is_Admin'];
//echo " IsAdmin  :$Is_Admin";
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}


//$is_admin=$_SESSION['Is_Admin'];
//
//echo "$is_admin";
?>
<html>

<script type="text/javascript">
 
function checkForm(form)
        {
		
		if(form.newsitename.value == "")
			{
			alert("Error: Site Name cannot be blank!");
			form.newsitename.focus(); return false;
			}
                if ((form.moduleyesno[0].checked == false) && (form.moduleyesno[1].checked == false ))
			{
				//alert ( "Please choose Status: Admin or User" );
				alert ("Please choose Yes or No" );
				
				return false;
			} 
		//if(form.lname.value == "")
		//	{
		//	alert("Error: Last Name cannot be blank!");
		//	form.lname.focus(); return false;
		//	}
		//	
		//if(form.username.value == "")
		//	{
		//	alert("Error: Username cannot be blank!");
		//	form.username.focus(); return false;
		//	}
		////re = /^\w+$/;
		//	//if(!re.test(form.username.value))
		//	//{
		//	//	alert("Error: Username must contain only letters, numbers and underscores!");
		//	//	form.username.focus();
		//	//	return false;
		//	//}
		//if(form.password.value != "" && form.password.value == form.confirmpassword.value)
		//	{
		//		if(form.password.value.length < 6)
		//		{ alert("Error: Password must contain at least six characters!");
		//		form.password.focus();
		//		return false;
		//		}
		//	}
		//else
		//	{
		//	       alert("Error: Password do not match,Please try again....");
		//	       form.password.focus();
		//	       return false;
		//	}
		////if ( ( form.is_admin.checked == false ) /*&& ( form.is_admin[1].checked == false )*/ )
		////	{
		////		//alert ( "Please choose Status: Admin or User" );
		////		alert ( "Please choose Status" );
		////		
		////		return false;
		////	} 
		//if(form.address.value == "")
		//{
		//	alert("Error: Address cannot be blank!");
		//	form.address.focus();
		//	return false;
		//}
			
		return true;  
        }

</script>
<!--
<SCRIPT LANGUAGE="JavaScript">

function checkEmail(myemail) {
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myemail.email.value)){
return (true)
}
alert("Invalid E-mail Address! Please re-enter.")
return (false)
}
	
</script>
-->

<!--
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="txt/javascript">
<script type="text/javascript">
//var req=['fname','lname','password','egender','email']//the requested fields
var req=['username','password','confirmpassword','email']

function valid(f){
var i=0, t
if(!checkForm())
return false

if(!validateEmail())
return false






while(t=f[req[i++]]){
	if(t.value==''){
		alert('Please complete all the required fields!')
		t.focus();return false
	}
}
return true;
}
	
</script>-->

	
<!--<div class="clear">&nbsp;</div>
 

 <div class="clear"></div>-->
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add New Website</h1>
	</div>
	<!-- end page-heading -->

<?php

       if(isset($_GET['action']))
		{
                  if(trim($_GET['action']) == 'nomodule')
                  
			{
		       // echo "get variable successful";
                        echo '<center><b><font color ="Red">You cannot Add New Website.</font></b></center> ';
			echo "</br>";
			?> <?php
                        }
                        
                  if($_GET['action'] == 'yesmodule')
			{
			echo '<center><b>Your New Website is added successfully.</b></center> ';
			echo "</br>";
			//echo $_SESSION['Is_Admin'];
				
			}
                }
?>  		

	
<form  method="post"   action="insertnew_web.php"  onsubmit="return checkForm(this)">  <!--return (checkForm(this) && validateEmail());                  return checkForm(this);   name="addnew_user" valid(this); validateEmail() return checkForm(this);  onsubmit="return (checkForm(this) && false);" -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table" align="center">

		
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
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>-->
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>-->
				</table>
				</div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>-->
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>-->
				</table>
				</div>
				<!--  end message-green -->
		

		 
				<!--  start product-table ..................................................................................... -->
				<!--<form id="mainform" action="">-->
					
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" align="center">
				<tr><font color="red" size="2">' * '  Fields are Mandatory</font>
<!--					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Last Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">First Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Due</a></th>
					<th class="table-header-repeat line-left"><a href="">Website</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
-->
				</tr>

				</tr>
				<tr class="alternate-row">
<!--					<td><input  type="checkbox"/></td>
-->					<td><font color="red" size="2">* &nbsp;</font>New Site Name</td><?php
$user_Id=$_SESSION['User_ID'];
//echo " user :$user_Id";?>

					<td><input type="text" name="newsitename" value="" class="inp-form"  /></td>  
<!--					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>-->
				</tr>
			         <tr>

			                <td><font color="red" size="2"> </font>Do you have New Website Module</td>
					<td><input type="radio" name="moduleyesno" value="1"/>&nbsp; Yes &nbsp;
                                        <input type="radio" name="moduleyesno" value="0"/>&nbsp; No</br></td>
                                 </tr>
		

			<tr class="alternate-row">
					<!--<td><input  type="checkbox"/></td>-->
					<td></td>  
					<td><input type="submit" value="Add" class="submit-login"  /></td>
                        </tr>
				</table>
				<!--  end product-table................................... --> 
				<!--</form>-->
				
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
<!--			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
-->
                        <div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
<!--			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
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
			</table>-->
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

</form>
<!--</body>
--></html>
<?php ob_flush();?>
