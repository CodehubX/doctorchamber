<?php

    $patients = $this->db->get('patient')->num_rows();

    $appointments = $this->db->get_where('appointment', array(
        'timestamp' => strtotime(date('d-m-Y')),
        'chamber_id' => get_settings('chamber_id')
    ))->num_rows();

    $chambers = $this->db->get('chamber')->num_rows();

    $invoices = $this->db->get_where('invoice', array(
        'chamber_id' => get_settings('chamber_id'),
        'timestamp' => strtotime(date('d-m-Y')),
        'status' => 1
    ))->result_array();
    $bill = 0;
    foreach ($invoices as $row) {
        $bill = $bill + $row['charge'];
    }
?>
<style>
    .fc-time {
        display: none;
    }
    .fc-more-popover {
        left: 0px;
        width: 60%;
    }
</style>

<div class="row">
   
    <div class="col-sm-12 col-md-6">
        <div class="white-box">
            <h5><?php echo get_phrase('appointment_schedule');?></h5>
            <div id="calendar"></div>
        </div>

        <?php
        $appointments = $this->db->get_where('appointment', array(
                'chamber_id' => get_settings('chamber_id')
        ))->result_array();
    ?>

        <script type="text/javascript">
        $(document).ready(function() {

            var today = new Date($.now());

            var defaultEvents =  [
                <?php foreach ($appointments as $row):
                    $patient = $this->db->get_where('patient',array('patient_id'=>$row['patient_id']))->row()->name;
                ?>
                {
                    title: '<?php echo $patient;?> [<?php echo $row['schedule'];?>]',
                    start: new Date(<?php echo date('Y', $row['timestamp']); ?>,
                        <?php echo date('m', $row['timestamp']) - 1; ?>,
                        <?php echo date('d', $row['timestamp']); ?>),
                    className: 'bg-info'
                },
            <?php endforeach;?>
            ];

            $('#calendar').fullCalendar({
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                minTime: '06:00:00',
                maxTime: '24:00:00',
                defaultView: 'month',
                handleWindowResize: true,

                header: {
                    left: 'title',
                    right: 'prev,next today'
                },
                events: defaultEvents,
                eventLimit: true, // allow "more" link when too many events
                selectable: true
            });

            $('.counter').counterUp({
                time: 1000
            });
        });
        </script>
    </div>
     <div class="col-sm-12 col-md-6">
        <div class="white-box">
            <h5><?php echo get_phrase('appointment_list');?></h5>
            <div id="calendar"></div>
        </div>
         <div class="input-group" style="z-index: 1000;">
            <span class="input-group-addon"><i class="icon-calender"></i></span>
            <input type="text" class="form-control mydatepicker"
              value="<?php echo date('d-m-Y' , $timestamp);?>">
          </div>
     </div>
    




</div>

