<?php //echo "Hi man"; 
@session_start();
		 $host="localhost"; // Host name
		 $username="root"; // Mysql username
		 $password=""; // Mysql password
		 $db_name="DB_Property"; // Database name
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB"); 
 
		$tbl_name="user"; // Table name
// Hi
// SQL Query on emp_details 
		// $sql="SELECT * FROM $tbl_name WHERE Type='Admin' ='Operator'";
		// $sql="SELECT * FROM $tbl_name WHERE Type='Admin' AND Emp_Id='S-001'"; 
$sql="SELECT * FROM $tbl_name WHERE Type='Admin' OR Type='Operater' AND Status='Active'";		
		$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());
			

	
	while($row = mysql_fetch_array($result))
	{
	// echo "Hi";
	// echo "<br>";
	$email_Array[]=array($row['Email']);
		$Email =$row['Email'];
		// echo "$Email";
	}
	// print_r($email_Array);
	return $email_Array;

?>