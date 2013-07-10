<?php
function validate($username, $password) {
	if(("admin" == $username) && ("admin" == $password)) {
		return true;
	}
	else { return false; }
}
?>