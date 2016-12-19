<?php
//Get details of currently tapped beers and total
$query = "SELECT * FROM lms_mfg WHERE mfg_id =".$mfg_id;
//echo $query;die();
$current_mfg = $mysqli->query($query);
$mfg_info = $current_mfg->fetch_assoc();

