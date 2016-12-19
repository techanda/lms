
<script src="js/functions.js" type="text/javascript"></script>
<?php
if(login_check() >= 999){
	// echo 'Loaded Delete Method';die();
	$bu_id = $_POST['bu_id'];
	$target_dir = $PATH['UPLOADS'].$_POST['folder_path']."/";
	$query="DELETE FROM lms_bu WHERE bu_id=".$bu_id;
	// echo $query;die();

	if(!$mysqli->query($query)){
		$error="Unable to Remove Business Unit from the database";
		header("Location: .?".$_POST['url_redirect']."&submit_error=".urlencode($error));
	} else {
		$query="UPDATE lms_lic SET lic_bu = '1' WHERE lic_bu = '$bu_id'";
		if(!$mysqli->query($query)){
			$error="Unable to set orphaned Applications to Business Unit of Other";
			header("Location: .?".$_POST['url_redirect']."&submit_error=".urlencode($error));
		} else {
		header("Location: .?view=bu_list");
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

