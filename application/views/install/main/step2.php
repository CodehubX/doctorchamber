<?php if(isset($error)) { ?>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="alert alert-danger">
        <strong><?php echo $error; ?></strong>
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
          Provide your codecanyon <strong>purchase code</strong>
        </p>
        <br>
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal form-groups" method="post"
              action="<?php echo base_url();?>index.php?install/validate_purchase_code">
              <div class="form-group">
        				<label class="col-sm-3">Purchase Code</label>
        				<div class="col-sm-7">
        					<input type="text" class="form-control" name="purchase_code" placeholder="Product's Purchase Code"
                    required autofocus autocomplete="off">
        				</div>
        			</div>
              <div class="form-group">
        				<label class="col-sm-3 control-label"></label>
        				<div class="col-sm-7">
        					<button type="submit" class="btn m-btn--pill    btn-primary m-btn m-btn--custom">Continue</button>
        				</div>
        			</div>
            </form>
            <br>
            <p>
              <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">
                <strong>Where to get my purchase code ?</strong>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>