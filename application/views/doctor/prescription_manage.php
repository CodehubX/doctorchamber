<?php
  $info = $this->db->get_where('prescription', array(
    'prescription_id' => $prescription_id
  ));
  $patient_id = $info->row()->patient_id;
    $pres_info = $info->result_array();
    foreach ($pres_info as $row):
?>
<div class="row">
  <div class="col-sm-12">
       <a href="<?php echo site_url('doctor/prescription');?>"
        class="btn btn-success">
          <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('prescription_list'); ?></a>
   </div>
</div>
  <div class="row">
    <div class="col-lg-12">
      <div class="white-box m-t-10">
        <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
        <form action="<?php echo site_url('doctor/prescription/manage/' . $row['prescription_id']);?>"
          method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-7">
              <div class="form-group">
                <label><?php echo get_phrase('symptoms'); ?></label>
                <textarea name="symptom" class="form-control" rows="3" placeholder="<?php echo get_phrase('add_symptoms');?>"><?php echo $row['symptom']; ?></textarea>
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('diagnosis'); ?></label>
                <textarea name="diagnosis" class="form-control" rows="3" placeholder="<?php echo get_phrase('add_diagnosis');?>"><?php echo $row['diagnosis']; ?></textarea>
              </div>
              <label><?php echo get_phrase('medicine'); ?></label>
              <?php
                if ($row['medicine'] != ''):
                  $medicines_array = json_decode($row['medicine']);
              ?>
              <?php for ($i = 0; $i < count($medicines_array); $i++): ?>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('medicine_name');?>"
                      name="medicine_name[]" value="<?php echo $medicines_array[$i]->medicine_name;?>">
                  </div>
                  <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="<?php echo get_phrase('notes');?>"
                      name="medicine_note[]" value="<?php echo $medicines_array[$i]->note;?>">
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
            <?php
              endfor;
              endif;
            ?>
              <div id="append_holder_for_medicine_entries"></div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="fcbtn btn btn-outline btn-success btn-1d"
                      onclick="append_blank_entry('medicine')">
                      <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_medicine')?>
                    </button>
                  </div>
                </div>
              </div>
              <label><?php echo get_phrase('test'); ?></label>
              <?php
                if ($row['test'] != ''):
                  $test_array = json_decode($row['test']);
              ?>
              <?php for ($i = 0; $i < count($test_array); $i++): ?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-5">
                      <input type="text" class="form-control" placeholder="<?php echo get_phrase('test_name');?>"
                        name="test_name[]" value="<?php echo $test_array[$i]->test_name;?>">
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" placeholder="<?php echo get_phrase('notes');?>"
                        name="test_note[]" value="<?php echo $test_array[$i]->note;?>">
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
              <?php
                endfor;
              endif;
              ?>
              <div id="append_holder_for_test_entries"></div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="fcbtn btn btn-outline btn-success btn-1d"
                      
                      onclick="append_blank_entry('test')">
                      <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_test')?>
                    </button>
                  </div>
                </div>  

              </div>

               <!-- file -->

              <div class="form-group">
                <label><?php echo get_phrase('file'); ?></label>
                 <label class="custom-file">
                    <input type="file" class="custom-file-inputl" name="file_name" >
                    <span class="custom-file-control"></span>
                  </label>
              </div>

           

           
              <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                <i class="fa fa-save m-r-5"></i><?php echo get_phrase('save_prescription'); ?>
              </button>
              <a href = "<?php echo site_url('doctor/print_prescription/'.$prescription_id);?>" type="button" class="btn btn-info waves-effect waves-light m-r-10">
                <i class="fa fa-print m-r-5"></i><?php echo get_phrase('print_prescription'); ?>
              </a>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
              <div class="form-group">
                <label><?php echo get_phrase('patient_name'); ?></label>
                <input type="text" class="form-control" name="name"
                  value="<?php echo get_patient_info_by_id($row['patient_id'], 'name');?>" required>
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('age'); ?></label>
                <input type="text" class="form-control" name="age"
                  value="<?php echo get_patient_info_by_id($row['patient_id'], 'age');?>">
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('gender'); ?></label>
                <select class="selectpicker" data-style="form-control" name="gender">
                  <option value="male" <?php if (get_patient_info_by_id($row['patient_id'], 'gender') == 'male') echo 'selected';?>>
                    <?php echo get_phrase('male'); ?>
                  </option>
                  <option value="female" <?php if (get_patient_info_by_id($row['patient_id'], 'gender') == 'female') echo 'selected';?>>
                    <?php echo get_phrase('female'); ?>
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('phone_number'); ?></label>
                <input type="text" class="form-control" name="phone"
                  value="<?php echo get_patient_info_by_id($row['patient_id'], 'phone');?>"
                    maxlength="11" required>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


  <?php if ($row['medicine'] != ''): ?>
    <script type="text/javascript">
      var num = '<?php echo count(json_decode($row['medicine']));?>';
      var number_of_medicine = parseInt(num);
    </script>
  <?php endif; ?>
  <?php if ($row['test'] != ''): ?>
    <script type="text/javascript">
      var num = '<?php echo count(json_decode($row['test']));?>';
      var number_of_test = parseInt(num);
    </script>
  <?php endif; ?>
  <?php if ($row['medicine'] == ''): ?>
    <script type="text/javascript">
      var number_of_medicine = 0;
    </script>
  <?php endif; ?>
  <?php if ($row['test'] == ''): ?>
    <script type="text/javascript">
      var number_of_test = 0;
    </script>
  <?php endif; ?>
<?php
  endforeach;
?>

<script type="text/javascript">

  function append_blank_entry(selector) {
    $.ajax({
      url: '<?php echo site_url('doctor/load_blank_prescription_entry');?>/' + selector,
      success: function(response) {
        jQuery('#append_holder_for_' + selector + '_entries').append(response);
        if (selector == 'medicine') {
          number_of_medicine = number_of_medicine + 1
          console.log(number_of_medicine);
        } else {
          number_of_test = number_of_test + 1;
          console.log(number_of_test);
        }
      }
    });
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

</script>


