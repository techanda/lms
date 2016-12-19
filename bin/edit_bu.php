<?php
if(login_check() >= 999){
	$insert_name = $mysqli->escape_string($_POST['insert_name']);
	$insert_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));
	$bu_id = $mysqli->escape_string($_POST['bu_id']);

	if(isset($_POST['insert_desc'])){ $insert_desc = $mysqli->escape_string($_POST['insert_desc']);} else {$insert_desc = '';}
	$query = "UPDATE lms_bu SET bu_name='$insert_name',bu_desc='$insert_desc' WHERE bu_id='$bu_id'";
						// echo $query;die();
						// print_r($_POST);die();
	if ($mysqli->query($query)) {
    header('Location: .?'.$_POST['url_redirect']);
  } else {
  	$error = 'Unable to Update Database';
    header('Location: .?'.$_POST['url_redirect'].'&submit_error='.urlencode($error));
  }
}
  