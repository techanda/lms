<?php
if(login_check() >= 999){
    $sw_name = $_POST['insert_name'];
    $sw_mfg = $_POST['insert_mfg'];
    $sw_type = $_POST['insert_type'];

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
    //Checks if the application is being Advertised
    if(isset($_POST['sw_advertise']) && $_POST['sw_advertise'] != ''){
        $sw_advertise = $_POST['sw_advertise'];
    }
    else
    {
        $sw_advertise = 0;
    }
    //Checks if application works in Linux
    if(isset($_POST['os_linux']) && $_POST['os_linux'] != ''){
        $sw_os_linux = $_POST['os_linux'];
    }
    else
    {
        $sw_os_linux = 0;
    }

    $sw_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));


    $query = "UPDATE lms_sw
                SET sw_mfg = '$sw_mfg',
                    sw_os_windows = '$sw_os_windows',
                    sw_os_osx = '$sw_os_osx',
                    sw_os_linux = '$sw_os_linux',
                    sw_type = '$sw_type',
                    sw_name = '$sw_name',
                    sw_desc = '$sw_desc',
                    sw_advertise = '$sw_advertise',
                    sw_whenmodified = NOW() 
            WHERE   sw_id = ".$_POST['software_id'];
    // echo $query;die();
    if ($mysqli->query($query)) {
        header('Location: .?view=admin_sw_details&swid='.$_POST['software_id']);
     } else {
        $error = 'Unable to Update Database';
        header('Location: .?view=admin_sw_details&swid='.$_POST['software_id'].'&submit_error='.urlencode($error));
     }
}
?>
