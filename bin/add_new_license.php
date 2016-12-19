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
	$quantity = $_POST['insert_quantity'];
	$n = 0;

	$query="INSERT INTO lms_lic (lic_sw,lic_lic_type,lic_key,lic_bu,lic_whencreated,lic_whenmodified,
						lic_po,lic_purchdate,lic_expdate)
			VALUES ('$lic_sw','$lic_type','$lic_key','$lic_bu',NOW(),NOW(),'$lic_po','$lic_purchdate','$lic_expdate')";

	while ($n < $quantity) {$mysqli->query($query);$n++;}

  header('Location: .?view=admin_sw_details&swid='.$_POST['insert_swid']);
        
}

