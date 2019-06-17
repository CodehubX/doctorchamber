<h4>
  <strong class="text-danger">
    <?php echo get_phrase('appointment_list');?> &nbsp; | &nbsp; <?php echo date('d M, Y', $timestamp);?>
  </strong>
</h4>
<br>
<?php
    $count = 1;
    $appointments = get_appointments(get_settings('chamber_id'), $timestamp);
    $count_appointments = count($appointments);
    if ($count_appointments > 0) {
?>
<div class="table-responsive">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th data-toggle="true"><?php echo get_phrase('serial'); ?></th>
      <th><?php echo get_phrase('name'); ?></th>
      <th><?php echo get_phrase('visited'); ?></th>
      <th data-hide="all"><?php echo get_phrase('manage'); ?></th>
    </tr>
  </thead>
  <tbody>
  <?php
      foreach ($appointments as $row):
      $prescription = $this->db->get_where('prescription', array(
          'appointment_id' => $row['appointment_id']
      ));
      if ($prescription->num_rows() < 1) {
          $prescription_id = $this->prescription_model->add_prescription_for_appointment($row['appointment_id']);
      } else {
          $prescription_id = $prescription->row()->prescription_id;
      }
  ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo get_patient_info_by_id($row['patient_id'], 'name'); ?></td>
      <td>
        <div class="m-0 checkbox checkbox-success checkbox-circle">
          <input type="checkbox" name="<?php echo $row['appointment_id'];?>"
            <?php if ($row['is_visited'] == 1) echo 'checked'; ?>>
          <label><?php echo get_phrase('visited'); ?></label>
        </div>
      </td>
      <td>
        <a class="btn btn-info btn-rounded btn-sm"
          href="<?php echo site_url('doctor/patient_profile/' . $row['patient_id']);?>">
          <?php echo get_phrase('profile'); ?>
        </a>
          <a class="btn btn-success btn-rounded btn-sm"
             href="<?php echo site_url('doctor/prescription_manage/' . $prescription_id);?>">
              <?php echo get_phrase('prescription'); ?>
          </a>
      </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
</div>
<?php } else { ?>
    <h4>
        <?php echo get_phrase('no_appointments_found_on') . ' ' . date('d M, Y', $timestamp) ;?>
    </h4>
<?php } ?>


<script type="text/javascript">

  $(document).ready(function() {

    $('input[type="checkbox"]').change(function() {
      var selected_date = '<?php echo date('d-M-Y', $timestamp);?>';
      var appointment_id = $(this).attr('name');
      if (this.checked) {
        status = 1
      } else {
        status = 0
      }
      
      $.ajax({
        url: '<?php echo site_url('doctor/change_appointment_status');?>/' + appointment_id + '/' + status + '/' + selected_date,
        success: function(response) {
          jQuery('#appointment_list').html(response);
          jQuery.toast({
            heading: 'Success',
            text: 'Appointment status was updated successfully',
            position: 'top-right',
            loaderBg:'#4CAF50',
            icon: 'success',
            hideAfter: 5000,
            stack: 6
        });
        }
      });
    });

  });

</script>
