<?php
session_start();
ob_start();
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}

ini_set('max_execution_time', 90);

include 'includeFiles.php';
$tbl_name="user";
//$user_Id=$_SESSION['App_ID'];
//$username=$_POST['username'];
$forgotemail=$_POST['forgotemail'];


	function gen_password($size = 8) {
		$size = $size > 36 ? 30 : $size;
		$pool = array_merge(range(0, 9), range('A', 'Z'));
		$rand_keys = array_rand($pool, $size);
 
		$autopassword = '';
 
		foreach ($rand_keys as $key) {
			$autopassword .= $pool[$key];
		}
 
		return $autopassword;
	}
 
	$autopassword = gen_password(10);
	
	$result = mysql_query("SELECT * FROM $tbl_name WHERE Email='$forgotemail' ");
              
              	while($row = mysql_fetch_array($result))
			{
				//$F_Name=$row['Firstname'];
				$password_row=$row['App_Password'];
				$Email_row=$row['Email'];						
			}
              
        if (mysql_num_rows($result) == 0)
                {

                    header("Location:index.php?action=invalidemail && forgotemail=$forgotemail");

                }
	else
		{
            
                            
                  $to =$forgotemail;
		  $subject = "Sending The Changed Password.";
		  $message="Your new Generated Password is"." ".$autopassword;
		  $from = $forgotemail;
		  $headers = "From:" . $from;
		  mail($forgotemail,$subject,$message,$headers);
		  echo "Mail Sent.";
           
          
	        $result = mysql_query("Update $tbl_name Set Email='$forgotemail', App_Password='$autopassword' WHERE Email='$Email_row'&& App_Password='$password_row'");
 
	
		header("Location:index.php?action=emailsent");
 
                }

ob_flush();

?>