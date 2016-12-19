<?php
//Starts a session if one has not be started yet
if(!isset($_SESSION)){
	session_start();
}

echo $ldap_username.'<br>';
echo $ldap_password.'<br>';

echo '<pre>';
print_r($ldap_connection);
print_r (query_ldap_samaccount($ldap_connection,$ldap_username,$ldap_password,$_GET['samaccount']));
echo '</pre>';
?>

<div class='container'>
	<div class='row'>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>

</div>