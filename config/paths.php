<?php

/*	=================================================================================
	This is the configuration file for all of the paths that work in this application
	Do not modify this unless you know what you are doing!
*/
if($domain_name == 'localhost'){
	define('__ROOT__' , './');
}
else
{
	define('__ROOT__' , dirname(pathinfo(__FILE__, PATHINFO_DIRNAME)));
}

$PATH = array(
	'CONFIG' 		=> __ROOT__.'/config/',
	'CSS' 			=> __ROOT__.'/css/',
	'IMG' 			=> __ROOT__.'/img/',
	'APP' 			=> __ROOT__.'/app/',
	'INC' 			=> __ROOT__.'/includes/',
	'JS' 				=> __ROOT__.'/js/',
	'UPLOADS' 	=> __ROOT__.'/uploads/',
	'VIEWS' 		=> __ROOT__.'/app/views/',
	'BIN' 			=> __ROOT__.'/bin/',
	'FRAMES' 		=> __ROOT__.'/app/frames/',
	'BLOCKS' 		=> __ROOT__.'/app/blocks/',
	'HELPERS'		=> __ROOT__.'/helpers/',
	'MAILERS'		=> __ROOT__.'/app/mailers/',
	'FONTS'			=> __ROOT__.'/fonts/'
 );
