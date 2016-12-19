<?php
if(login_check() >= 999){

    $hw_name = $_POST['insert_name'];
    $hw_mfg = $_POST['insert_mfg'];
    $hw_type = $_POST['insert_type'];
    $hw_desc = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_desc']));

    //Checks if the application is being Advertised
    if(isset($_POST['hw_advertise']) && $_POST['hw_advertise'] != ''){
        $hw_advertise = $_POST['hw_advertise'];
    }
    else
    {
        $hw_advertise = 0;
    }

    $query = "UPDATE lms_hw
                SET hw_mfg = '$hw_mfg',
                    hw_type = '$hw_type',
                    hw_name = '$hw_name',
                    hw_desc = '$hw_desc',
                    hw_advertise = '$hw_advertise',
                    hw_whenmodified = NOW() 
            WHERE   hw_id = ".$_POST['hw_id'];
    // echo $query;die();
    if ($mysqli->query($query)) {
        header('Location: .?view=hw_details&hw_id='.$_POST['hw_id']);
     } else {
        $error = 'Unable to Update Database';
        header('Location: .?view=hw_details&hw_id='.$_POST['hw_id'].'&submit_error='.urlencode($error));
     }
}
?>
