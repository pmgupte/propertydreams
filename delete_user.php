<?php

session_start();

//if(!empty($_SESSION['App_UserName'])) { header('Location: dashboard.php'); }
//if(!empty($_SESSION['Is_Admin'])) { header('Location: dashboard.php'); }
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
ob_start();

include 'includeFiles.php';

$tbl_name="user";
//$user_Id_row=$_SESSION['App_ID'];

//$username=$_POST['username'];
//$_SESSION['App_UserName']=$username;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
//$password=$_POST['password'];
$address=$_POST['address'];
$email=$_POST['email'];
$is_admin=$_POST['is_admin'];
//$_SESSION['Is_Admin']=$is_admin;




if(isset($_GET['User_ID']))
		{
		$user_Id_row=$_GET['User_ID'];
		}
                
                
		//if($_SESSION['Is_Admin']=="admin")
		//	{
                
               $result = mysql_query("Update $tbl_name Set Is_Admin='-1' WHERE User_ID='$user_Id_row'");          
   // $result= mysql_query("insert into $tbl_name(FirstName,LastName,Is_Admin,Address,Email)values('$fname','$lname','$is_admin','$address','$email')");
                        
      //$result= mysql_query("insert into $tbl_name(App_UserName,App_Password)values('$username','$password')");
   // header("location:index.php");
   
                        //}
                        header("location:list_user.php");
                //else
                //
                //{
                //  echo "<script>alert('You are not authorized user')</script>";
                //  //header("location:index.php");
                //}
                ////header("location:index.php"); 
ob_flush();
?>
