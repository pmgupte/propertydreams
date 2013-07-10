<?php 
function create_database($db_host, $db_user, $db_pass) {
	$db_conn = @mysql_connect($db_host, $db_user, $db_pass);
	if(!$db_conn) {
		return array (
			'code'=>false, 
			'message'=>'Could not connect to given database server. Please make sure you enterred correct values.'
		);
	}
	
	$contents = file_get_contents('db.schema');
	$queries = explode(';', $contents);

	foreach($queries as $query) {
		if(empty($query)) continue;
		$result = mysql_query($query);
		if(!$result) {
			return array (
				'code'=>false, 
				'message'=>'Error encountered while creating database schema: ' . mysql_error()
			);			
		}// if
	}// foreach
	
	return array('code'=>true);
}// create_database

function create_db_file($db_host, $db_user, $db_pass) {
	$ret_val = array();
	
	$contents = file_get_contents('db.php.sample');
	$contents = str_replace("##DB_HOST##", $db_host, $contents);
	$contents = str_replace("##DB_USER##", $db_user, $contents);
	$contents = str_replace("##DB_PASS##", $db_pass, $contents);

	if(is_writable('.')) {
		file_put_contents('db.php', $contents);
		$ret_val['code'] = true;
	}
	else {
		$ret_val['code'] = false;
		$ret_val['contents'] = $contents;
	}
	
	return $ret_val;
}// create_db_file

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Property Dreams Installation</title>
	<link rel="stylesheet" id="install-css" href="install_files/install.css" type="text/css" media="all">
</head>
<body>
<!--
<h1 id="logo"><img alt="Property Dreams" src="install_files/logo.png"></h1>
-->

<?php
if("POST" == $_SERVER['REQUEST_METHOD']) {
	$db_host = $_POST['db_host'];
	$db_user = $_POST['db_user'];
	$db_pass = $_POST['db_pass'];
	
	$response = create_database($db_host, $db_user, $db_pass);
	if(!$response['code']) {
		?>
		<p><font color="red"><?php echo $response['message']; ?></font></p> 
		<?php 
	}
	else {
		?>
		<p>
			Property Dreams installed successfully. <a href="index.php">Click here</a> to go to login page.<br />
			We have created a default admin user with login name 'admin', and password 'admin'.
		</p>
		<?php 
		$response_file = create_db_file($db_host, $db_user, $db_pass);
		if(!$response_file['code']) {
			?>
			<p>
			<font color="red">Could not create database config file as application directory is not writable.</font>
			Please create a file named 'db.php' and put in it the contents given in box below. Finally, save the file.
			</p>
			<p>
			<textarea rows="10" cols="50"><?php echo $response_file['contents']; ?></textarea>
			</p>
			<?php 
		}// if
	}// else
} // if POST
else {
?>
<h1>Welcome</h1>
<p>Welcome to the Property Dreams installation process! Just fill in the information below and you’ll be on your way to using the this application.</p>

<h1>Information needed</h1>
<p>Please provide the following information. Don’t worry, you can always change these settings later.</p>


<form id="setup" method="post" action="install.php">
	<table class="form-table">
		<tbody>
			<tr>
			<th scope="row"><label for="weblog_title">Database Server</label></th>
			<td>
				<input name="db_host" id="db_host" size="25" type="text">
				<p>The hostname you use while connecting to your database server.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="user_name">Database User</label></th>
			<td>
				<input name="db_user" id="db_user" size="25" value="root" type="text">
				<p>The username you use to log into your database server.</p>
			</td>
		</tr>
				<tr>
			<th scope="row">
				<label for="admin_password">Database Password</label>
			</th>
			<td>
				<input name="db_pass" id="db_pass" size="25" value="" type="password">
				<p>The password for username entered in above field.</p>
			</td>
		</tr>
	</tbody>
</table>

<p class="step"><input name="Submit" value="Install Property Dreams" class="button" type="submit"></p>
</form>
<?php 
} // else
?>
</body>
</html>
