<?php
//Get details of currently tapped beers and total
$query = "SELECT *
					FROM lms_manage ORDER BY manage_name";
$manage = $mysqli->query($query);
$total_manage= $type->num_rows;