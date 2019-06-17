<div class="row">
  <div class="col-sm-12">
       <a href="<?php echo site_url('doctor/billing');?>"
        class="btn btn-success">
          <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_invoice_list'); ?></a>
   </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <form action="<?php echo site_url('doctor/billing/create');?>" method="post">
            <div class="row" id="old_patient_input">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo get_phrase('patient'); ?></label>
                  <select class="form-control select2" name="patient_id"  >
                    <option value=""><?php echo get_phrase('select_patient'); ?></option>
                    <?php
                      $result = $patients->result_array();
                      foreach ($result as $row):
                     ?>
                      <option value="<?php echo $row['patient_id'];?>">
                        <?php echo $row['name'] . ' / ' . $row['phone']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label style="color: #fff;">New patient button</label>
                  <button type="button" class="fcbtn btn btn-info btn-outline btn-1d"
                    onclick="show_inputs()">
                    <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('new_patient'); ?>
                  </button>
                </div>
              </div>
            </div>
            <div id="new_patient_data_inputs">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo get_phrase('phone'); ?></label>
                  <input type="text" class="form-control" id="patientPhone" placeholder="<?php echo get_phrase('phone_number');?>"
                    name="phone" value="" maxlength="11">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo get_phrase('name'); ?></label>
                  <input type="text" class="form-control" id="patientName" placeholder="<?php echo get_phrase('patient_name');?>"
                    name="name" value="">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><?php echo get_phrase('invoice_code'); ?></label>
                <input type="text" class="form-control" id="code"
                  name="code" value="<?php echo substr(md5(rand(0, 1000000)), 0, 7);?>">
              </div>
            </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label><?php echo get_phrase('invoice_title'); ?></label>
                      <input type="text" class="form-control" id="title"
                             name="title" value="">
                  </div>
              </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><?php echo get_phrase('charge'); ?></label>
                <input type="text" class="form-control" id="code"
                       placeholder="<?php echo get_phrase('amount_in');?> <?php echo get_settings('currency');?>"
                  name="charge" value="">
              </div>
            </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label><?php echo get_phrase('status'); ?></label>
                      <select class="selectpicker" data-style="form-control" name="status">
                          <option value="1">
                              <?php echo get_phrase('paid'); ?>
                          </option>
                          <option value="0">
                              <?php echo get_phrase('unpaid'); ?>
                          </option>
                      </select>
                  </div>
              </div>
            <input id="patient_type" type="hidden" name="patient_type" value="old">
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
              <?php echo get_phrase('create_invoice'); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    $('.select2').select2();
    $('#new_patient_data_inputs').hide();
  });

  function show_inputs() {
    $('#patient_type').val('new');
    $('#new_patient_data_inputs').fadeIn('slow');
    $('#old_patient_input').hide();
    $('#patientName').attr('required', true);
    $('#patientPhone').attr('required', true);
  }

</script>
