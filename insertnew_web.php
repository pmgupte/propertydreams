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



$newsitename=$_POST['newsitename'];
$moduleyesno=$_POST['moduleyesno'];
$user_Id=$_SESSION['User_ID'];



if($moduleyesno == 0)
{
    
     header("location:add_web.php?action=nomodule");
}
else{
    
        
        $sql="select * from $tbl_name_sites";
        $result= mysql_query($sql); 
		while($row = mysql_fetch_array($result))
                {
                    //print_r($row);
                    //echo "this is $var";
                       $Site_Name =$row['Site_Name']; //propertyguru, rentinsingapore etc
                       $Site_ID = $row['Site_ID']; // 1, 2, 3,etc 
                }
        $result3 = mysql_query("insert into $tbl_name_sites(Site_Name)values('$newsitename')");
        header("location:add_web.php?action=yesmodule");
}
ob_flush();
?>
