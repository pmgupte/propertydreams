<?php
session_start();

//ob_start();
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
ini_set('max_execution_time', 90);


include 'includeFiles.php';  // ob_flush?


$tbl_name="user";

$user_Id=$_SESSION['User_ID'];
$username=$_POST['username'];
//$_SESSION['App_UserName']=$username;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$address=$_POST['address'];
$email=$_POST['email'];
//$email=$_REQUEST['email'];
$is_admin=$_POST['is_admin'];

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

		//if($_SESSION['Is_Admin']=="admin")
		//	{
    //$result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')");
      //    $result= mysql_query("select * from  $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')"); 
          $sql = "select * from $tbl_name where Email ='$email' and Is_Admin != '-1'";
          $result = mysql_query($sql);
	  
        // $row = mysql_result($result);
              	while($row = mysql_fetch_array($result))
			{
			    $email_row=$row['Email'];
			}

          $sql1 = "select * from $tbl_name where App_UserName ='$username' and Is_Admin != '-1'";
          $result1 = mysql_query($sql1);
	 // $username_row[] = array();//
        // $row = mysql_result($result);
	
              	while($row1 = mysql_fetch_array($result1))
		
			{
			    $username_row=$row1['App_UserName'];
			    $password_row=$row1['App_Password'];

			}
			//$userarr=$username_row;
			//echo"listg user :$userarr";
	if($email_row == $email)
	{
	
	    header("location:addnew_user.php?action=email_exits");
	}
        elseif($username_row == $username)
	{
	    	header("location:addnew_user.php?action=username_exits ");
	}	
	elseif(strcasecmp($username_row, $username)== 0)
	{
	    	header("location:addnew_user.php?action=username_exits ");
	}
	else
	{
	    
	         $result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')"); //uncomment	                                   
                  $to =$email;
		  $subject = "Sending the Login Username & Password.";
                  $message1="Your Username is:"." ".$username."\n";
		  $message2="Your Password is:"." ".$password;
                  $message =$message1."".$message2;
		  $from = "admin <sample@gmail.com>";
		  $headers = "From:" . $from;
		
		  mail($email,$subject,$message,$headers);  //uncoment
		  //echo "Mail Sent.";
	        // $result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')"); //uncomment
	
		  header("location:addnew_user.php?action=email_notexits");
		  
	}

                //if($email == $email_row)
                // {
                //    
                //    header("location:addnew_user.php?action=email_exits");
                // }
       
          //  if (in_array($email,$existing_email))
          //{
          //    //user name is not availble
          //    echo "no";
          //}
          //else
          //{
          //    //user name is available
          //    echo "yes";
          //}
           

//                            
//                  $to =$email;
//		  $subject = "Sending the Login Username & Password.";
//                  $message1="Your Username is:"." ".$username."\n";
//		  $message2="Your Password is:"." ".$password;
//                  $message =$message1."".$message2;
//		  $from = "admin <sample@gmail.com>";
//		  $headers = "From:" . $from;
//		//  mail($email,$subject,$message,$headers);  //uncoment
//		  echo "Mail Sent.";

      // $result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')"); //uncomment
                        
      //$result= mysql_query("insert into $tbl_name(App_UserName,App_Password)values('$username','$password')");
   // header("location:index.php");
   
                        //}
                        
                        
                      // header("location:addnew_user.php?action=addnewuser_inserted");         // uncomment
             
             
                //else
                //
                //{
                //  echo "<script>alert('You are not authorized user')</script>";
                //  //header("location:index.php");
                //}
                ////header("location:index.php");
                
                
//ob_flush();
?>
