<?php 
ob_start();
include 'includeFiles.php';
$tbl_name="user";
if("POST" == $_SERVER['REQUEST_METHOD']) {
$tbl_name="user";

$username=$_POST['username'];
$password=$_POST['password'];

$password = stripslashes($password);
$password = mysql_real_escape_string($password);

$sql= "select * from $tbl_name where App_UserName='$username' and App_Password='$password'and Is_Admin !='-1'";
$result= mysql_query($sql) or die('Cannot Execute:'.mysql_error());

$count=mysql_num_rows($result);
echo "count",$count;
if($count==1)
   {
   $row = mysql_fetch_array($result);
    $_SESSION['User_ID']=$user_Id;
     $_SESSION['Is_Admin']=$row['Is_Admin'];
     $_SESSION['App_UserName']=$username;
     $_SESSION['User_ID']=$row['User_ID'];
     $_SESSION['App_UserName']=$row['App_UserName'];
    header("location:view_Ad.php");
  }
  

else
    {
      header("Location:index.php?action=invalid && uname=$username");
    }


} // IF POST
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg">


<SCRIPT LANGUAGE="JavaScript">

function checkEmail_login(chkemail) {
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(chkemail.forgotemail.value)){
return (true)
}
alert("Invalid E-mail Address! Please re-enter.")
return (false)
}
	
</script>



<form action="index.php" onsubmit=""  method="post"><!--return validateEmail(this)  -->
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<!--<a href="index.php"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
		
	<table border="0" cellpadding="0" cellspacing="0">
       <tr>
	<?php

        if(isset($_GET['action']))
		{
                  if(trim($_GET['action']) == 'invalid')
			{
                        echo 'Invalid username or password, please try again.';
			echo "</br>";
                        }
                   if($_GET['action'] == 'logout')
			{
			session_destroy();
			echo 'You have successfully Logged out.';
			}
		  if(trim($_GET['action']) == 'invalidemail')
			{
			 
                        echo 'Your email does not exist.';
			echo "</br>";
                        }
		  if(trim($_GET['action']) == 'emailsent')
			{
			 
                        echo 'Password is sent to ur email..';
			echo "</br>";
                        }
		   }
        ?>
	</tr></br>
		<tr>
			<th>Username</th>
			
			<!--<td><input type="text" name="username"  value="<?php echo $_GET['username']; ?>" class="login-inp" /></td>-->
			<!--<td><input type="text" name="username"  value="" class="login-inp" /></td>-->
			
			<td><input type="text" name="username"  <?php  if(isset($_GET['action'])){ if(trim($_GET['action']) == 'invalid'){?>  value="<?php echo $_GET['uname']; }}?>" class="login-inp" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" value="************"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" value="Login" class="submit-login"  /></td>
		</tr><tr></tr>
		<!--<tr><td><center><a href="addnew_user.php" class="new-usr">n</a></center></td></tr>-->
		<!--</br></br></br></br><center><a href="index.php" class="new-usr"><u><b>Login Again</b></u></a></center>-->
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a></br>
	<!--<div id="new-usr">-->
	<!--<a href="addnew_user.php" class="new-usr">New User?</a>-->
	<!--</div>-->
 </div>
 <!--  end loginbox -->
</form> 
	<!--  start forgotbox ................................................................................... -->
<form action="forgot_chk.php" onsubmit="return checkEmail_login(this)"  method="post">

	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
	 
			<th>Email address:</th>
			<td><input type="text" name="forgotemail"   <?php  if(isset($_GET['action'])){ if(trim($_GET['action']) == 'invalidemail'){?>  value="<?php echo $_GET['forgotemail']; }}?>" class="login-inp" /></td>  <?php /*echo $_GET['forgotemail'];*/?>
		</tr>
		<tr>
			<th> </th>
			<!--<td><input type="button" class="submit-login"  /></td>-->
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</form>
</body>
</html>
