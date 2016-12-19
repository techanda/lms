<?php

		$limit      = ( isset( $_GET['limit'] 	) ) ? $_GET[	'limit'	] : 24;
		$page       = ( isset( $_GET['page'] 	) ) ? $_GET[	'page'	] : 1;
		$links      = ( isset( $_GET['links'] 	) ) ? $_GET[	'links'	] : 7;
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_bu";

		$Paginator  = new Paginator( $mysqli, $query );
		$bu_results    = $Paginator->getData( $page, $limit );

		$bus = $mysqli->query($query);
		$bu_total= $bus->num_rows;
