<?php
/*
==================================================================================
									Functions
==================================================================================
*/

/*
					These functions are used for URL manipulation
----------------------------------------------------------------------------------
*/
//This function removes the $key variable from the url within the $url variable
// function remove_querystring_var($url, $key) {
// 		// echo "<div class='row'><div class='col-xs-12'>";
// 		// echo "<span class='text-pink'>===Begin Function===</span><br>";
// 		// echo "<span class='text-pink'>Remove Var = ".$key."</span><br>";
// 		$url_parts = parse_url($url);
// 		// echo "<span class='<span class='text-pink'><pre>";
// 		// print_r($url_parts);
// 		// echo '</pre></span>';
// 		if(empty($url_parts['query'])) return $url;
// 		parse_str($url_parts['query'], $result_array);
// 		unset($result_array[$key]);
// 		$url_parts['query'] = http_build_query($result_array);
// 		// echo "<span class='text-pink'>QUERY URL = ".$url_parts['query']."</span><br>";
// 		$url = (isset($url_parts["scheme"])?$url_parts["scheme"]."://":"").
// 			(isset($url_parts["user"])?$url_parts["user"].":":"").
// 			(isset($url_parts["pass"])?$url_parts["pass"]."@":"").
// 			(isset($url_parts["host"])?$url_parts["host"]:"").
// 			(isset($url_parts["port"])?":".$url_parts["port"]:"").
// 			(isset($url_parts["path"])?$url_parts["path"]:"").
// 			(isset($url_parts["query"])?"?".$url_parts["query"]:"").
// 			(isset($url_parts["fragment"])?"#".$url_parts["fragment"]:"");
// 			// echo "<span class='text-pink'>OUT URL = ".$url."</span><br>";
// 			// echo "</div></div>";
// 		return "?".$url_parts['query'];
// }
function remove_querystring_var($url, $key) { 
	$url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&'); 
	$url = substr($url, 0, -1); 
	return $url; 
}
//This function will remove the current 'sort' from the URL and/or toggle from asc to desc sort
//This function requires the remove_querystring_var() functions to work
function toggle_sort($sort_on){
	$updated_sort_url = remove_querystring_var($_SERVER['REQUEST_URI'], "sort");
	if(!isset($_GET['asc']) || $_GET['asc'] !='true' || $_GET['sort'] != $sort_on){
		$updated_sort_url = remove_querystring_var($updated_sort_url, "asc");
		$asc = '&asc=true';
	}
	elseif(isset($_GET['asc']) && $_GET['asc'] =='true')
	{
		$updated_sort_url = remove_querystring_var($updated_sort_url, "asc");
		$asc = '';
	}
	$output_sort_url = $updated_sort_url.'&sort='.urlencode($sort_on).$asc;
	return $output_sort_url;
}

/*
					These functions are used for filter bar
----------------------------------------------------------------------------------
*/
function create_filter_button($key){
	if(isset($_GET[$key]))
	{

		if($key == 'sort'){
			if($_GET['sort'] == 'type_name'){$filter_name = 'Type';}
			if($_GET['sort'] == 'os_name'){$filter_name = 'Operating System';}
			if($_GET['sort'] == 'sw_name'){$filter_name = 'Application';}
			if($_GET['sort'] == 'mfg_name'){$filter_name = 'Manufacturer';}
			if($_GET['sort'] == 'total_license'){$filter_name = 'Total Licenses';}
			if($_GET['sort'] == 'assigned_license'){$filter_name = 'Assigned Licenses';}
			if($_GET['sort'] == 'available_license'){$filter_name = 'Available Licenses';}
			$removed_asc = remove_querystring_var($_SERVER['REQUEST_URI'],'asc');
			$updated_url = remove_querystring_var($removed_asc,$key);
		}
		else
		{
			$filter_name = $_GET[$key];
			$updated_url = remove_querystring_var($_SERVER['REQUEST_URI'],$key);
		}

		echo "<div class='class_filter_button'>";
		echo		'<a href="'.$updated_url.'" class="remove_filter" >X</a>';


		echo strtoupper($key).': <b>'.$filter_name.'</b>';
		echo '</div>';
	}
}

/*
									Misc Functions
----------------------------------------------------------------------------------
*/

//Builds the form function to upload image with error checking and clearing on cancel (unique_id must be form id)
function formImageUpload($unique_id,$current_img=FALSE,$format='default',$modalPath='app/frames/'){
	switch ($format) {
		case 'stacked':
			$row_style = 'row';
			$column_style = 'col-xs-12';
			break;
		case 'default':
			$row_style = 'row row-eq-height';
			$column_style = 'col-sm-6';
			break;
	}
	//checks if there is a current image and sets form accordingly
	if (isset($current_img) && $current_img != '' && $current_img != FALSE) {
		$img_state = 
			"
				<i class='fa fa-picture-o'></i>
				  <img id='".$unique_id."-image'  class='img-responsive img-rounded' src='".$current_img."'>
				  <script type='text/javascript'>$('#".$unique_id."-upload-image i').hide();</script>
			";
		$restore_state = 
		"
		$('#".$unique_id."-image').fadeIn('fast').attr('src',origIMG);
		";
	} else {
		$img_state = 
			"
				<i class='fa fa-picture-o'></i>
				  <img id='".$unique_id."-image'  class='img-responsive img-rounded' src=''>
			";
		$restore_state =
		"
			$('#".$unique_id."-image').hide();
		";
	}

	//created the viewable form section
	echo "
				<div class='container-fluid'>
				<div class='".$row_style."'>
				<div id='".$unique_id."-upload-image' class='".$column_style." upload-image'>".
			  	$img_state
			  ."</div>
			  <div class='".$column_style."'>
			    <div class='form-group'>
			      <div class='fileUpload btn btn-default btn-sm'>
			        <span>Select an Image</span>
			        <input class='upload' type='file' name='fileToUpload' id='".$unique_id."-file_to_upload'>
			      </div>
			      <p class='help-block'>Please select an Image to Upload <br>
			      <small><em>(Must be less than 1MB)</em></small></p>
			    </div>
			  </div>
	    </div>
	    </div>";

	//Form validation and behavior
	echo "
	<script type='text/javascript'>
	  
	  $('#".$unique_id."-file_to_upload').change( function(event) {
	    var origIMG = $('#".$unique_id."-image').attr('src');
	    var val = $(this).val();
	    //Checks for correct file extension
	    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
	      case 'gif': case 'jpg': case 'jpeg': case 'png': 
	          $('#".$unique_id."-image-type').text('Image to Upload');
	          $('#".$unique_id."-upload-image i').hide();
	          $('#".$unique_id."-image').fadeIn('fast').attr('src',URL.createObjectURL(event.target.files[0]));
	          break;
	      default:
	          $(this).val('');
	          $('#".$unique_id."-image-type').text('');
	          $('#error-message').text('Invalid file type.  Image must be a gif, jpg, jpeg, or png file.');
	          $('#submitError').modal('show');
	          if(origIMG !== ''){
	          	$('#".$unique_id."-image').fadeIn('fast').attr('src',origIMG);
	          } else {
	          	$('#".$unique_id."-image').attr('src','');
	          };
	          break;
	     }

	    //checks for correct file size
	    if (Number(this.files[0].size) >= 1048576) {
	      $(this).val('');
	      $('#".$unique_id."-image-type').text('');
	      $('#error-message').text('Invalid file size. Image must be less than 1MB.')
    	  $('#submitError').modal('show');
    	 	if(origIMG !== ''){
        	$('#".$unique_id."-image').fadeIn('fast').attr('src',origIMG);
        } else {
        	$('#".$unique_id."-image').attr('src','');
        	$('#".$unique_id."-upload-image i').show();
        };
	    };

	    // Resets the form on cancel
	    $('#".$unique_id." .cancel-button').click(function(){
	      $('#".$unique_id."-upload-image i').show();
	      $('#".$unique_id."-file_to_upload').val('');
	      $('#".$unique_id."-image-type').text('');
	      ".
	      	$restore_state
	      ."
	      $('#".$unique_id."-image').attr('src','');
	    });
	    $('#".$unique_id." .upper-cancel').click(function(){
	      $('#".$unique_id."-upload-image i').show();
	      $('#".$unique_id."-file_to_upload').val('');
	      $('#".$unique_id."-image-type').text('');
	      ".
	      	$restore_state
	      ."
	      $('#".$unique_id."-image').attr('src','');
	    });
	  });
	</script>
	";
}

//This function queries information from AD by samaccountname
function query_ldap_samaccount($ldap_connection,$ldap_username,$ldap_password,$search_samaccount){
	if (TRUE == ldap_bind($ldap_connection, $ldap_username, $ldap_password)){
	    $ldap_base_dn = 'DC=search,DC=iac,DC=corp';
	    $search_filter = '(&(objectCategory=person)(samaccountname='.$search_samaccount.'))';
	    $attributes = array();
	    $attributes[] = 'givenname';
	    $attributes[] = 'mail';
	    $attributes[] = 'samaccountname';
	    $attributes[] = 'sn';
	    $attributes[] = 'title';
	    $attributes[] = 'department';
	    $attributes[] = 'company';

	    $result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter, $attributes);
	    if (FALSE != $result){
	        $entries = ldap_get_entries($ldap_connection, $result);
	        for ($x=0; $x<$entries['count']; $x++){
	            if (!empty($entries[$x]['givenname'][0]) &&
	                 !empty($entries[$x]['mail'][0]) &&
	                 !empty($entries[$x]['samaccountname'][0]) &&
	                 !empty($entries[$x]['sn'][0]) &&
	                 'Shop' != $entries[$x]['sn'][0] &&
	                 'Account' != $entries[$x]['sn'][0]){
	                $ad_users[strtoupper(trim($entries[$x][ 'samaccountname'][0]))] = array('email' => strtolower(trim($entries[$x]['mail'][0])),
	                                                        'first_name' => trim($entries[$x]['givenname'][0]),
	                                                        'title' => trim($entries[$x]['title'][0]),
	                                                        'department' => trim($entries[$x]['department'][0]),
	                                                        'company' => trim($entries[$x]['company'][0]),
	                                                        'last_name' => trim($entries[$x]['sn'][0]));
	            }
	        }
	    }
	    ldap_unbind($ldap_connection); // Clean up after ourselves.
	}
	if(isset($ad_users) && $ad_users != '')
	{
		return $ad_users;
	}
	else
	{
		return NULL;
	}
}

//this function limits the string length input into it
function limit_str($string, $length){
	if(strlen($string)<=$length){
		return $string;
	} else {
		$lim_string = substr($string,0,$length) . '...';
		return $lim_string;
	}
}

//This function created the pageination links for the search output
function CreateSearchLinks($page,$limit,$total_records,$list_class){
	//echo "total_records: ".$total_records."<br>";
	$num_pages = ceil($total_records / $limit);
	//echo "num_pages: ".$num_pages."<br>";
	if ( $limit == 'all' ) {
		return '';
	}
    $search_string = $_GET['search_string'];
    $url = 'view=search&search_string='.$search_string;

	$last       = ceil( $total_records / $limit );
	//echo "last: ".$last."<br>";
	$start      = ( ( $page - $num_pages ) > 0 ) ? $page - $num_pages : 1;
	$end        = ( ( $page + $num_pages ) < $last ) ? $page + $num_pages : $last;
	//echo "start: ".$start."<br>";
	//echo "end: ".$end."<br>";die();
	$html       = '<ul class="' . $list_class . '">';

	$class      = ( $page == 1 ) ? "disabled" : "";
	$html       .= '<li class="' . $class . '"><a href="?'.$url."&limit=" . $limit . '&page=' . ( $page - 1 ) . '">&laquo;</a></li>';

	if ( $start > 1 ) {
		$html   .= '<li><a href="?'.$url  . $limit . '&page=1">1</a></li>';
		$html   .= '<li class="disabled"><span>...</span></li>';
	}

	for ( $i = $start ; $i <= $end; $i++ ) {
		$class  = ( $page == $i ) ? "active" : "";
		$html   .= '<li class="' . $class . '"><a href="?'.$url."&limit=" . $limit . '&page=' . $i . '">' . $i . '</a></li>';
	}

	if ( $end < $last ) {
		$html   .= '<li class="disabled"><span>...</span></li>';
		$html   .= '<li><a href="?'.$url."&limit=" . $limit . '&page=' . $last . '">' . $last . '</a></li>';
	}

	$class      = ( $page == $last ) ? "disabled" : "";
	$html       .= '<li class="' . $class . '"><a href="?'.$url."&limit=" . $limit . '&page=' . ( $page + 1 ) . '">&raquo;</a></li>';

	$html       .= '</ul>';

	return $html;

}

//This creates a secure session
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}

