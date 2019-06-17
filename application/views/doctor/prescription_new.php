<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/prescription');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_prescription_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <form action="<?php echo site_url('doctor/prescription/create');?>" method="post" >
        <div class="row">
          <div class="col-lg-7">
            <div class="form-group">
              <label><?php echo get_phrase('symptoms'); ?></label>
              <textarea name="symptom" class="form-control" rows="3"
                placeholder="<?php echo get_phrase('add_symptoms');?>"></textarea>
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('diagnosis'); ?></label>
              <textarea name="diagnosis" class="form-control" rows="3"
                placeholder="<?php echo get_phrase('add_diagnosis');?>"></textarea>
            </div>
            <label><?php echo get_phrase('medicine'); ?></label>
            <div id="medicine_entry">
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
                    <button type="button" class="fcbtn btn btn-outline btn-danger btn-1d btn-sm"
                      data-toggle="tooltip" data-placement="right" title="<?php echo get_phrase('remove');?>"
                      onclick="delele_parent_element(this, 'medicine')">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div id="append_holder_for_medicine_entries"></div>

           
           <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="fcbtn btn btn-info btn-outline btn-1d"
                    onclick="append_blank_entry('medicine')">
                    <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_medicine');?>
                  </button>
                </div>
              </div>
            </div>

            <label><?php echo get_phrase('test'); ?></label>
            <div id="test_entry">
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
            </div>
            <div id="append_holder_for_test_entries"></div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="fcbtn btn btn-info btn-outline btn-1d"
                   
                    onclick="append_blank_entry('test')">
                    <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_test');?>
                  </button>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save m-r-5"></i><?php echo get_phrase('save_prescription');?></button>
          </div>
          <div class="col-lg-1"></div>
          <div class="col-lg-4">
            <div id="old_patient_inputs">
              <div class="form-group">
                <label for="patientSelect">Patient</label>
                <select class="form-control select2" name="patient_id">
                  <option value=""><?php echo get_phrase('select_patient');?></option>
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
              <div class="form-group">
                <button class="fcbtn btn btn-info btn-outline btn-1d" type="button" id="new"
                  onclick="show_new_patient_inputs()">
                  New Patient
                </button>
                <input type="hidden" name="patient_type" value="old" id="patient_type">
              </div>
            </div>
            <div id="new_patient_inputs">
              <div class="form-group">
                <label><?php echo get_phrase('patient_name'); ?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo get_phrase('patient_name');?>"
                  value="" id="patient_name">
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('phone_number'); ?></label>
                <input type="text" class="form-control" name="phone" placeholder="<?php echo get_phrase('phone_number');?>"
                  value="" maxlength="11" id="patient_phone">
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('age'); ?></label>
                <input type="text" class="form-control" name="age"
                  value="" placeholder="e.g 22y">
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('gender'); ?></label>
                <select class="selectpicker" data-style="form-control" name="gender">
                  <option value="male">
                    <?php echo get_phrase('male'); ?>
                  </option>
                  <option value="female">
                    <?php echo get_phrase('female'); ?>
                  </option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  var blank_medicine_entry = '';
  var blank_test_entry = '';
  var number_of_medicine = 1;
  var number_of_test = 1;

  $(document).ready(function() {

    $('.select2').select2();

    blank_medicine_entry = $('#medicine_entry').html();
    blank_test_entry = $('#test_entry').html();
    console.log(number_of_medicine);
    console.log(number_of_test);

    $('#new_patient_inputs').hide();

  });

  function append_blank_entry(selector) {
    if (selector == 'medicine') {
      number_of_medicine = number_of_medicine + 1;
      $('#append_holder_for_medicine_entries').append(blank_medicine_entry);
      console.log(number_of_medicine);
    } else {
      number_of_test = number_of_test + 1;
      $('#append_holder_for_test_entries').append(blank_test_entry);
      console.log(number_of_test);
    }
  }

  function delele_parent_element(n, selector) {
    if (selector == 'medicine') {
      if (number_of_medicine > 1) {
        n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
      }
      if (number_of_medicine != 1) {
        number_of_medicine = number_of_medicine - 1;
      }
      console.log(number_of_medicine);
    } else {
      if (number_of_test > 1) {
        n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
      }
      if (number_of_test != 1) {
        number_of_test = number_of_test - 1;
      }
      console.log(number_of_test);
    }
  }

  function show_new_patient_inputs() {
    $('#old_patient_inputs').hide();
    $('#new_patient_inputs').fadeIn();
    $('#patient_type').val('new');
    $('#patient_name').attr('required', true);
    $('#patient_phone').attr('required', true);
  }

</script>
