<?php
if(!isset($_SESSION)){
	session_start();
} 

require_once $PATH['HELPERS'].'Paginator.class.php';
if(isset($_GET['type'])){$type = urldecode($_GET['type']);}else{$type=0;}
if(isset($_GET['mfg'])){$mfg = urldecode($_GET['mfg']);}else{$mfg=0;}
if(isset($_GET['os'])){$os_check = urldecode($_GET['os']);}else{$os_check=0;}
if(isset($_GET['sort'])){$sort = urldecode($_GET['sort']);}else{$sort=0;}
if(isset($_GET['asc'] ) && $_GET['asc'] == 'true'){
	$asc = ' ASC';
}
else
{
	$asc=' DESC';
}




//This section builds the filter uses for filtering and sorting the results
$filter = '';
if($type!='0' || $mfg!='0' || $os_check!='0' || $sort!='0'){
	if($type != '0'){
		$filter .= " AND type_name ='".$type."' ";
	}
	if($mfg != '0'){
		$filter .= " AND mfg_name ='".$mfg."' ";
	}

	if($os_check != '0')
	{	include $__INC__.'query_os.php';
		while ($row = $os->fetch_assoc())
		{	if($row['os_name'] == $os_check)
			{
				$filter .= " AND ".$row['os_key']."= 1";
			}
		}

	}
	if($sort != '0'){
		$filter .= " ORDER BY ".$sort.$asc;
	}
}
/*
echo '<br>class='.$type;
echo '<br>mfg='.$mfg;
echo '<br>os='.$os;
echo '<br>sort='.$sort;
echo '<br>'.$filter;
die();*/

	//Get details of currently tapped beers and total
		if($filter == '')
			{
				$query = "SELECT 	sw_id,sw_mfg,mfg_name,sw_os_windows,sw_os_osx,
									sw_os_linux,sw_type,
									type_name,sw_name,sw_desc,mfg_logo
							FROM lms_sw
							LEFT JOIN lms_mfg
							ON (lms_sw.sw_mfg = lms_mfg.mfg_id)
							LEFT JOIN lms_type
							ON (lms_sw.sw_type = lms_type.type_id)
							
							ORDER BY sw_type,sw_mfg,sw_id";
		}
		else
		{
				$query = "SELECT 	sw_id,sw_mfg,mfg_name,sw_os_windows,sw_os_osx,
									sw_os_linux,sw_type,
									type_name,sw_name,sw_desc,mfg_logo
							FROM lms_sw
							LEFT JOIN lms_mfg
							ON (lms_sw.sw_mfg = lms_mfg.mfg_id)
							LEFT JOIN lms_type
							ON (lms_sw.sw_type = lms_type.type_id)
							WHERE sw_mfg != 0".$filter;
		}

		//echo $query;die();
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
 
    $Paginator  = new Paginator( $mysqli, $query );

 
    $results    = $Paginator->getData( $page, $limit );


		$all_software = $mysqli->query($query);
		$total_software = $all_software->num_rows;
