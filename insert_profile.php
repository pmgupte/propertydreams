<?php
session_start();
//if(!empty($_SESSION['App_UserName'])) { header('Location: dashboard.php'); }
//if(!empty($_SESSION['Is_Admin'])) { header('Location: dashboard.php'); }
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
ob_start();
//include 'header.php';
include 'includeFiles.php';
$tbl_name="user";
$tbl_name_sites="sites";
$tbl_name_UserSites="user_site";
if(isset($_SESSION['User_ID']))
{
$user_Id=$_SESSION['User_ID'];
}
$is_admin =$_SESSION['Is_Admin'];


echo "User id:$user_Id";

$user_Id=$_SESSION['User_ID'];
$username=$_POST['username'];
//$_SESSION['App_UserName']=$username;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$address=$_POST['address'];
$email=$_POST['email'];


$_uname="_uname";
$_upassword="_upassword";


$propertyguru_uname=$_POST['propertyguru_uname'];
$propertyguru_upassword=$_POST['propertyguru_upassword'];
$iproperty_uname=$_POST['iproperty_uname'];
$iproperty_upassword=$_POST['iproperty_upassword'];
$propmatch_uname=$_POST['propmatch_uname'];
$propmatch_upassword=$_POST['propmatch_upassword'];
$rentinsingapore_uname=$_POST['rentinsingapore_uname'];
$rentinsingapore_upassword=$_POST['rentinsingapore_upassword'];
$sisvrealink_uname=$_POST['sisvrealink_uname'];
$sisvrealink_upassword=$_POST['sisvrealink_upassword'];
$wordpress_uname=$_POST['Wordpress_uname'];
$wordpress_upassword=$_POST['Wordpress_upassword'];
$cobrokehub_uname=$_POST['cobrokehub_uname'];
$cobrokehub_upassword=$_POST['cobrokehub_upassword'];



	 // $sql5= "select Email from $tbl_name where User_ID='$user_Id'";
	  
	  $sql5= "select Email from $tbl_name where User_Id !='$user_Id' and Is_Admin != '-1'";
	  $result5 =mysql_query($sql5);
	  //$num_rows5 = mysql_num_rows($result5);
	  $email_ids = array(); 
	  while($row5=mysql_fetch_array($result5))
	  {
	    $email_ids[] = $row5['Email']; // add this email to array
	    
	  }
	  
	  
	  $sql1= "select App_UserName from $tbl_name where User_Id !='$user_Id' and Is_Admin != '-1'";
	  $result1 =mysql_query($sql1);
	  //$num_rows5 = mysql_num_rows($result5);
	  $username_name = array(); 
	  while($row1=mysql_fetch_array($result1))
	  {
	    $username_name[] = $row1['App_UserName']; // add this email to array
	    
	  }

	  if(in_array($email, $email_ids))
	  {
	     // echo "error";
	    header("location:profile_mgmt.php?action=email_exits");	    
	  }

	  elseif(in_array($username, $username_name))
	  {
	    header("location:profile_mgmt.php?action=username_exits");	    
	  }
	  else
	  {


	
	//   to execute site credentials
                       
 		$sql="SELECT * FROM $tbl_name_sites "; // gives site_id, site_name
		$result=mysql_query($sql); //or die('Cannot Execute:'. mysql_error());
                $num_rows=mysql_num_rows($result);
                
               // $var=0;
              //  $num_rows_test=$num_rows;
               // echo $num_rows_test,"num_rows_tes";
             // echo $sql;
             
		while($row = mysql_fetch_assoc($result))
                {
                    //print_r($row);
                    //echo "this is $var";
                       $Site_Name =$row['Site_Name']; //propertyguru, rentinsingapore etc
                       $Site_ID = $row['Site_ID']; // 1, 2, 3,etc 
               
                       // echo "site: $Site_Name ... "; 
               
                        $sql="SELECT * FROM $tbl_name_UserSites where User_ID='$user_Id' and Site_ID='$Site_ID' ";
                        $result2=mysql_query($sql) or die('Cannot Execute:'. mysql_error());
                        $num_rows=mysql_num_rows($result2);
                        
                        if($num_rows>0)
                        {
                            
                         $result3 = mysql_query("Update $tbl_name_UserSites Set Site_Username='{$_POST[$Site_Name.'_uname']}',Site_Password='{$_POST[$Site_Name.'_upassword']}' WHERE User_ID='$user_Id' and Site_ID='$Site_ID'");                  
                         //$result4 = mysql_query("Update $tbl_name Set FirstName='$fname',LastName='$lname',App_UserName='$username',App_Password='$password',Address='$address',Email='$email' WHERE User_ID='$user_Id'");  
			//  header("location:profile_mgmt.php?action=profile_inserted");
                        }
                        else
                        {
				//if(isset($user_Id) && isset($Site_ID) && isset($Site_Name))
				//if(isset($_POST[$Site_Name.'_uname']) && isset($_POST[$Site_Name.'_upassword']))
				if(!empty($_POST[$Site_Name.'_uname']) && !empty($_POST[$Site_Name.'_upassword']))
				   {
				     // "... values('{$_POST['propertyguru_uname']}..)"
				    $result3 = mysql_query("insert into $tbl_name_UserSites(User_ID,Site_ID,Site_Username,Site_Password)values('$user_Id','$Site_ID','{$_POST[$Site_Name.'_uname']}','{$_POST[$Site_Name.'_upassword']}')");
				   }
				//else
				//   {
				//    $Site_ID="";
				//    $Site_Name="";
				//   }
                                //$result= mysql_query("insert into $tbl_name(User_ID,FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$user_Id','$fname','$lname','$username','$password','$is_admin','$address','$email')"); //uncomment	                                   
			       //}
                              //  $result4 = mysql_query("Update $tbl_name Set FirstName='$fname',LastName='$lname',App_UserName='$username',App_Password='$password',Address='$address',Email='$email' WHERE User_ID='$user_Id'");  
                                //header("location:profile_mgmt.php?action=profile_inserted");
                        }
                        
                       		    $Site_ID="";
				    $Site_Name="";
                

                }
	     $result4 = mysql_query("Update $tbl_name Set FirstName='$fname',LastName='$lname',App_UserName='$username',App_Password='$password',Address='$address',Email='$email' WHERE User_ID='$user_Id'");  
		
		
		header("location:profile_mgmt.php?action=profile_inserted");
	 //echo "success";                
	  }
	  //else
	  //{
	  //
	  //  //header("location:profile_mgmt.php?action=email_exits");
	  //}
			// run a query and check if user_id--site_id combination already exists in users_sites table
                        // if yes ( i.e. num_rows > 0  -- ideally num_rows=1)
                        // implies we already have record, just update it. so, run update query:
                        // update ... set username=..., password=... where user_id=.. and site_id = ...
                        // $_POST[$Site_Name.'_uname'] | $temp=$Site_Name.'_uname' , then get $$temp
                        // $_POST[$Site_Name.'_password'] | $$Site_Name.'_password'
                        
                        // if not (no rec)
                        // run insert query

                        
                        
                        

			   // uncomment
				// $result = mysql_query("insert into $tbl_name_UserSite(User_ID,Site_ID,Site_Username,Site_Password)values('$user_Id','$i','$propertyguru_uname','$propertyguru_upassword')");                 
				 //$result = mysql_query("Update $tbl_name_UserSite Set Site_ID='$i',Site_Username='$propertyguru_uname',Site_Password='$propertyguru_upassword' WHERE User_ID='$user_Id'");                 
			  
                        
                            

	        // $result= mysql_query("insert into $tbl_name(FirstName,LastName,App_UserName,App_Password,Is_Admin,Address,Email)values('$fname','$lname','$username','$password','$is_admin','$address','$email')"); //uncomment	                                   
                //  $result = mysql_query("Update $tbl_name Set FirstName='$fname',LastName='$lname',App_UserName='$username',App_Password='$password',Address='$address',Email='$email' WHERE User_ID='$user_Id'");
		//header("location:.php?action=email_notexits");
               // header("location:profile_mgmt.php?action=profile_inserted ");

	//}//  end main else
       // }

    // uncomment header("location:profile_mgmt.php?action=profile_inserted ");


ob_flush(); 

?>
