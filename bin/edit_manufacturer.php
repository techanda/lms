<?php
if(login_check() >= 999){
	$insert_name = $mysqli->escape_string($_POST['insert_name']);
	$insert_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));
	$insert_type = $_POST['insert_type'];
	$mfg_id = $mysqli->escape_string($_POST['mfg_id']);

	if(isset($_POST['insert_desc'])){ $insert_desc = $mysqli->escape_string($_POST['insert_desc']);} else {$insert_desc = '';}
	$query = "UPDATE lms_mfg SET mfg_name='$insert_name',mfg_desc='$insert_desc',mfg_type='$insert_type' WHERE mfg_id='$mfg_id'";
						// echo $query;die();
						// print_r($_POST);die();
	if ($mysqli->query($query)) {
    header('Location: .?'.$_POST['url_redirect']);
  } else {
  	$error = 'Unable to Update Database';
    header('Location: .?'.$_POST['url_redirect'].'&submit_error='.urlencode($error));
  }
}
  