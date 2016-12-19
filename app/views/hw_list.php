<?php 
if (!isset($query_type)){$query_type = 'query_advertised_hw.php';} //sets default view as advertised software only
include $PATH['INC'].'query_hw_type.php';
include $PATH['INC'].$query_type;
if(isset($_GET['hw_type'])){$header_type = urldecode($_GET['hw_type']);}else{$header_type='';}
?>

<div class='container transparent-container'>
	<div class='display-type text-white'>
		<p><?=$header_type; ?></p>
	</div>
		<!-- loads the common detail code block for back & admin/user view bar -->
		<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

		<!-- loads the tile formatting for display -->
		<?php 
			$query_results = $hw_results;
			$results_prefix = 'hw';
			$no_image_icon = FALSE;  //set to false have each hw type have unique icon
			include $PATH['BLOCKS'].'block.tileDisplay.php';
		?>

</div>