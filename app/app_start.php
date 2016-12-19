<?php
echo '<html>';
if($debug_mode == TRUE){
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

}
//Pre page build section
//Connect to the database via the database configuration
include $PATH['CONFIG'].'database.php';
//connects to the LDAP database
include $PATH['CONFIG'].'ldap_conf.php';
//Loads PHP and JS functions
include $PATH['HELPERS'].'functions.php';

//======================================================
//						Secure Session Creation
//======================================================
//loads the secure session constant
include $PATH['INC'].'psl-config.php';
//Starts a session if one has not be started yet
if(!isset($_SESSION)){
	sec_session_start();
	// $_SESSION['page_limit'] = $default_page_limit;

	
	//timeout session if enabled in config file
	if ($session_timeout == TRUE) {

		$inactive = $timeout_after;

		if( !isset($_SESSION['timeout']) ){
			$_SESSION['timeout'] = time() + $inactive; 
		}
		$session_life = time() - $_SESSION['timeout']; 

		if($session_life > $inactive) {
		   session_destroy(); 
		   header("Location: " . $timeout_redirect);
		}
		$_SESSION['timeout']=time();
	}



	// print_r(sec_session_start());die();
}
include $PATH['HELPERS']."post_session_load_functions.php";
//======================================================

require_once $PATH['HELPERS'].'paginator.class.php';

if(isset($_GET['view'])){$view=$_GET['view'];} else {$view='login';}
//includes the document head section
include $PATH['BLOCKS'].'block.head.php';

//Select the correct framework bast on the $_GET call
if(isset($_GET['method']) && $_GET['method'] != '')
{
	//if $_GET call is 'method' it loads the action framework
	include $PATH['APP'].'framework/action_framework.php';
}
elseif(isset($_GET['frame']) && $_GET['frame'] != '')
{
	//if $_GET call is 'frame' it loads the popup framework

	include $PATH['APP'].'framework/popup_framework.php';
	
}
else
{
	//if no $_GET call is made or if it is 'view' loads
	//the main framework

		include $PATH['APP'].'framework/framework.php';

}

// echo "<script src='".$PATH['JS']."jquery.flip.js' ></script>"; <-- no longer used
echo '<script src="'.$PATH['JS'].'lib/tinymce/tinymce.min.js"></script>';
echo "<script src='".$PATH['JS']."lib/bootstrap.min.js' ></script>";
echo "<script src='".$PATH['JS']."pagination.js' ></script>";
// echo "<script src='".$PATH['JS']."gradient.js' ></script>";  //Unmark to turn gradient on (keeping marked out to test performance)
echo "
  <script type='text/javascript'>
  tinymce.init({
  	".$tinyMCE_settings."
  });
	// interval is in milliseconds. 1000 = 1 second - so 1000 * 10 = 10 seconds
	  $('.carousel').carousel({
	    interval: 1000 * ".$rotate_carousel.",
	    wrap: true
	  });
  </script>

  ";
echo '</html>';
