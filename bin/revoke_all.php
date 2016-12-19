<?php
if(login_check() >= 999){
	if (isset($_POST['sam_account_name']) && $_POST['sam_account_name'] != '') {
		$sam_account_name = $_POST['sam_account_name'];

		$query="UPDATE lms_lic SET lic_whenmodified = NOW(), lic_user = '', lic_user_email = '', lic_user_samaccount = '' WHERE lic_user_samaccount='$sam_account_name'";
		// echo $query;die();
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
}