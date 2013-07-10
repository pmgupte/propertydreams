<?php
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
include 'includeFiles.php';
$tbl_name="user";
// $user_Id=$_SESSION['App_ID'];
$username=$_POST['username'];
$password=$_POST['password'];

$password = stripslashes($password);
$password = mysql_real_escape_string($password);

//$sql= "select * from $tbl_name where App_ID='$user_Id' and App_UserName='$username' and App_Password ='$password'";
$sql= "select * from $tbl_name where App_UserName='$username' and App_Password='$password'";
$result= mysql_query($sql) or die('Cannot Execute:'.mysql_error());

//echo "hi";
$count=mysql_num_rows($result);

if($count==1)
  {
    $row = mysql_fetch_array($result);
    session_start();
   // if(!empty($_SESSION['username'])) { header('Location: dashboard.php'); }

    ob_start();
    // $_SESSION['App_ID']=$user_Id;
     $_SESSION['Is_Admin']=$row['Is_Admin'];
     $_SESSION['App_UserName']=$username;
     $_SESSION['App_ID']=$row['App_ID'];
     
    //echo "you have successfuly loggedin.";
    header("location:profile_mgmt.php");
  }

else
    {
      header("Location:index.php?action=invalid && uname=$username");
    }
    
ob_flush();
?>