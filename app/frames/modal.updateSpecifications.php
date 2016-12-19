<div id="updateSpecifications" class="modal fade" role="dialog">
  <div class='modal-dialog modal-md'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-gold'>
        Update Specifications
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
        <form id='add_mfg' name='add_mfg' method='post' action='action.php?method=update_hw_specifications'
          enctype="multipart/form-data">

          <input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
          <input type='hidden' name='hw_id' value=<?=$hw_id; ?>>

          <div class='form-group'>
              <label>Specifications:</label>
              <textarea class='form-control tinymce-textarea' style='height:500px;' name='insert_specs'><?= $hw_info['hw_specs']; ?></textarea>
          </div>

          <input class='btn btn-default' type='submit' value='Update' name='submit'>
          <input class='btn btn-default' type='button' value='Cancel' data-dismiss='modal'/>

       </form>
     </div>
    </div>
  </div>
</div>



    


