
<script src="js/functions.js" type="text/javascript"></script>
<?php
	if(login_check() >= 999){
		// echo 'Loaded Delete Method';die();
		$lic_id = $_POST['license_id'];
		$query="DELETE FROM lms_lic WHERE lic_id=".$lic_id;
		// echo $query;
		// echo $_POST['url_redirect'];die();
	  if ($mysqli->query($query)) {
	      /*Closes the current window*/
	      header('Location: .?view=admin_sw_details&swid='.$_POST['sw_id']);
	  } else {
	      echo '<p class="text-pink">Error: Unable to Update Database</p>';
	  }
}
?>
