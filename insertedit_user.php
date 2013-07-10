<?php
session_start();
//if(!empty($_SESSION['App_UserName'])) { header('Location: dashboard.php'); }
//if(!empty($_SESSION['Is_Admin'])) { header('Location: dashboard.php'); }

ob_start();
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
include 'includeFiles.php';

$tbl_name="user";
//$user_Id_row=$_SESSION['App_ID'];
$user_Id_row=$_GET['User_ID'];

echo "this is $user_Id_row";
//$username=$_POST['username'];
//$_SESSION['App_UserName']=$username;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
//$password=$_POST['password'];
$address=$_POST['address'];
$email=$_POST['email'];
$is_admin=$_POST['is_admin'];
//$_SESSION['Is_Admin']=$is_admin;

//$_SESSION['mymessage'] = false;

if(isset($_POST['is_admin']))
{
    $is_admin=1;
  //  return true;
//$is_admin=$_POST['is_Admin'];
    
}
else
{
    $is_admin=0;
}


	
	  $sql5= "select Email from $tbl_name where User_Id !='$user_Id_row'";
	  $result5 =mysql_query($sql5);
	  //$num_rows5 = mysql_num_rows($result5);
	  $email_ids = array(); 
	  while($row5=mysql_fetch_array($result5))
	  {
	    $email_ids[] = $row5['Email']; // add this email to array
	    
	  }
	//print_r($email_ids);
	
	  
	if(in_array($email, $email_ids))
	  {
	   
		   header("location:list_user.php?action=email_exits");        //uncomment
		     
	  
	  }
        else
	  {
	    
	    
             $result = mysql_query("Update $tbl_name Set  FirstName='$fname', LastName='$lname',Is_Admin='$is_admin',Address='$address',Email='$email' WHERE User_ID='$user_Id_row'");          
                       header("location:list_user.php?action=record_edited");        //uncomment
	  }
ob_flush();
?>
