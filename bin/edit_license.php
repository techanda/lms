<script src="js/functions.js" type="text/javascript"></script>
<script>window.onunload = refreshParent;</script>

<?php
	if(login_check() >= 999){
		if (!isset($_POST['insert_license']) || $_POST['insert_license'] == ''){
			$error = "Please Provide a Valid Key";
			header("Location: ".$_POST['request_uri']."&submit_error=".urlencode($error));
			exit();
		}
	$lic_purchdate = $_POST['insert_purchase'];
	$lic_expdate = $_POST['insert_exp'];
	$lic_po = $_POST['insert_po'];
	$lic_sw = $_POST['insert_swid'];
	$lic_type = $_POST['insert_type'];
	$lic_key = $mysqli->real_escape_string(htmlentities($_POST['insert_license'],ENT_QUOTES));
	$lic_bu = $_POST['insert_bu']; 
	$lic_id = $_POST['license_id'];

	$query="UPDATE lms_lic
					SET lic_purchdate = '$lic_purchdate',
							lic_expdate = '$lic_expdate',
							lic_po = '$lic_po',
							lic_sw = '$lic_sw',
							lic_lic_type = '$lic_type',
							lic_key = '$lic_key',
							lic_bu = '$lic_bu'
					WHERE lic_id = '$lic_id'";
	// echo $query;die();
		if ($mysqli->query($query)) {
      /*Closes the current window*/
      header('Location: .?view=admin_sw_details&swid='.$_POST['insert_swid']);
	  } else {
      echo '<p class="text-pink">Error: Unable to Update Database</p>';
	  }
}

