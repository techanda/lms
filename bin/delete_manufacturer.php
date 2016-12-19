
<script src="js/functions.js" type="text/javascript"></script>
<?php
if(login_check() >= 999){
	// echo 'Loaded Delete Method';die();
	$mfg_id = $_POST['mfg_id'];
	$target_dir = $PATH['UPLOADS'].$_POST['folder_path']."/";
	$query="DELETE FROM lms_mfg WHERE mfg_id=".$mfg_id;
	// echo $query;die();

	if(!$mysqli->query($query)){
		$error="Unable to Remove Manufacturer from the database";
		header("Location: ".$_POST['url_redirect']."?submit_error=".urlencode($error));
	} else {
		$query="UPDATE lms_sw SET sw_mfg = '1' WHERE sw_mfg = '$mfg_id'";
		if(!$mysqli->query($query)){
			$error="Unable to set orphaned Applications to Manufacturer of Other";
			header("Location: ".$_POST['url_redirect']."?submit_error=".urlencode($error));
		} else {
		header("Location: .?view=mfg_list");
		exit();
		}
	} 

	

	if (array_key_exists('delete_file', $_POST)) {
	  $filename = $target_dir.$_POST['delete_file'];
	  if (file_exists($filename)) {
	    unlink($filename);
	  }
	}
}
?>

