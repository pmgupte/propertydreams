<?php 
	@session_start();
	$host="localhost"; // Host name
 	$username="root"; // Mysql username
 	$password=""; // Mysql password
 	$db_name="db_propert_aminities"; // Database name

	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
        
	$tbl_name_Ad='ads';
	$tbl_name_sites='sites';
	$tbl_name_AdSites='sites_ads';
	$tbl_name_user_site='user_site';
?>