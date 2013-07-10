<?php
session_start();


ob_start();
ini_set('max_execution_time', 90);


include 'includeFiles.php';
$tbl_name="user";
$user_Id=$_SESSION['App_ID'];
$username=$_POST['username'];
//$_SESSION['App_UserName']=$username;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$address=$_POST['address'];
$email=$_POST['email'];
//$email=$_REQUEST['email'];
$is_admin_st=$_POST['is_admin'];
//$_SESSION['Is_Admin']=$is_admin;



if(isset($_POST['is_admin']))
{
    $is_admin_st=1;
  //  return true;
//$is_admin=$_POST['is_Admin'];
    
}
else
{
    $is_admin_st=0;
}

		//if($_SESSION['Is_Admin']=="admin")
		//	{
    //$result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')");
    

                            
                  $to =$email;
		  $subject = "Sending the Login Username & Password.";
                  $message1="Your Username is:"." ".$username."\n";
		  $message2="Your Password is:"." ".$password;
                  $message =$message1."".$message2;
		  $from = "admin <sample@gmail.com>";
		  $headers = "From:" . $from;
		//  mail($email,$subject,$message,$headers);  //uncoment
		  echo "Mail Sent.";

       $result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin_st','$address','$email')"); //uncomment
                        
      //$result= mysql_query("insert into $tbl_name(App_UserName,App_Password)values('$username','$password')");
   // header("location:index.php");
   
                        //}
                        
                        
                      header("location:addnew_user.php?action=addnewuser_inserted");         // uncomment
             
             
                //else
                //
                //{
                //  echo "<script>alert('You are not authorized user')</script>";
                //  //header("location:index.php");
                //}
                ////header("location:index.php");
                
                
ob_flush();
?>
