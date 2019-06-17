<?php $schedule = ($chamber->schedule!='')?(array)json_decode($chamber->schedule):array(); ?>

<?php if (empty($schedule)) { ?>
  <blockquote><?php echo get_phrase('no_schedule_on_this_day'); ?></blockquote>
<?php } else { ?>
    <?php $open = (isset($schedule[$day]->status))?$schedule[$day]->status:'closed'; ?>

    <?php if($open == 'closed'){ ?>
        <blockquote><?php echo get_phrase('no_schedule_on_this_day'); ?></blockquote>
        <input type="hidden" name="schedule" value="">

    <?php }else { ?>

        <?php $day_schedule = array();

            if($schedule[$day]->morning != '')
                array_push($day_schedule,$schedule[$day]->morning);

            if($schedule[$day]->afternoon != '')
                array_push($day_schedule,$schedule[$day]->afternoon);

            if($schedule[$day]->evening != '')
                array_push($day_schedule,$schedule[$day]->evening);

        ?>
        <select class="selectpicker" data-style="form-control" name="schedule">
            <?php foreach($day_schedule as $time){ ?>
                <option value="<?php echo $time; ?>"><?php echo $time; ?></option>
            <?php } ?>
        </select>
    <?php } ?>

<?php } ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('.selectpicker').selectpicker();
  });
</script>
