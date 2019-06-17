<div class="row" id="chamber_inputs">
  <div class="col-lg-12">
    <div class="white-box">
      <form class="" action="<?php echo site_url('doctor/chamber/create');?>" 
        method="post">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label><?php echo get_phrase('name'); ?></label>
              <input type="text" class="form-control" placeholder="<?php echo get_phrase('chamber_name');?>"
                name="name" value="" id="chamberName" required>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label><?php echo get_phrase('address'); ?></label>
              <input type="text" class="form-control" placeholder="<?php echo get_phrase('chamber_address');?>"
                name="address" value="" id="chamberAddress">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label style="color: #fff;">savebutton</label>
              <button type="submit" class="btn btn-success btn-block">
                <?php echo get_phrase('save'); ?>
              </button>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label style="color: #fff;">closebutton</label>
              <button type="button" class="btn btn-default btn-block"
                onclick="hide_inputs()">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="white-box">
      <div class="row">
        <div class="col-md-6">
          <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
          <button type="button" id="add_chamber_button" class="btn btn-info btn-1d">
            <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_chamber'); ?>
          </button>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo get_phrase('name'); ?></th>
              <th><?php echo get_phrase('address'); ?></th>
              <th><?php echo get_phrase('options'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              $chambers = $this->db->get('chamber')->result_array();
              foreach ($chambers as $row):
            ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td>
                <a href="<?php echo site_url('doctor/schedule/' . $row['chamber_id']);?>"
                  class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                  <?php echo get_phrase('manage'); ?>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    $('#chamber_inputs').hide();

    $('#add_chamber_button').click(function() {
      $('#chamber_inputs').show(200);
    })

  });

  function hide_inputs() {
    $('#chamberName').val('');
    $('#chamberAddress').val('');
    $('#chamber_inputs').hide(200);
  }

</script>
