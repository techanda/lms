<div id="editBusinessUnit" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-gold'>
        Update Business Unit Info
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
        <form id='add_bu' name='add_bu' method='post' action='action.php?method=edit_bu'
          enctype="multipart/form-data">

          <input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
          <input type='hidden' name='bu_id' value=<?=$bu_id; ?>>
          <div class='form-group'>
            <label class='control-label' for='insert_name'>Name:</label>
            <input class='form-control' type='text' name='insert_name' placeholder='Enter Business Unit Name' required value=<?= "'".$bu_info['bu_name']."'" ?>>
          </div>

          <div class='form-group'>
              <label>Description:</label>
              <textarea class='form-control tinymce-textarea' style='height:360px;' placeholder='Place Description Here...' name='insert_desc'><?php if (isset($bu_info['bu_desc']) && $bu_info['bu_desc'] != '' ) {echo $bu_info['bu_desc'];}?></textarea>
          </div>

          <input class='btn btn-default' type='submit' value='Update' name='submit'>
          <input class='btn btn-default' type='button' value='Cancel' data-dismiss='modal'/>

       </form>
     </div>
    </div>
  </div>
</div>



    


