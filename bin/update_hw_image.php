<?php
if(login_check() >= 999){
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

    // echo $upload_file_name;die();
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        $query = "UPDATE lms_hw
                SET hw_img = '$upload_file_name'
            WHERE   hw_id = ".$_POST['hw_id'];
    // echo $query;die();
    if ($mysqli->query($query)) {

        // Removes current file from directory
        if (array_key_exists('delete_file', $_POST)) {
            $filename = $target_dir.$_POST['delete_file'];
            if (file_exists($filename)) {
                unlink($filename);
            } 
        }
        /*Closes the current window*/
        header('Location: .?view=hw_details&hw_id='.$_POST['hw_id']);
    } else {
        $error = 'Unable to Update Database';
        header('Location: .?view=hw_details&hw_id='.$_POST['hw_id']."&submit_error=".urlencode($error));
    }
    }
}
