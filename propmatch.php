<?php
session_start();

include_once 'db.php';

if(isset($_SESSION['data'])){
$data = $_SESSION['data'];}else{$data=array();}
$data['username'] = $_SESSION['credentials']['propmatch']['username'];
$data['password'] = $_SESSION['credentials']['propmatch']['password'];


if(empty($data['username']) || empty($data['password'])) {
	echo "Username/Password for propmatch not set. Skipping..."; ob_flush();
}

if(isset($_REQUEST['Action'])){
	
echo $_REQUEST['Action'];	
if('delete'==$_REQUEST['Action'])
{
	$data['handle'] = $_SESSION['handle']['propmatch'];
	echo "Inside delete";
	echo "Deleting ad from propmatch...";ob_flush();
	include_once 'modules/propmatch/main.php';
	$object = new propmatch();
	$ret_val = $object->delete_ad($data); // $data is associative array containing login credentials and handle 
            print_r($ret_val);
                if($ret_val['code']){
			echo "Successful deletion";
			// Delete from db
		$query = "SELECT Site_ID FROM $tbl_name_sites WHERE Site_Name='propmatch'";
		$result = mysql_query($query);
		if(!$result) {
			echo mysql_error();
		}
		$row = mysql_fetch_assoc($result);
                //$query="DELETE FROM $tbl_name_AdSites WHERE Ads_ID='{$_SESSION['Ads_ID_Delete']}' AND Site_ID='{$row['Site_ID']}'";
		$query="UPDATE $tbl_name_AdSites SET is_active=1 WHERE Ads_ID='{$_SESSION['Ads_ID_Delete']}' AND Site_ID='{$row['Site_ID']}'";//  for delete repost
		$s=mysql_query($query);
		if(!$s)
			{
			echo mysql_error();
			}
		               
                }
	$_SESSION['responses']['propmatch'] = $ret_val;
	$_SESSION['processing_site'] += 1;
	$location = '';
	$location = array_pop($_SESSION['selected_sites']);
	if(empty($location)) {
		$location = 'delete_Ad.php';
	}
	else {
		$location .= '.php?Action=delete'; // append .php to location value. xyz => xyz.php
	}
	
	echo "navigating to $location";ob_flush();
	echo '<meta http-equiv="refresh" content="0; url='.$location.'">';
		
	
}}

else {
	// print_r($data);
	echo "Posting ad to propmatch...";ob_flush();
	include_once 'modules/propmatch/main.php';
	$object = new propmatch();
	$response = $object->post_ad($data);
	// print_r($response);
	if($response['code']) {
		// insert into db
		$query = "SELECT Site_ID FROM $tbl_name_sites WHERE Site_Name='propmatch'";
		$result = mysql_query($query);
		if(!$result) {
			echo mysql_error();
		}
		$row = mysql_fetch_assoc($result);
		
		$query = "INSERT INTO $tbl_name_AdSites(Site_ID, Ads_ID, Ad_Link, handle) values('{$row['Site_ID']}', '{$_SESSION['ads_id']}', '{$response['link']}', '{$response['handle']}')";
		// echo $query;
		$result = mysql_query($query);
		if(!$result) {
			echo mysql_error();
		}
	}
	$_SESSION['responses']['propmatch'] = $response;
	$_SESSION['processing_site'] += 1;
	$location = '';
	// echo $_SESSION['processing_site'];
	$location = array_pop($_SESSION['selected_sites']);
	echo "navigating to $location";ob_flush();
	if(empty($location)) {
		$location = 'view_Ad.php';
	}
	else {
		$location .= '.php'; // append .php to location value. xyz => xyz.php
	}
	echo '<meta http-equiv="refresh" content="15; url='.$location.'">';
}
?>