<?php
//Get details of currently tapped beers and total
$query = "SELECT *
					FROM lms_admin ORDER BY admin_name";
$admin = $mysqli->query($query);
$total_admin= $type->num_rows;