<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/appointment');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_appointment_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <form action="<?php echo site_url('doctor/appointment/create');?>" method="post">
            <div class="row" id="old_patient_input">
              <div class="col-sm-6">
                  <div class="form-group">
                      <button type="button" class="fcbtn btn btn-info btn-outline btn-1d"
                              onclick="show_inputs()">
                          <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('new_patient'); ?>
                      </button>
                  </div>
                <div class="form-group">
                  <label for="patientSelect"><?php echo get_phrase('patient') ?></label>
                  <select class="form-control select2" name="patient_id">
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
            </div>
            <div id="new_patient_data_inputs">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo get_phrase('phone'); ?></label>
                  <input type="text" class="form-control" id="patientPhone" placeholder="<?php echo get_phrase('phone_number');?>"
                    name="phone" value="">
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
              <div class="form-group ">
                <label><?php echo get_phrase('date'); ?></label>
                <div class="input-group" style="z-index: 1000;">
                  <input type="text" class="form-control mydatepicker"
                    value="<?php echo date('d-m-Y');?>"
                    name="timestamp">
                  <span class="input-group-addon"><i class="icon-calender"></i></span>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><?php echo get_phrase('schedule'); ?></label>
                <div id="schedule-holder"></div>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="checkbox">
                <input id="checkbox1" type="checkbox">
                <label for="checkbox1"> Send SMS to Patient </label>
              </div>
            </div> -->
            <input id="patient_type" type="hidden" name="patient_type" value="old">
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
              <?php echo get_phrase('create_appointment'); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  var from, date, day;

  $(document).ready(function() {
    // hide inputs for new patient
    $('#new_patient_data_inputs').hide();
    // datepicker
    $('.mydatepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    }).on('changeDate', function (ev) {
      get_day();
      load_schedule();
    });

    get_day();
    load_schedule();
    // select2
    $('.select2').select2();

  });

  function load_schedule() {
    $.ajax({
      url: '<?php echo site_url('doctor/load_schedule_appointment_ajax');?>/' + day,
      success: function(response) {
        jQuery('#schedule-holder').html(response);
        console.log(day);
      }
    });
  }

  function get_day() {
    from = $('.mydatepicker').val().split('-');
    date = new Date(from[2], from[1] - 1, from[0]);
    day = date.getDay();
  }

  function show_inputs() {
    $('#patient_type').val('new');
    $('#new_patient_data_inputs').fadeIn('slow');
    $('#old_patient_input').hide();
    $('#patientName').attr('required', true);
    $('#patientPhone').attr('required', true);
  }

</script>
