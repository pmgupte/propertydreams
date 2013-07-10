<?php include 'db.php';

if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }

ob_start();
 $tbl_name_AdSites='sites_ads';
    $tbl_name_user_site='user_site';?>
<html>
<head>
<title>Sites</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type='text/javascript'>
function reloadpage()
{
// reload the opener or the parent window
window.opener.location.reload();
// then close this pop-up window
window.close();
}</script>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD']=='GET')
{
?>
<form action="view_site_panel.php" method="post" name="frmPopup" id="frmPopup">
<table width="185" border="1" cellspacing="0" cellpadding="0">
<?php
$_SESSION['Ads_ID_Delete']=$_GET['Ads_ID'];
//Db query for view site panel 
$query="SELECT $tbl_name_AdSites.Site_ID,$tbl_name_sites.Site_Name from $tbl_name_AdSites,$tbl_name_sites WHERE $tbl_name_AdSites.Ads_ID='$_GET[Ads_ID]' AND $tbl_name_AdSites.Site_ID=$tbl_name_sites.Site_ID AND is_active='0'";
$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());

while($row = mysql_fetch_array($result))
{
?>
    <tr>
    <td width="64"><input name="<?php echo $row['Site_Name']?>" type="checkbox" id="<?php echo $row['Site_ID']?>" value="<?php echo $row['Site_ID'];?>" ></td>
    <td width="115"><?php echo $row['Site_Name']?></td>
    </tr>
   
<?php
}
$_SESSION['operation']="delete";
?>
</table>
<br>
<input name="btnSelect" type="submit" value="Delete">
<!--<input name="btnSelect" type="submit" value="Select" onClick="JavaScript:reloadpage();">-->
</form>

<?php
}


else if($_SERVER['REQUEST_METHOD']=='POST')
{
     
//include 'helper_functions.php';
$App_ID=$_SESSION['User_ID'];
$data=array();


//Site Selected store in session
/* Pranali: code to get site credentials for currently logged-in user */
	$q_creds = "SELECT Site_Name, Site_Username, Site_Password FROM $tbl_name_sites, $tbl_name_user_site WHERE sites.Site_ID = user_site.Site_ID AND User_ID=$App_ID";
	$r_creds = mysql_query($q_creds);
	if(!$r_creds) {
		$_SESSION['is_successfull'] = false;
		$_SESSION['message'] = mysql_error();
	}
	$credentials = array();
	$handle=array();
	while($row = mysql_fetch_assoc($r_creds)) {
		$credentials[$row['Site_Name']] = array('username'=>$row['Site_Username'], 'password'=>$row['Site_Password']);
	}
	// store these creds into session
	$_SESSION['credentials'] = $credentials;
       /*Pranali: code to get handle for particular */
    /* Prabhas: code to loop through sites and make post calls */
    $_SESSION['selected_sites'] = array();
    $_SESSION['responses'] = array();
	foreach(array_keys($credentials) as $site) {
    	// if given site is selected (check-marked) and its creds are non-empty,
    	// add it to list of sites to post this ad to.
        if(isset($_POST[$site])) {
	   
	     $query_fetch_handle="SELECT handle FROM $tbl_name_AdSites WHERE Ads_ID='{$_SESSION['Ads_ID_Delete']}' AND Site_ID='{$_POST[$site]}'";
			
                                $res=mysql_query($query_fetch_handle);
                                while($row = mysql_fetch_array($res)) {
                                $handle[$site]=$row['handle'];
                                }
				$_SESSION['handle'] = $handle;
        	$_SESSION['selected_sites'][] = $site;
        }// if isset site
	}// foreach
	
$_SESSION['processing_site'] = 0;

	// echo $_SESSION['processing_site'];
	// print_r($_SESSION['selected_sites']); 
	// redirect to first site:
	$location = array_pop($_SESSION['selected_sites']) ;
	if(empty($location)) {
	$_SESSION['is_successfull'] = false;
	$_SESSION['message'] = 'No site selected. Please select at least one.';
	echo "<meta http-equiv=\"refresh\" content=\"0; url='delete_Ad.php'\">";
        exit;
	}
else {
    $location .= '.php?Action=delete';
}
	echo "navigating to $location";
	echo '<meta http-equiv="refresh" content="0; url='.$location.'">';
}
else {
	$_SESSION['is_successfull']=false;
	$_SESSION['message']="Sorry Error in Deleting";
}
//$data=array();
//
//$query="SELECT $tbl_name_AdSites.Site_ID from $tbl_name_AdSites WHERE Ads_ID='{$_POST['Ads_ID']}'";
//$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());
//$result_rows=mysql_num_rows($result);
//if($result_rows==0)
//{
//    $res=delete_Ad_Details($_POST['Ads_ID'],0);
//}
//while($row as mysql_fetch_array($result))
//{
//    
//}
/*$count_sites=0;
 if(isset($_POST['propertyguru']))
                {
                     $propertyguru=$_POST['propertyguru'];
                        echo $propertyguru;
                                $temp_query="SELECT Site_Username,Site_Password FROM $tbl_name_user_site WHERE User_ID='$App_ID' AND Site_ID='$propertyguru'";
				echo "Temp_Q",$temp_query;
                                
                                $res=mysql_query($temp_query);
                                while($row = mysql_fetch_array($res)) {
                                
                                $data['username']=$row['Site_Username'];
                                $data['password']=$row['Site_Password'];
                               // $data['handle']=$row['handle'];
                                }
                                $temp_query1="SELECT handle FROM $tbl_name_AdSites WHERE Ads_ID='$Ads_ID' AND Site_ID='$propertyguru'";
				echo "Temp_Q",$temp_query;
                                
                                $res=mysql_query($temp_query1);
                                while($row = mysql_fetch_array($res)) {
                                $data['handle']=$row['handle'];
                                }
                    echo "data";
                    print_r($data);   
                 include 'modules/propertyguru/main.php';//Commented by pranali
            	// create object
		 $object = new propertyguru();//Commented by pranali
                 $ret_val = $object->delete_ad($data); // $data is associative array containing login credentials and handle 
                print_r($ret_val);
                
                if($ret_val['code']){
                delete_Adsites_deatils($_POST['Ads_ID'],$_POST['propertyguru']);
                $count_sites++;
                }
                }
if(isset($_POST['Wordpress']))
{
//mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['Wordpress']}','$Ads_ID')");
}
if(isset($_POST['iproperty']))
{
//mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['iproperty']}','$Ads_ID')");
}  

 if(isset($_POST['rentinsingapore']))
                {
                        $rentinsingapore=$_POST['rentinsingapore'];
                        echo $rentinsingapore;
                                $temp_query="SELECT Site_Username,Site_Password FROM $tbl_name_user_site WHERE User_ID='$App_ID' AND Site_ID='$rentinsingapore'";
				echo "Temp_Q",$temp_query;
                                
                                $res=mysql_query($temp_query);
                                while($row = mysql_fetch_array($res)) {
                                
                                $data['username']=$row['Site_Username'];
                                $data['password']=$row['Site_Password'];
                               // $data['handle']=$row['handle'];
                                }
                                $temp_query1="SELECT handle FROM $tbl_name_AdSites WHERE Ads_ID='$Ads_ID' AND Site_ID='$rentinsingapore'";
				echo "Temp_Q",$temp_query;
                                
                                $res=mysql_query($temp_query1);
                                while($row = mysql_fetch_array($res)) {
                                $data['handle']=$row['handle'];
                                }
                                print_r($data);
                                
                                 include 'modules/rentinsingapore/main.php';//Commented by pranali
            
				// create object
				 $object = new rent_in_singapore();//Commented by pranali
                                 $ret_val = $object->delete_ad($data); // $data is associative array containing login credentials and handle
                                 print_r($ret_val);
                               
                                // echo "ret_val";
                                
                                                 
                                 if($ret_val['code']){
                                    
                delete_Adsites_deatils($_POST['Ads_ID'],$_POST['rentinsingapore']);
                $count_sites++;
               }
} 

  if(isset($_POST['propmatch']))
                {
                     $propmatch=$_POST['propmatch'];
                    $temp_query="SELECT Site_Username,Site_Password FROM $tbl_name_user_site WHERE User_ID='$App_ID' AND Site_ID='$propmatch'";
				
                                $res=mysql_query($temp_query);
                                while($row = mysql_fetch_array($res)) {
                                
                                $data['username']=$row['Site_Username'];
                                $data['password']=$row['Site_Password']; }
  $temp_query1="SELECT handle FROM $tbl_name_AdSites WHERE Ads_ID='$Ads_ID' AND Site_ID='$propmatch'";
				echo "Temp_Q",$temp_query;
                                
                                $res=mysql_query($temp_query1);
                                while($row = mysql_fetch_array($res)) {
                                $data['handle']=$row['handle'];
                                }

                     include 'modules/propmatch/main.php';
                    $object = new propmatch();
                    $ret_val = $object->delete_ad($data); // $data is associative array containing login credentials and handle 
                 
 if($ret_val['code']){
                delete_Adsites_deatils($_POST['Ads_ID'],$_POST['propmatch']);
                $count_sites++;
                }
                }
 
  if(isset($_POST['sisvrealink']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['sisvrealink']}','$Ads_ID')");
                }
  if(isset($_POST['cobrokehub']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['cobrokehub']}','$Ads_ID')");
                }





   if($count_sites==$result_rows)
    {
   $res=delete_Ad_Details($_POST['Ads_ID'],0);
  // 
    }
    //$_SESSION['is_successfull']=false;
    $_SESSION['message']="Ad"; */
    //header("location:view_Ad.php");   
 
//}
?>

</body>
</html>
