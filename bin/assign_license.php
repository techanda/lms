<?php

if(login_check() >= 999){
	if(isset($_POST['insert_name']) && $_POST['insert_name'] != '')
	{
		$ldap_account = query_ldap_samaccount($ldap_connection,$ldap_username,$ldap_password,strtoupper($_POST['insert_name']));
		if(isset($ldap_account)){
			$first_name 				= $ldap_account[strtoupper($_POST['insert_name'])]['first_name'];
			$last_name 					= $ldap_account[strtoupper($_POST['insert_name'])]['last_name'];
			$lic_user_email 			= $mysqli->real_escape_string($ldap_account[strtoupper($_POST['insert_name'])]['email']);
			$lic_user_samaccount		= strtolower($_POST['insert_name']);
			$lic_user 					= $mysqli->real_escape_string($first_name." ".$last_name);
		}
		else
		{
			$error = 	'No user with Account: "'.strtoupper($_POST['insert_name']).
						'" can be located on Domain Controller: "'.strtoupper($ldap_hostname).'"';
						header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'&submit_error='.urlencode($error));
						exit();
		}
	}
	else
	{
		$error = "Please Enter a Username";
		// echo 'went to spot 2';die();
		header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'&submit_error='.urlencode($error));
		exit();
	}

	if (!isset($_POST['lic_id']) || $_POST['lic_id'] == ''){
		$error = "No License Id posted";
		header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'&submit_error='.urlencode($error));
		exit();
	}

	$lic_id = $_POST['lic_id'];

	$query="UPDATE lms_lic SET lic_whenmodified = NOW(), lic_user ='".$lic_user."',lic_user_samaccount ='".$lic_user_samaccount."',lic_user_email='".$lic_user_email."' WHERE lic_id=".$lic_id;
	if ($mysqli->query($query)) {
    if ($_POST['send_email'] == 1) {
	    //====== Mail Notification section ======
			
			//This section creates email from template

			//$firstname - This variable is set above
			$application = $_POST['sw_name'];
			$license_key = $_POST['lic_key'];
			$download_path = '#'; //Not set yet
			$technician = $_SESSION['given_name'] . " " . $_SESSION['surname'];
			$tech_message = $_POST['tech_message']; //Not set yet
			include $PATH['MAILERS'].'mailer.assign_license.php';
			
			//this section sets the message information

			$mail_to = $lic_user_email;
			$mail_cc = $_SESSION['email'];
			$subject = 'Your Application Request has been Approved';
			include $PATH['BIN'].'send_mail.php';
		}








    header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'#lic_'.$_POST['lic_id']);
    exit();
  } else {
    $error = "Unable to Update Database";
		header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id'].'&submit_error='.urlencode($error));
		exit();
  }





}

