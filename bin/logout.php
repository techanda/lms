<?php
include_once $PATH['HELPERS'].'functions.php';
sec_session_start();
//Sets variable to send back to user's current page if available

// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
// Destroy session 
session_destroy();
?>

<script type="text/javascript">
history.go(-1);
</script>