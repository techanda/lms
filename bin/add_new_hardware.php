<?php
if(login_check() >= 999){

    //Checks for a name being entered
    if(isset($_POST['insert_name']) && $_POST['insert_name'] != ''){
        $hw_name = $_POST['insert_name'];
    }

    //Checks for a manufacturer being selected
    if(isset($_POST['insert_mfg']) && $_POST['insert_mfg'] != ''){
        $hw_mfg = $_POST['insert_mfg'];
    }


    //checks for a type being selected
    if(isset($_POST['insert_type']) && $_POST['insert_type'] != ''){
        $hw_type = $_POST['insert_type'];
    }


    if(isset($_POST['insert_desc']) && $_POST['insert_desc'] != ''){
        $hw_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));
    }

    //Checks if the application is being Advertised
    if(isset($_POST['hw_advertise']) && $_POST['hw_advertise'] != ''){
        $hw_advertise = $_POST['hw_advertise'];
    }
    else
    {
        $hw_advertise = 0;
    }



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
        $query = "INSERT INTO lms_hw (hw_mfg,hw_type,hw_img,hw_name,hw_desc,
                                        hw_whencreated,hw_whenmodified,hw_advertise)
                        VALUES ('$hw_mfg','$hw_type','$upload_file_name','$hw_name',
                                    '$hw_desc',NOW(),NOW(),$hw_advertise)";
        // echo $query;die();
        if ($mysqli->query($query)) {
            $hwid = $mysqli->insert_id;
            header('Location: .?view=hw_details&hw_id='.$hwid);
        } else {
            $error = 'Unable to Update Database';
            header('Location: .?view=admin_hw_list&type=All&submit_error='.urlencode($error));
        }
    }
    else{
        $query = "INSERT INTO lms_hw (hw_mfg,hw_type,hw_img,hw_name,hw_desc,
                                        hw_whencreated,hw_whenmodified,hw_advertise)
                        VALUES ('$hw_mfg','$hw_type','','$hw_name',
                                    '$hw_desc',NOW(),NOW(),$hw_advertise)";;
        // echo $query;die();
        if ($mysqli->query($query)) {
            /*Closes the current window*/
            $hwid = $mysqli->insert_id;
            header('Location: .?view=hw_details&hw_id='.$hwid);
        } else {
            $error = 'Unable to Update Database';
            header('Location: .?view=admin_hw_list&type=All&submit_error='.urlencode($error));

        }
    }
}

