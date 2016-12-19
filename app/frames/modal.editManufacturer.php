<?php include $PATH['INC'].'query_lms_product_types.php'; ?>
<div id="editManufacturer" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-gold'>
        Update Manufacturer Info
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
        <form id='add_mfg' name='add_mfg' method='post' action='action.php?method=edit_manufacturer'
          enctype="multipart/form-data">

          <input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
          <input type='hidden' name='mfg_id' value=<?=$mfg_id; ?>>
          <div class='row'>
          <div class='form-group col-sm-6'>
            <label class='control-label' for='insert_name'>Name:</label>
            <input class='form-control' type='text' name='insert_name' placeholder='Enter Manufacturer Name' required value=<?="'".$mfg_info['mfg_name']."'" ?>>
          </div>

          <!-- Manufacturer Type -->
          <div class='form-group col-sm-6'>
            <label for='mfg_type'>Product Type: </label>
            <select id='mfg_type' class='form-control' name='insert_type' required>
              <?php while ($row = $product_types->fetch_assoc()): ?>
                <?php if($row['button_id'] != 1): ?>
                  <option <?php if($mfg_info['mfg_type'] == $row['button_id']){echo " selected ";} ?>
                    value=<?php echo $row['button_id']; ?>><?php echo $row['name']; ?></option>
                <?php endif; ?>
              <?php endwhile; ?>
            </select>
          </div>    
          <!-- Manufacturer Type -->
          </div>
          <div class='form-group'>
              <label>Description:</label>
              <textarea style='height:360px;' class='form-control tinymce-textarea' rows='10' placeholder='Place Description Here...' name='insert_desc'><?php if (isset($mfg_info['mfg_desc']) && $mfg_info['mfg_desc'] != '' ) {echo $mfg_info['mfg_desc'];}?></textarea>
          </div>

          <input class='btn btn-default' type='submit' value='Update' name='submit'>
          <input class='btn btn-default' type='button' value='Cancel' data-dismiss='modal'/>

       </form>
     </div>
    </div>
  </div>
</div>



    


