<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/patient');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_patient_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <form action="<?php echo site_url('doctor/patient/add_new');?>" method="post" >
        <div class="row">
         
          
          <div class="col-lg-6">
           
            <div id="new_patient_inputs">
              <div class="form-group">
                <label><?php echo get_phrase('patient_name'); ?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo get_phrase('patient_name');?>"
                  value="" id="patient_name" required="">
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('phone_number'); ?></label>
                <input type="text" class="form-control" name="phone" placeholder="<?php echo get_phrase('phone_number');?>"
                  value="" maxlength="11" id="patient_phone" required="" >
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('age'); ?></label>
                <input type="text" class="form-control" name="age"
                  value="" placeholder="e.g 22y" required="" >
              </div>
              <div class="form-group">
                <label><?php echo get_phrase('gender'); ?></label>
                <select class="selectpicker" data-style="form-control" name="gender" required="" >
                  <option value="male">
                    <?php echo get_phrase('male'); ?>
                  </option>
                  <option value="female">
                    <?php echo get_phrase('female'); ?>
                  </option>
                </select>
              </div>
               <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save m-r-5"></i><?php echo get_phrase('save_prescription');?></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
