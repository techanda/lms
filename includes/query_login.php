<?php
$query = "SELECT MAX(login_timestamp),login_user,login_browser,login_timestamp FROM `lms_login` WHERE login_user = '$sam_account_name'";
$login_results = $mysqli->query($query);
$login_info = $login_results->fetch_assoc();


$query = "SELECT * FROM `lms_login` WHERE login_user = '$sam_account_name' ORDER BY login_timestamp DESC LIMIT 10";
$login_audit = $mysqli->query($query);
