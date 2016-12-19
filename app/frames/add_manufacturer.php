<?php include $PATH['INC'].'query_lms_product_types.php'; ?>
<div id="newManufacturer" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-gold'>
        Add a New Manufacturer
        <div class='text-right upper-cancel'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
        <form id='add_mfg' name='add_mfg' method='post' action='action.php?method=add_new_mfg'
          enctype="multipart/form-data">

          <input type="hidden" name="folder_path" value="mfg_logo"> <!-- used to set folder to upload to -->
          <input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>

          <div class='form-group'>
            <label class='control-label' for='insert_name'>Name:</label>
            <input class='form-control' type='text' name='insert_name' placeholder='Enter Manufacturer Name' required/>
          </div>

          <div class='row'>
            <div class='col-sm-8'>
              <!-- Upload Image -->
              <?php formImageUpload('newManufacturer',FALSE); ?>
              <!-- Upload Image -->
            </div>
            <div class='col-sm-4'>
              <!-- Manufacturer Type -->
              <div class='form-group'>
                <label for='mfg_type'>Product Type: </label>
                <select id='mfg_type' class='form-control' name='insert_type' required>
                  <?php while ($row = $product_types->fetch_assoc()): ?>
                    <?php if($row['button_id'] != 1): ?>
                      <option value=<?php echo $row['button_id']; ?>><?php echo $row['name']; ?></option>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </select>
              </div>    
              <!-- Manufacturer Type -->
            </div>
          </div>


          <div class='form-group'>
              <label>Description:</label>
              <textarea class='form-control tinymce-textarea' style='height:260px;' name='insert_desc'></textarea>
          </div>


          <input class='btn btn-default' type='submit' value='Add Manufacturer' name='submit'>
          <input class='btn btn-default cancel-button' type='button' value='Cancel' data-dismiss='modal'/>

       </form>
     </div>
    </div>
  </div>
</div>




    


