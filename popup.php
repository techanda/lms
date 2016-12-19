<?php
//Loads the configuration file
include 'config/config.php';

//loads all of the path variables
include 'config/paths.php';

//begins the bootstrapping process
include $PATH['APP'].'app_start.php';