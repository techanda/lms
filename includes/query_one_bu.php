<?php
//Get details of currently tapped beers and total
$query = "SELECT * FROM lms_bu WHERE bu_id =".$bu_id;
//echo $query;die();
$current_bu = $mysqli->query($query);
$bu_info = $current_bu->fetch_assoc();

