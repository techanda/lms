<!--This is the window used for adding a new license -->
<div id="newBusinessUnit" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-gold'>
        Add a New Business Unit
        <div class='text-right'><a class='text-grey upper-cancel' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
        <form name='new_bu' method='post' action='action.php?method=add_new_bu'
            enctype="multipart/form-data">
            <input type="hidden" name="folder_path" value="bu_img"> <!-- used to set folder to upload to -->
            <input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
            <div class='form-group'>
              <label>Name:</label>
              <input class='form-control' type='text' name='insert_name' placeholder='Enter Business Unit Name' required/>
            </div>

            <div class='row'>
              <div class='col-sm-8'>
                <!-- Upload Image -->
                <?php formImageUpload('newManufacturer',FALSE); ?>
                <!-- Upload Image -->
              </div>
            </div>

            <div class='form-group'>
                <label>Description:</label>
                <textarea class='form-control tinymce-textarea' style='height:260px;' placeholder='Place Description Here...' name='insert_desc'></textarea>
            </div>


            <input class='btn btn-default' type='submit' value='Add Business Unit' name='submit'>
            <input class='btn btn-default cancel-button' type='button' value='Cancel' data-dismiss="modal" />

         </form>
       </div>
    </div>
  </div>
</div>








    


