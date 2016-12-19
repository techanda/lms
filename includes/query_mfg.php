<?php
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_mfg ORDER BY mfg_name";

$limit      = ( isset( $_GET['limit'] 	) ) ? $_GET[	'limit'	] : 24;
$page       = ( isset( $_GET['page'] 	) ) ? $_GET[	'page'	] : 1;
$links      = ( isset( $_GET['links'] 	) ) ? $_GET[	'links'	] : 7;

$Paginator  = new Paginator( $mysqli, $query );
$mfg_results    = $Paginator->getData( $page, $limit );

		$mfg = $mysqli->query($query);
		$mfg_total= $mfg->num_rows;
