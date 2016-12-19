<?php
if(login_check() >= 999){

    //Checks for a name being entered
    if(isset($_POST['insert_name']) && $_POST['insert_name'] != ''){
        $sw_name = $_POST['insert_name'];
    }

    //Checks for a manufacturer being selected
    if(isset($_POST['insert_mfg']) && $_POST['insert_mfg'] != ''){
        $sw_mfg = $_POST['insert_mfg'];
    }


    //checks for a type being selected
    if(isset($_POST['insert_type']) && $_POST['insert_type'] != ''){
        $sw_type = $_POST['insert_type'];
    }



    //Checks if application works in windows
    if(isset($_POST['os_windows']) && $_POST['os_windows'] != ''){
        $sw_os_windows = $_POST['os_windows'];
    }
    else
    {
        $sw_os_windows = 0;
    }

    //Checks if application works in OS X
    if(isset($_POST['os_osx']) && $_POST['os_osx'] != ''){
        $sw_os_osx = $_POST['os_osx'];
    }
    else
    {
        $sw_os_osx = 0;
    }

    //Checks if application works in Linux
    if(isset($_POST['os_linux']) && $_POST['os_linux'] != ''){
        $sw_os_linux = $_POST['os_linux'];
    }
    else
    {
        $sw_os_linux = 0;
    }
    if(isset($_POST['insert_desc']) && $_POST['insert_desc'] != ''){
        $sw_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));
    }

    //Checks if the application is being Advertised
    if(isset($_POST['sw_advertise']) && $_POST['sw_advertise'] != ''){
        $sw_advertise = $_POST['sw_advertise'];
    }
    else
    {
        $sw_advertise = 0;
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
        $query = "INSERT INTO lms_sw (sw_mfg,sw_os_windows,sw_os_osx,sw_os_linux,
                                    sw_type,sw_logo,sw_name,sw_desc,sw_whencreated,
                                    sw_whenmodified,sw_advertise)
                        VALUES ('$sw_mfg','$sw_os_windows','$sw_os_osx','$sw_os_linux',
                                    '$sw_type','$upload_file_name','$sw_name','$sw_desc',NOW(),NOW(),$sw_advertise)";
        // echo $query;die();
        if ($mysqli->query($query)) {
            $swid = $mysqli->insert_id;
            header('Location: .?view=admin_sw_details&swid='.$swid);
        } else {
            $error = 'Unable to Update Database';
            header('Location: .?view=admin_sw_list&type=All&submit_error='.urlencode($error));
        }
    }
    else{
        $query = "INSERT INTO lms_sw (sw_mfg,sw_os_windows,sw_os_osx,sw_os_linux,
                                    sw_type,sw_logo,sw_name,sw_desc,sw_whencreated,
                                    sw_whenmodified,sw_advertise)
                        VALUES ('$sw_mfg','$sw_os_windows','$sw_os_osx','$sw_os_linux',
                                    '$sw_type','','$sw_name','$sw_desc',NOW(),NOW(),$sw_advertise)";
        // echo $query;die();
        if ($mysqli->query($query)) {
            /*Closes the current window*/
            $swid = $mysqli->insert_id;
            header('Location: .?view=admin_sw_details&swid='.$swid);
        } else {
            $error = 'Unable to Update Database';
            header('Location: .?view=admin_sw_list&type=All&submit_error='.urlencode($error));

        }
    }
}

