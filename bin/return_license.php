<?php
if(login_check() >= 999){
	if (!isset($_POST['lic_id']) || $_POST['lic_id'] == ''){
		$error = "No License Id posted";
		header('Location: .?view=user_details&submit_error='.urlencode($error));
		exit();
	}

	$lic_id = $_POST['lic_id'];
	$query="UPDATE lms_lic SET lic_whenmodified = NOW(), lic_user = '', lic_user_email = '', lic_user_samaccount = '' WHERE lic_id=".$lic_id;
	if($mysqli->query($query)){
		/*Closes the current window*/
		header('Location: .?'.$_POST['url_redirect']);
		exit();
	} else {
		$error="Unable to update the database";
		header('Location: .?'.$_POST['url_redirect'].'&submit_error='.urlencode($error));
		exit();
	}
}
?>

