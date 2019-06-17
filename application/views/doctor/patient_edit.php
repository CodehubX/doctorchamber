<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/patient_profile/'.$patient_id);?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_patient_profile');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo get_phrase('edit_patient'); ?></h3>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <blockquote><?php echo get_phrase('basic_info');?></blockquote>
          <?php
            $info = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
            foreach ($info as $row):
          ?>
          <form action="<?php echo site_url('doctor/patient/edit/' . $row['patient_id']);?>"
            method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?php echo get_phrase('name'); ?></label>
                  <input type="text" class="form-control"name="name"
                    value="<?php echo $row['name'];?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><?php echo get_phrase('age'); ?></label>
                  <input type="text" class="form-control" placeholder="E.g. 20y" name="age"
                    value="<?php echo $row['age'];?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?php echo get_phrase('gender'); ?></label>
                  <select class="selectpicker" data-style="form-control" name="gender">
                    <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>
                      <?php echo get_phrase('male'); ?>
                    </option>
                    <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>
                      <?php echo get_phrase('female'); ?>
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><?php echo get_phrase('phone_number'); ?></label>
                  <input type="text" class="form-control" name="phone"
                    value="<?php echo $row['phone'];?>" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><?php echo get_phrase('address'); ?></label>
                  <textarea name="address" rows="3" class="form-control"><?php echo $row['address'];?></textarea>
                </div>
              </div>
            </div>
            <blockquote><?php echo get_phrase('medical_info');?></blockquote>
            <?php
              if ($row['medical_info'] != NULL) {
                $medical_info = json_decode($row['medical_info']);
              }
            ?>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('blood_group'); ?></label>
                <input type="text" class="form-control" name="blood_group"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->blood_group;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('height'); ?></label>
                <input type="text" class="form-control" name="height"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->height;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('weight'); ?></label>
                <input type="text" class="form-control" name="weight"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->weight;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('blood_pressure'); ?></label>
                <input type="text" class="form-control" name="blood_pressure"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->blood_pressure;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('pulse'); ?></label>
                <input type="text" class="form-control" name="pulse"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->pulse;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('respiration'); ?></label>
                <input type="text" class="form-control" name="respiration"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->respiration;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('allergy'); ?></label>
                <input type="text" class="form-control" name="allergy"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->allergy;?>">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('diet'); ?></label>
                <input type="text" class="form-control" name="diet"
                  value="<?php echo $row['medical_info'] == NULL ? '' : $medical_info[0]->diet;?>">
              </div>
            </div>

             <!-- file -->
             
            <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                      <label><?php echo get_phrase('file'); ?></label>
                      <label class="custom-file">
                        <input type="file" class="custom-file-inputl" name="file_name" >
                        <span class="custom-file-control"></span>
                      </label>
                  </div>
                </div>
            </div>

          
            
          

          <?php endforeach; ?>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
              <i class="fa fa-save m-r-5"></i><?php echo get_phrase('save_patient_info'); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
