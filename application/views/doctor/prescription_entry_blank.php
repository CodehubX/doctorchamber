<?php if ($selector == 'medicine'): ?>
  <div class="form-group">
    <div class="row">
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="<?php echo get_phrase('medicine_name');?>"
          name="medicine_name[]">
      </div>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="<?php echo get_phrase('notes');?>"
          name="medicine_note[]">
      </div>
      <div class="col-md-2">
        <button type="button" class="btn-sm fcbtn btn btn-outline btn-danger btn-1d"
          data-toggle="tooltip" data-placement="right" title="<?php echo get_phrase('remove');?>"
          onclick="delele_parent_element(this, 'medicine')">
          <i class="fa fa-times"></i>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($selector == 'test'): ?>
  <div class="form-group">
    <div class="row">
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="<?php echo get_phrase('test_name');?>"
          name="test_name[]">
      </div>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="<?php echo get_phrase('notes');?>"
          name="test_note[]">
      </div>
      <div class="col-md-2">
        <button type="button" class="btn-sm fcbtn btn btn-outline btn-danger btn-1d"
          data-toggle="tooltip" data-placement="right" title="<?php echo get_phrase('remove');?>"
          onclick="delele_parent_element(this, 'test')">
          <i class="fa fa-times"></i>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>
