<?php
/**
 * Created by Joe of ExchangeCore.com
 */
if(isset($_POST['username']) && $_POST['username'] != '' &&
    isset($_POST['password']) && $_POST['password'] != ''){

    $adServer = $ldap_prefix . $ldap_hostname . "." . $ldap_domain ; ;
	
    $ldap = ldap_connect($adServer) or die('Unable to connect to LDAP server with current configuration');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ldaprdn = $username."@".$ldap_domain;
    // echo $ldaprdn;die();

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);

    if ($bind) {
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,$ldap_domain_dn,$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            // echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            // echo '<pre>';
            // var_dump($info);
            // echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 

            // ========================================================================================
            // This is the section that creates the secure session as well as sets session variables
            // ========================================================================================
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $username = preg_replace("/[^a-zA-Z0-9_\-]+/","", $username);
            $_SESSION['given_name'] = $info[$i]["givenname"][0];
            $_SESSION['surname'] = $info[$i]["sn"][0];
            $_SESSION['title'] = $info[$i]["title"][0];
            $_SESSION['email'] = strtolower(trim($info[$i]['mail'][0]));
            $_SESSION['department'] = $info[$i]["department"][0];
            $_SESSION['company'] = $info[$i]["company"][0];
            $_SESSION['username'] = $username;
            $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
            // ========================================================================================



            // Checks AD for User's Group Membership
            $memberof = $info[$i]["memberof"];            
            $admin_priveleges = false;
            for ($i=0; $i < $memberof["count"]; $i++) { 
            	if($memberof[$i] == $ldap_admin_group){
            		$admin_priveleges = true; //Initializes admin access if user is in $ldap_admin_group
                    $_SESSION['admin_priveleges'] = $admin_priveleges;
            	}
            }
        }

        @ldap_close($ldap);

        // ==============================================================================
        //              This section updates the database with login information
        // ==============================================================================

        $query ="INSERT INTO lms_login (login_user,login_browser,login_timestamp)
                VALUES ('$username','$user_browser',NOW())";
        if (!$mysqli->query($query)){
            $query= "INSERT INTO lms_login (login_user,login_browser,login_timestamp)
                VALUES ('UNKNOWN','UNKNOWN',NOW())";
            if (!$mysqli->query($query)){
                $error = 'Unable to track login information';
                header('Location: .?'.remove_querystring_var($_POST['url_redirect'],'submit_error').'&submit_error='.urlencode($error));
            }
        }






        if(isset($_POST['url_redirect'])){
            header('Location: .?'.remove_querystring_var($_POST['url_redirect'],'submit_error'));
            exit();
        } else {
            header('Location: .?view=home');    
        }


    } else {
        $error = 'Please Enter a Valid Domain Account and/or Password.';
        
        if(isset($_POST['url_redirect'])){
            header('Location: .?'.remove_querystring_var($_POST['url_redirect'],'submit_error').'&submit_error='.urlencode($error));
            exit();
        } else {
            header('Location: .?view=login&login_error='.urlencode($error));   
        }
    }
} else {
    $error = 'Please Enter a Valid Domain Account and/or Password.';
    if(isset($_POST['url_redirect'])){
        header('Location: .?'.remove_querystring_var($_POST['url_redirect'],'submit_error').'&submit_error='.urlencode($error));
        exit();
    } else {
        header('Location: .?view=login&login_error='.urlencode($error));   
    }
    return;
}
// echo "admin: ".$_SESSION['admin_priveleges']."<br>";
// echo "First Name: ".$_SESSION['given_name']."<br>";
// echo "Last Name: ".$_SESSION['surname']."<br>";
// echo "Username: ".$_SESSION['username']."<br>";
// echo "Login String: ".$_SESSION['login_string']."<br>";


