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
    <div class="col-sm-12 col-md-5">
        <div class="col-sm-12 col-md-6">
            <div class="white-box">
                <h3 class="box-title">
                    <?php echo get_phrase('registered_patients'); ?>
                </h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-people text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $patients; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="white-box">
                <h3 class="box-title">
                    <?php echo get_phrase('appointment_today'); ?>
                </h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-book-open text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $appointments; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="white-box">
                <h3 class="box-title">
                    <?php echo get_phrase('active_chambers'); ?>
                </h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-grid text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $chambers; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="white-box">
                <h3 class="box-title">
                    <?php echo get_phrase('billing_today'); ?>
                </h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-wallet text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $bill; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="white-box">
            <h5><?php echo get_phrase('appointment_schedule');?></h5>
            <div id="calendar"></div>
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
