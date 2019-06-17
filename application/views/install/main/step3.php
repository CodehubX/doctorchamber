<?php if(isset($error_con_fail)) { ?>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="alert alert-danger">
        <strong><?php echo $error_con_fail; ?></strong>
      </div>
    </div>
  </div>
<?php } ?>
<?php if(isset($error_nodb)) { ?>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="alert alert-danger">
        <strong><?php echo $error_nodb; ?></strong>
      </div>
    </div>
  </div>
<?php } ?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="panel panel-default" data-collapsed="0"
      style="border-color: #dedede;">
      <!-- panel body -->
      <div class="panel-body" style="font-size: 14px;">
        <p style="font-size: 14px;">
          Below you should enter your database connection details. If you’re not sure about these, contact your host.
        </p>
        <br>
        <div class="row">
          <div class="col-md-12" align="center">
            <form class="form-horizontal form-groups" method="post"
              action="<?php echo site_url('install/step3/configure_database');?>" >
              <hr>
              <div class="form-group">

        				<label class="col-sm-3">Database Name</label>
               
        				<div class="col-sm-5">
        					<input type="text" class="form-control" name="dbname" placeholder=""
                    required autofocus>
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  The name of the database you want to use with this application
                </div>
        			</div>
              
              <hr>
              <div class="form-group">
        				<label class="col-sm-3">Username</label>
        				<div class="col-sm-5">
        					<input type="text" class="form-control" name="username" placeholder=""
                    required>
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  Your database Username
                </div>
        			</div>
              <hr>
              <div class="form-group">
        				<label class="col-sm-3">Password</label>
        				<div class="col-sm-5">
        					<input type="password" class="form-control" name="password" placeholder="">
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  Your database Password
                </div>
        			</div>
              <hr>
              <div class="form-group">
        				<label class="col-sm-3">Database Host</label>
        				<div class="col-sm-5">
        					<input type="text" class="form-control" name="hostname" placeholder=""
                    required>
        				</div>
                <div class="col-sm-4" style="font-size: 12px; margin-top: 5px;">
                  If 'localhost' does not work, you can get the hostname from web host
                </div>
        			</div>
              <hr>


              
            

              <div class="form-group">
        				<label class="col-sm-3"></label>
        				<div class="col-sm-7">
        					<button type="submit" class="btn m-btn--pil btn-primary m-btn m-btn--custom">Continue</button>
        				</div>
        			</div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
