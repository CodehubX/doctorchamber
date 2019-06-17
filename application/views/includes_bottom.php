<script src="<?php echo base_url('assets/backend/bootstrap/dist/js/tether.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/jquery.slimscroll.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/waves.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/custom.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/moment/moment.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/bootstrap-select/bootstrap-select.min.js');?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/custom-select/custom-select.min.js');?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/datatables/jquery.dataTables.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/toast-master/js/jquery.toast.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/toastr.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/sweetalert/sweetalert.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/switchery/dist/switchery.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/printThis.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/waypoints/lib/jquery.waypoints.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/counterup/jquery.counterup.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/dropify/dist/js/dropify.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/moment/moment.js');?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/bower_components/calendar/dist/fullcalendar.min.js');?>"></script>
<script src="<?php //echo base_url('assets/backend/plugins/bower_components/calendar/dist/cal-init.js');?>"></script>

<?php if ($this->session->flashdata('success_message') != ''): ?>
    <script type="text/javascript">
        $.toast({
            heading: '<?php echo get_phrase('success');?>',
            text: '<?php echo $this->session->flashdata('success_message') ;?>',
            position: 'top-right',
            loaderBg:'#4CAF50',
            icon: 'success',
            hideAfter: 5000,
            stack: 6
        });
    </script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ''): ?>
    <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alerttop">
        <i class="ti-thumb-down"></i>
        <?php echo $this->session->flashdata('error_message'); ?>
        <a href="#" class="closed">&times;</a>
    </div>
    <script type="text/javascript">
        $(".alerttop").fadeToggle(350);
        $(".myadmin-alert-click").click(function (event) {
            $(this).fadeToggle(350);
            return false;
        });
    </script>
<?php endif;?>
