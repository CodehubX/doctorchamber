<?php 
$this->db->where('chamber_id', get_settings('chamber_id'));
$this->db->select('timestamp, COUNT(timestamp) as total');
 $this->db->group_by('timestamp');  
 $result = $this->db->get('appointment')->result_array();

?>

<style>
    .fc-event {
		cursor: pointer;
	}
</style>
<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/appointment_new');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('new_appointment');?>
    </a>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-12">
    <div class="white-box m-t-10">
		<span class="pull-right text-small text-muted">
			<?php echo get_phrase('click_on_a_day_or_event_to_see_appointments');?>
		</span>
        <h4><?php echo get_phrase('appointment_schedule');?></h4>
        <div id="calendar"></div>
    </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <div class="white-box m-t-10">
      <div id="appointment_list">
      	<?php include 'appointment_list.php';?>
      </div>
      </div>
  </div>
</div>

<?php
	
    $appointments = $this->db->get_where('appointment', array(
            'chamber_id' => get_settings('chamber_id')
    ))->result_array();
?>

<script type="text/javascript">

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      selectable: false,
      eventLimit: true,
      dayClick: function(date) {
        var selected_date = date.format();
        load_appointment_list(selected_date);
      },
      eventClick: function(calEvent) {
        var selected_date = calEvent.start.format();
        load_appointment_list(selected_date);
      },
      events: [
        <?php foreach ($result as $row):?>
            {
                title: '<?php echo $row['total'] . ' ' . get_phrase('patients');?>',
                start: new Date(<?php echo date('Y', $row['timestamp']); ?>,
                    <?php echo date('m', $row['timestamp']) - 1; ?>,
                    <?php echo date('d', $row['timestamp']); ?>),
                allDay: true,
                className: 'bg-danger'
            },
        <?php endforeach;?>
    ]

    });

  });

  function load_appointment_list(selected_date) {
    $.ajax({
      url: '<?php echo site_url('doctor/apply_appointment_filter/');?>' + selected_date,
      success: function(response) {
        jQuery('#appointment_list').html(response);
      }
    });
  }

</script>

