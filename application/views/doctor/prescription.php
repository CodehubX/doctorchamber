<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/prescription_new');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('new_prescription');?>
    </a>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <div class="table-responsive">
        <table id="myTable" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo get_phrase('date'); ?></th>
              <th><?php echo get_phrase('patient'); ?></th>  
              <th><?php echo get_phrase('options'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              $chamber_id = get_settings('chamber_id');
              $this->db->where('chamber_id', $chamber_id);
              $this->db->order_by('timestamp', 'DESC');
              $prescriptions = $this->db->get('prescription')->result_array();
              foreach ($prescriptions as $row):
            ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td><?php echo date('F j, Y', $row['timestamp']); ?></td>
              <td>
                <a href="<?php echo site_url('doctor/patient_profile/' . $row['patient_id']);?>">
                  <?php echo get_patient_info_by_id($row['patient_id'], 'name'); ?>
                </a>
              </td>
              <td>
                <a href="<?php echo site_url('doctor/prescription_manage/' . $row['prescription_id']);?>"
                  class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                  <?php echo get_phrase('manage_prescription'); ?>
                </a>
                <button type="button" onclick="delete_prescription('<?php echo $row['prescription_id'];?>')"
                  class="fcbtn btn btn-danger btn-outline btn-1d btn-sm">
                  <?php echo get_phrase('delete'); ?>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    $('#myTable').DataTable({
      "pageLength": 50
    });
  });

  function delete_prescription(prescription_id) {
    swal({
      title: "Are you sure?",
      text: "The prescription and it's content will be deleted permanently !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonClass: 'btn-warning',
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    }, function () {
      swal("Deleted!", "The prescription is deleted", "success");
      setTimeout(function() {
        window.location = "<?php echo site_url('doctor/prescription/delete/');?>" + prescription_id;
      }, 1000);
    });
  }

</script>
