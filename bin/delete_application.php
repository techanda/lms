
<script src="js/functions.js" type="text/javascript"></script>
<?php
if(login_check() >= 999){
	// echo 'Loaded Delete Method';die();
	$sw_id = $_POST['software_id'];
	$target_dir = $PATH['UPLOADS'].$_POST['folder_path']."/";
	$query="DELETE FROM lms_sw WHERE sw_id=".$sw_id;
	// echo $query;die();

	if(!$mysqli->query($query)){
		$error="Unable to Remove Application from the database";
		header("Location: frame_new_license.php?submit_error=".urlencode($error));
	}

	if (array_key_exists('delete_file', $_POST)) {
	  $filename = $target_dir.$_POST['delete_file'];
	  if (file_exists($filename)) {
	    unlink($filename);
	  } 
	}
	if (isset($_POST['del_license'])) {
		$query = "DELETE FROM lms_lic WHERE lic_sw=".$sw_id;
		if ($mysqli->query($query)) {
      /*Closes the current window*/
      header('Location: .?view=admin_sw');
	  } else {
      echo '<p class="text-pink">Error: Unable to Update Database</p>';
	  }
	}
}
?>

