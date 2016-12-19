<?php
if(login_check() >= 999){

    $hw_specs = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['insert_specs']));  

    $query = "UPDATE lms_hw
                SET hw_specs = '$hw_specs',
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
