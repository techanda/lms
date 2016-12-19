<?php 
//This section contains the includes necessary for view
include $PATH['INC'].'query_advertised_software.php';
include $PATH['INC'].'query_type.php';
include $PATH['INC'].'query_mfg.php';
if(isset($_GET['type'])){$header_type = urldecode($_GET['type']);}else{$header_type='';}
?>

<div class='container transparent-container'>
			<div class='display-type text-white'>
				<p><?=$header_type; ?></p>
			</div>


	<!-- loads the common detail code block for back & admin/user view bar -->
	<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

	<!-- loads software tiles -->
	<?php 
		$query_results = $results;
		$results_prefix = 'sw';
		include $PATH['BLOCKS'].'block.softwareTileDisplay.php'; 
	?>


</div>