<?php
function login_check(){
	if (isset($_SESSION['username'])) {$username = $_SESSION['username'];}
	if (isset($_SESSION['given_name'])) {$given_name = $_SESSION['given_name'];}
	if (isset($_SESSION['admin_priveleges'])) {$admin_check = $_SESSION['admin_priveleges'];}
	if (isset($_SESSION['login_string'])) {$login_string = $_SESSION['login_string'];}

	if(isset($login_string) && isset($given_name) && isset($username)){
		if (isset($admin_check) && $admin_check == true) {
			return 999;
		} else {
			return 1;
		}
	} else {
		return 0;
	}
}