
<script src="js/functions.js" type="text/javascript"></script>
<?php
if(login_check() >= 999){
	// echo 'Loaded Delete Method';die();
	$hw_id = $_POST['hw_id'];
	$target_dir = $PATH['UPLOADS'].$_POST['folder_path']."/";
	$query="DELETE FROM lms_hw WHERE hw_id=".$hw_id;
	// echo $query;die();

	if(!$mysqli->query($query)){
		$error="Unable to Remove Business Unit from the database";
		header("Location: .?".$_POST['url_redirect']."&submit_error=".urlencode($error));
	}  else {
		header("Location: .?view=admin_hw_list");
	}

	if (array_key_exists('delete_file', $_POST)) {
	  $filename = $target_dir.$_POST['delete_file'];
	  if (file_exists($filename)) {
	    unlink($filename);
	  }
	}
}
?>

