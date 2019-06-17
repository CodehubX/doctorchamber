<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="panel panel-default" data-collapsed="0"
      style="border-color: #dedede;">
      <!-- panel body -->
      <div class="panel-body" style="font-size: 14px;">
        <center>
          <i class="entypo-thumbs-up" style="font-size: 32px;"></i>
          <h3>Congratulations!! The installation was successfull</h3>
        </center>
        <br>
        <center>
          <strong>
            Before you start using your application, make it yours. Set your name, login email and
            password. Remember the login credentials which you will need later on for signing into your account. After this step,
            you will be redirected to application's login page.
          </strong>
        </center>
        <br>
        <div class="row">
          <div class="col-md-12" align="center">
            <form class="form-horizontal form-groups" method="post"
              action="<?php echo site_url('install/finalizing_setup/setup_admin');?>">
              <hr>
              <div class="form-group">
        				<label class="col-sm-3">Doctor Name</label>
        				<div class="col-sm-5">
        					<input type="text" class="form-control" name="name" placeholder="" required>
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  Full name of the doctor
                </div>
        			</div>
              <hr>
              <div class="form-group">
        				<label class="col-sm-3">Doctor Email</label>
        				<div class="col-sm-5">
        					<input type="email" class="form-control" name="email" placeholder="" required>
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  Email address for doctor login
                </div>
        			</div>
              <hr>
              <div class="form-group">
        				<label class="col-sm-3">Password</label>
        				<div class="col-sm-5">
        					<input type="password" class="form-control" name="password" placeholder=""
                    required>
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  Doctor login password
                </div>
        			</div>
              <hr>
              <div class="form-group">
        				<label class="col-sm-3 control-label"></label>
        				<div class="col-sm-7">
        					<button type="submit" class="btn m-btn--pill    btn-primary m-btn m-btn--custom">Set me up</button>
        				</div>
        			</div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
