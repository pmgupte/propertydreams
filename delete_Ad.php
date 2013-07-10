<script>
window.opener.location.reload();
// then close this pop-up window
window.close();
</script><?php
session_start();
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }

ob_start();
include 'helper_functions.php';
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';


$query="SELECT $tbl_name_AdSites.Site_ID from $tbl_name_AdSites WHERE Ads_ID='{$_SESSION['Ads_ID_Delete']}' AND is_active='0'";
$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());
//echo $query;
echo mysql_num_rows($result);

if(0==mysql_num_rows($result))
{
    $res=delete_Ad_Details($_SESSION['Ads_ID_Delete'],0);
    echo "Delete Record from ad & sites_ads table";
}
else{
    echo "Delete records from ads_sites table";
    
}


   
    
   // echo $ad_id;
    // echo "up code:",$res;
    
		$location = 'view_Ad.php';

	

	//echo "navigating to $location";ob_flush();
	//echo "$location";
	//echo '<meta http-equiv="refresh" content="0; url='.$location.'">';   
    
    
    
ob_flush();
?>