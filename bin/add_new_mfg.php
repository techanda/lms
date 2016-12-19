<script src="js/functions.js" type="text/javascript"></script>
<script>window.onunload = refreshParent;</script>

<?php
if(login_check() >= 999){
	$insert_name = $mysqli->escape_string($_POST['insert_name']);
	$insert_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));
	$insert_type = $_POST['insert_type'];

	$target_dir = $PATH['UPLOADS'].$_POST['folder_path']."/";
    $RandomAccountNumber = uniqid();
    $target_file = $target_dir . $RandomAccountNumber .".".basename($_FILES["fileToUpload"]["type"]);
    // echo $target_file;
    $uploadOk = 1;

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // echo $imageFileType;die();
    // Check if image file is a actual image or fake image

        //Sets the variables to be used to insert in MySQL
        $upload_file_name = $RandomAccountNumber .".".basename($_FILES["fileToUpload"]["type"]);
        $upload_image_type = $_POST["image_type"];



  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	if(isset($_POST['insert_desc'])){ $insert_desc = $mysqli->escape_string($_POST['insert_desc']);} else {$insert_desc = '';}
		$query = "INSERT INTO lms_mfg (mfg_name,mfg_desc,mfg_logo,mfg_type)
							VALUES ('$insert_name','$insert_desc','$upload_file_name','$mfg_type')";
							// echo $query;die();
							// print_r($_POST);die();
		if ($mysqli->query($query)) {
			$mfg_id = $mysqli->insert_id;
      header('Location: .?view=mfg_details&mfg_id='.$mfg_id);
	  } else {
	  	$error = 'Unable to Update Database';
      header('Location: .?'.$_POST['url_redirect'].'&submit_error='.urlencode($error));
	  }
  }
  else{
		$query = "INSERT INTO lms_mfg (mfg_name,mfg_desc)
				VALUES ('$insert_name','$insert_desc')";
				// echo $query;die();
				// print_r($_POST);die();
		if ($mysqli->query($query)) {
			$mfg_id = $mysqli->insert_id;
      header('Location: .?view=mfg_details&mfg_id='.$mfg_id);
	  } else {
	  	$error = 'Unable to Update Database';
      header('Location: .?'.$_POST['url_redirect'].'&submit_error='.urlencode($error));
	  }
  }
}