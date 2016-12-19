<?php
$mfg_id = $_GET['mfg_id'];
// echo $software_id;die();
include $PATH['INC'].'query_one_mfg.php';
?>

<div id="updateMfgImage" class="modal fade" role="dialog">
  <div class='modal-dialog modal-md'>
  	<div class='detail-software-backdrop drop-shadow-big border-gold'>
			<div class='modal-bar bg-gold'>
        Update This Manufacturer's Image
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i id='exit-icon' class="fa fa-times-circle"></i></a></div>
    	</div>
   	 	<div class='modal-container'>
	  		<center><h3 id='image-type'>Current Image:</h3></center>
				<br>
		
				<div class='col-xs-12'>
					<br>
					<br>
				</div>
				<form action='.?method=update_mfg_image' method='post' enctype="multipart/form-data">
					<!-- Upload Image -->
					<div class='form-group'>
				    <input type="hidden" name="folder_path" value="mfg_logo"> <!-- used to set folder to upload to -->
				    <input type="hidden" name="image_type" value="1">			<!-- used to set the image type 1-brew 2-beer type -->
				    <input type='hidden' name='mfg_id' value=<?=$mfg_id ?>>
				    <input type='hidden' name='delete_file' value=<?=$mfg_info['mfg_logo'] ?>>
				    <input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
				    <center>
				    	<?php 
					    	isset($mfg_info['mfg_logo']) && $mfg_info['mfg_logo'] != '' ? $current_img = $PATH['UPLOADS'].'mfg_logo/'.$mfg_info['mfg_logo'] : $current_img = FALSE;
								formImageUpload('updatebuImage',$current_img,'stacked'); 
							?>
				  	</center>		
					<!-- Upload Image -->
					<br>
					<center>
						<button class='btn btn-default' type='submit' name='submit'>Update</button>
						<?php if (isset($mfg_info['mfg_logo']) && $mfg_info['mfg_logo'] != ''): ?>
							<a class='btn btn-default' data-toggle="modal" data-target="#removeMfgImageConfirm">Remove Image</a>
						<?php endif ?>
						<input id='cancel-button' type='button' class='btn btn-default disable-immune' value='Cancel' data-dismiss='modal' >
					</center>
					<br>
				</form>
			</div>
  	</div>
	</div>
</div><!-- Row -->
</div>

<!-- Modals -->
<?php include $PATH['FRAMES'].'modal.removeMfgImageConfirm.php' ?>
<!-- Modals -->