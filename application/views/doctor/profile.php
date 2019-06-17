<?php
  $user_info = $this->db->get_where('users', array(
    'user_id' => $this->session->userdata('login_user_id')))->result_array();
  foreach ($user_info as $row):
?>
<div class="row">
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-30"><?php echo get_phrase('profile_information'); ?></h3>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <form method="post"
            action="<?php echo site_url('doctor/profile/change_info');?>">
            <div class="form-group">
              <label><?php echo get_phrase('doctor_name'); ?></label>
              <input type="text" class="form-control" id="name" placeholder="<?php echo get_phrase('name');?>"
                name="name" value="<?php echo $row['name'];?>" required>
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('doctor_email'); ?></label>
              <input type="text" class="form-control" id="email" placeholder="<?php echo get_phrase('email');?>"
                name="email" value="<?php echo $row['email'];?>">
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('doctor_qualification'); ?></label>
              <input type="text" class="form-control" id="qualification" placeholder="<?php echo get_phrase('qualification');?>"
                name="qualification" value="<?php echo $row['qualification'];?>" required>
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('doctor_phone'); ?></label>
              <input type="text" class="form-control" id="phone" placeholder="<?php echo get_phrase('phone_number');?>"
                name="phone" value="<?php echo $row['phone'];?>" required>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
              <?php echo get_phrase('update_profile_information'); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-30"><?php echo get_phrase('change_password'); ?></h3>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <form method="post"
            action="<?php echo site_url('doctor/profile/change_password');?>">
            <div class="form-group">
              <label><?php echo get_phrase('current_password'); ?></label>
              <input type="password" class="form-control" id="current_password" placeholder="<?php echo get_phrase('your_current_password');?>"
                name="current_password" value="" required>
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('new_password'); ?></label>
              <input type="password" class="form-control" id="new_password" placeholder="<?php echo get_phrase('your_new_password');?>"
                name="new_password" value="" required>
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('confirm_password'); ?></label>
              <input type="password" class="form-control" id="confirm_password" placeholder="<?php echo get_phrase('retype_new_password');?>"
                name="confirm_password" value="" required>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
              <?php echo get_phrase('update_password'); ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
