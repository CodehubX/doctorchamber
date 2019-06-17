<?php $chamber_info = $this->db->get_where('chamber',array('chamber_id'=>$chamber_id))->row();?>
<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/chamber');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_chamber_list');?>
    </a>
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="white-box m-t-10">
            <form action="<?php echo site_url('doctor/chamber/edit/'.$chamber_id);?>"
                  method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label><?php echo get_phrase('name'); ?></label>
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('chamber_name');?>"
                                   name="name" value="<?php echo $chamber_info->name;?>"
                                    id="chamberName" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label><?php echo get_phrase('address'); ?></label>
                            <input type="text" class="form-control" placeholder="<?php echo get_phrase('chamber_address');?>"
                                   name="address"
                                    value="<?php echo $chamber_info->address;?>" id="chamberAddress">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="color: #fff;">savebutton</label>
                            <button type="submit" class="btn btn-success btn-block">
                                <?php echo get_phrase('save_changes'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="white-box">
      <h3 class="box-title"><?php echo $page_title; ?></h3>
      <div class="row m-b-20">
        <div class="col-md-3"><strong><?php echo get_phrase('days'); ?></strong></div>
        <div class="col-md-3 text-center"><strong><?php echo get_phrase('morning_session'); ?></strong></div>
        <div class="col-md-3 text-center"><strong><?php echo get_phrase('afternoon_session'); ?></strong></div>
        <div class="col-md-3 text-center"><strong><?php echo get_phrase('evening_session'); ?></strong></div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <form action="<?php echo site_url('doctor/save_schedule/'.$chamber_id);?>"
            method="post">
          <!-- DATE FILTER -->
          <!-- APPOINTMENT LIST -->
          <?php $days = array(0 => 'sunday', 1 => 'monday', 2=>'tuesday', 3=> 'wednesday', 4=> 'thursday', 5=> 'friday', 6 =>'saturday'); ?>
          <?php $morning_times = array('8:00 AM','8:30 AM','9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM'); ?>
          <?php $afternoon_times = array('12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM', '5:00 PM', '5:30 PM', '6:00 PM'); ?>
          <?php $evening_times = array('6:00 PM', '6:30 PM', '7:00 PM', '7:30 PM', '8:00 PM', '8:30 PM', '9:00 PM', '9:30 PM', '10:00 PM', '10:30 PM', '11:00 PM', '11:30 PM', '12:00 AM'); ?>
          <?php $schedule = ($chamber_info->schedule!='')?(array)json_decode($chamber_info->schedule):array(); ?>

          <?php foreach($days as $key => $day){ ?>
            <input type="hidden" name="days[]" value="<?php echo $day; ?>">
            <?php $open = (isset($schedule[$key]->status))?$schedule[$key]->status:'closed'; ?>
            <?php $chk = ($open=='open')?'checked':'';?>
            <div class="row">
              <div class="col-md-3">
                <label>
                  <input <?php echo $chk; ?> name="open_days[]" class="open-days js-switch" value="<?php echo $key;?>" type="checkbox"
                    data-color="#99d683">
                  <?php echo get_phrase($day); ?>
                </label>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12" style="">
                    <?php $v = (isset($schedule[$key]->morning_open))?$schedule[$key]->morning_open:'';?>
                    <select class="selectpicker time-select" data-style="form-control">
                      <option value=""><?php echo get_phrase('select_time'); ?></option>
                      <?php foreach($morning_times as $time){ ?>
                          <?php $sel = ($time==$v)?'selected="selected"':'' ?>
                          <option <?php echo $sel;?> value="<?php echo $time; ?>"><?php echo $time; ?></option>
                      <?php } ?>
                    </select>
                    <input type="hidden" name="morning_open[]" value="<?php echo $v; ?>">
                  </div>
                  <div class="col-sm-12" style="">
                    <?php $v = (isset($schedule[$key]->morning_close))?$schedule[$key]->morning_close:'';?>
                    <select class="selectpicker time-select" data-style="form-control">
                      <option value="close"><?php echo get_phrase('select_time'); ?></option>
                      <?php foreach($morning_times as $time){ ?>
                          <?php $sel = ($time==$v)?'selected="selected"':'' ?>
                          <option <?php echo $sel;?> value="<?php echo $time; ?>"><?php echo $time; ?></option>
                      <?php } ?>
                    </select>
                    <input type="hidden" name="morning_close[]" value="<?php echo $v; ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12" style="">
                    <?php $v = (isset($schedule[$key]->afternoon_open))?$schedule[$key]->afternoon_open:'';?>
                    <select class="selectpicker time-select" data-style="form-control">
                      <option value=""><?php echo get_phrase('select_time') ?></option>
                      <?php foreach($afternoon_times as $time){ ?>
                        <?php $sel = ($time==$v)?'selected="selected"':'' ?>
                        <option <?php echo $sel;?> value="<?php echo $time; ?>"><?php echo $time; ?></option>
                      <?php } ?>
                    </select>
                      <input type="hidden" name="afternoon_open[]" value="<?php echo $v; ?>">
                    </div>
                    <div class="col-sm-12" style="">
                        <?php $v = (isset($schedule[$key]->afternoon_close))?$schedule[$key]->afternoon_close:'';?>
                        <select class="selectpicker time-select" data-style="form-control">
                            <option value=""><?php echo get_phrase('select_time') ?></option>
                            <?php foreach($afternoon_times as $time){ ?>
                                <?php $sel = ($time==$v)?'selected="selected"':'' ?>
                                <option <?php echo $sel;?> value="<?php echo $time; ?>"><?php echo $time; ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="afternoon_close[]" value="<?php echo $v; ?>">
                    </div>
                </div>
              </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-sm-12" style="">
                            <?php $v = (isset($schedule[$key]->evening_open))?$schedule[$key]->evening_open:'';?>
                            <select class="selectpicker time-select" data-style="form-control">
                                <option value=""><?php echo get_phrase('select_time') ?></option>
                                <?php foreach($evening_times as $time){ ?>
                                    <?php $sel = ($time==$v)?'selected="selected"':'' ?>
                                    <option <?php echo $sel;?> value="<?php echo $time; ?>"><?php echo $time; ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="evening_open[]" value="<?php echo $v; ?>">
                        </div>
                        <div class="col-sm-12" style="">
                            <?php $v = (isset($schedule[$key]->evening_close))?$schedule[$key]->evening_close:'';?>
                            <select class="selectpicker time-select" data-style="form-control">
                                <option value=""><?php echo get_phrase('select_time') ?></option>
                                <?php foreach($evening_times as $time){ ?>
                                    <?php $sel = ($time==$v)?'selected="selected"':'' ?>
                                    <option <?php echo $sel;?> value="<?php echo $time; ?>"><?php echo $time; ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="evening_close[]" value="<?php echo $v; ?>">
                        </div>
                    </div>
                </div>

              <div class="clearfix"></div>
              </div>
              <br/>
          <?php } ?>
          <button type="submit" class="btn btn-success btn-block "><?php echo get_phrase('save_schedule') ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function(){

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
      new Switchery($(this)[0], $(this).data());
    });

    jQuery('.open-days').each(function(){
      var val = $(this).prop('checked');
      //console.log(val);
      if(val== false) {
//    console.log(jQuery(this).parent().parent().parent().parent());
      jQuery(this).parent().parent().parent().find('select').attr('disabled','');
      } else {
        //jQuery(this).parent().parent().parent().parent().parent().parent().find("select option[value='']").attr('selected', true);
        jQuery(this).parent().parent().parent().find('select').removeAttr("disabled");
      }
    });

    jQuery('.open-days').change(function(){
      var val = $(this).prop('checked');
      //console.log(jQuery(this).parent().parent().parent());
      if(val== false) {
        jQuery(this).parent().parent().parent().find('select').attr('disabled','');
      } else {
        //jQuery(this).parent().parent().parent().parent().parent().parent().find("select option[value='']").attr('selected', true);
        jQuery(this).parent().parent().parent().find('select').removeAttr("disabled");
      }
      jQuery(".selectpicker").selectpicker('refresh');
    });

    jQuery('.time-select').change(function(){

      var value = $(this).val();
        //console.log(value);
        var parent = $(this).parent().parent();
        //console.log(parent);

      jQuery(this).parent().parent().find('input[type=hidden]').val(value);
    });

  });
</script>
