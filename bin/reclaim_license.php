<script src=<?php echo $__JS__."functions.js" ?> type="text/javascript"></script>

<?php
if(login_check() >= 999){
	if (!isset($_POST['lic_id']) || $_POST['lic_id'] == ''){
		$error = "No License Id posted";
		header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'&submit_error='.urlencode($error));
		exit();
	}

	$ldap_account = query_ldap_samaccount($ldap_connection,$ldap_username,$ldap_password,strtoupper($_POST['lic_user_samaccount']));
	if(isset($ldap_account)){
		$first_name 				= $ldap_account[strtoupper($_POST['lic_user_samaccount'])]['first_name'];
		$last_name 					= $ldap_account[strtoupper($_POST['lic_user_samaccount'])]['last_name'];
		$lic_user_email 			= $mysqli->real_escape_string($ldap_account[strtoupper($_POST['lic_user_samaccount'])]['email']);
		$lic_user_samaccount		= strtolower($_POST['lic_user_samaccount']);
		$lic_user 					= $mysqli->real_escape_string($first_name." ".$last_name);
		$send_mail = $_POST['send_email'];
	} else {
		$send_mail = 0;
	}

	$lic_id = $_POST['lic_id'];
	$query="UPDATE lms_lic SET lic_whenmodified = NOW(), lic_user = '', lic_user_email = '', lic_user_samaccount = '' WHERE lic_id=".$lic_id;
	if($mysqli->query($query)){

		if ($send_mail == 1) {
			//====== Mail Notification section ======
		
			//This section creates email from template

			//$firstname = $_POST['first_name'];
			$application = $_POST['sw_name'];
			$license_key = $_POST['lic_key'];
			$download_path = '#'; //Not set yet
			$technician = $_SESSION['given_name'] . " " . $_SESSION['surname'];
			$tech_message = $_POST['tech_message']; //Not set yet
			include $PATH['MAILERS'].'mailer.reclaim_license.php';
			
			//this section sets the message information

			$mail_to = $lic_user_email;
			$mail_cc = $_SESSION['email'];
			$subject = 'A License Key Has Been Revoked From Your Account';
			include $PATH['BIN'].'send_mail.php';
		}
    
		header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'#lic_'.$_POST['lic_id']);
		exit();
	} else {
		$error="Unable to update the database";
		header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'&submit_error='.urlencode($error));
		exit();
	}
}
?>

