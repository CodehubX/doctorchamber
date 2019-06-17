<?php
    $info = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
    foreach ($info as $row):
      if ($row['gender'] == 'male') {
        $img = 'male_avatar.png';
      } else if ($row['gender'] == 'female') {
        $img = 'female_avatar.png';
      } else {
        $img = 'male_avatar.png';
      }
?>
  <div class="row">
  <div class="col-sm-12">
     <a href="<?php echo site_url('doctor/patient') ?>"
      class="btn btn-success">
        <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_patient_list'); ?>
      </a>
 </div>
      <br>
      <br>
    <div class="col-md-4">
      <div class="white-box profile-info-min-height">
        <div class="user-bg">
          <div class="overlay-box">
            <a href="<?php echo site_url('doctor/patient_edit/' . $row['patient_id']);?>"
              class="btn btn-outline btn-default btn-sm pull-right m-t-10 m-r-10">
              Edit
            </a>
            <div class="user-content">
              <img class="thumb-lg img-circle"
                src="<?php echo base_url('assets/backend/images/' . $img);?>">
              <h3 class="text-white"><?php echo $row['name']; ?></h3>
            </div>
          </div>
        </div>
        <div class="user-btm-box">
          <ul class="basic-list patient-info-list">
            <li>
              <span class="title"><?php echo get_phrase('name'); ?>:</span>
              <b class="text"><?php echo $row['name']; ?></b>
            </li>
            <li>
              <span class="title"><?php echo get_phrase('age'); ?>:</span>
              <b class="text">
                <?php echo ($row['age'] == NULL) ? get_phrase('not_available') : $row['age']; ?>
              </b>
            </li>
            <li>
              <span class="title"><?php echo get_phrase('gender'); ?>:</span>
              <b class="text">
                <?php echo ($row['gender'] == NULL) ? get_phrase('not_available') : $row['gender']; ?>
              </b>
            </li>
            <li>
              <span class="title"><?php echo get_phrase('phone'); ?>:</span>
              <b class="text"><?php echo $row['phone']; ?></b>
            </li>
            <li>
              <span class="title"><?php echo get_phrase('address'); ?>:</span>
              <b class="text">
                <?php echo ($row['address'] == NULL) ? get_phrase('not_available') : $row['address']; ?>
              </b>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="white-box profile-info-min-height">
        <ul class="nav customtab nav-tabs" role="tablist">

          <li role="presentation" class="nav-item">
            <a href="#medicalInfo" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
              <span class="visible-xs">
                <i class="ti-home"></i>
              </span>
              <span class="hidden-xs">
                <?php echo get_phrase('medical_info'); ?>
              </span>
            </a>
          </li>

          <li role="presentation" class="nav-item">
            <a href="#appointmentList" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
              <span class="visible-xs">
                <i class="ti-user"> </i></span> <span class="hidden-xs"><?php echo get_phrase('appointment_list'); ?></span></a></li>

          <li role="presentation" class="nav-item">
            <a href="#prescriptionList" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">
              <span class="visible-xs">
                <i class="ti-email"></i>
              </span> 
              <span class="hidden-xs"><?php echo get_phrase('prescription_list'); ?></span>
            </a>
          </li>

          <li role="presentation" class="nav-item"><a href="#billing" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs"><?php echo get_phrase('billing'); ?></span></a></li>

          <!-- files -->
        <li role="presentation" class="nav-item">
            <a href="#files" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">
              <span class="visible-xs">
                <i class="ti-email"></i>
              </span> 
              <span class="hidden-xs"><?php echo get_phrase('files'); ?></span>
            </a>
          </li>

        </ul>
        <!-- Tab panes -->
        <div class="tab-content p-t-20">
          <div role="tabpanel" class="tab-pane fade active in" id="medicalInfo">
            <?php if ($row['medical_info'] != ''): ?>
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody>
                    <?php
                      $medical_info = json_decode($row['medical_info']);
                      foreach ($medical_info as $val):
                    ?>
                    <tr>
                      <td width="40%"><?php echo get_phrase('blood_group'); ?></td>
                      <td><?php echo $val->blood_group; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('height'); ?></td>
                      <td><?php echo $val->height; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('weight'); ?></td>
                      <td><?php echo $val->weight; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('blood_pressure'); ?></td>
                      <td><?php echo $val->blood_pressure; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('pulse'); ?></td>
                      <td><?php echo $val->pulse; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('respiration'); ?></td>
                      <td><?php echo $val->respiration; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('allergy'); ?></td>
                      <td><?php echo $val->allergy; ?></td>
                    </tr>
                    <tr>
                      <td width="40%"><?php echo get_phrase('diet'); ?></td>
                      <td><?php echo $val->diet; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
            <?php if ($row['medical_info'] == ''): ?>
              <center>
                <h3><?php echo get_phrase('medical_info_unavailable'); ?></h3>
              </center>
            <?php endif; ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="appointmentList">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('schedule'); ?></th>
                    <th><?php echo get_phrase('visited'); ?></th>
                    <th><?php echo get_phrase('options'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $this->db->where('patient_id', $patient_id);
                    $this->db->order_by('timestamp', 'DESC');
                    $appointments = $this->db->get('appointment')->result_array();
                    foreach ($appointments as $appointment):
                      $prescription_id = $this->db->get_where('prescription', array(
                        'appointment_id' => $appointment['appointment_id']
                      ))->row()->prescription_id;
                  ?>
                  <tr>
                    <td><?php echo date('F j, Y', $appointment['timestamp']); ?></td>
                    <td><?php echo $appointment['schedule']; ?></td>
                    <td>
                      <?php if ($appointment['is_visited'] == 0): ?>
                        <div class="label label-table label-danger"><?php echo get_phrase('no'); ?></div>
                      <?php endif; ?>
                      <?php if ($appointment['is_visited'] == 1): ?>
                        <div class="label label-table label-success"><?php echo get_phrase('yes'); ?></div>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="<?php echo site_url('doctor/prescription_manage/' . $prescription_id);?>"
                        class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                        <?php echo get_phrase('manage_prescription'); ?>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane fade" id="prescriptionList">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('options'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $count = 1;
                    $this->db->where('patient_id', $row['patient_id']);
                    $this->db->order_by('timestamp', 'DESC');
                    $prescriptions = $this->db->get('prescription')->result_array();
                    foreach ($prescriptions as $pres):
                  ?>
                  <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo date('F j, Y', $pres['timestamp']); ?></td>
                    <td>
                      <a href="<?php echo site_url('doctor/prescription_manage/' . $pres['prescription_id']);?>"
                        class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                        <?php echo get_phrase('manage_prescription'); ?>
                      </a>
                      <button type="button" onclick="delete_prescription('<?php echo $pres['prescription_id'];?>')"
                        class="fcbtn btn btn-danger btn-outline btn-1d btn-sm">
                        <?php echo get_phrase('delete'); ?>
                      </button>
                    </td>
                  </tr>
                <?php
              endforeach;
              ?>
                </tbody>
              </table>
            </div>
          </div>


          <!-- files -->

          <div role="tabpanel" class="tab-pane fade" id="files">
            <div class="table-responsive">
              <table class="table table-bordered">
                  <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('type'); ?></th>
                    <th><?php echo get_phrase('file'); ?></th>
                    <th><?php echo get_phrase('options'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $count = 1;
                    $get_files = $this->db->get_where('file',array(
                                    'patient_id'=>$row['patient_id']))->result_array();
                    foreach ($get_files as $files):
                  ?>
                  <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $files['type']; ?></td>
                    <td><?php echo $files['file_name']; ?></td>
                    <td>
                      <a href="<?php echo site_url('doctor/file/download/' . $files['file_id']);?>"
                        class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                        <?php echo get_phrase('download'); ?>
                      </a>
                      <button type="button" onclick="delete_files('<?php echo $files['file_id'];?>')"
                        class="fcbtn btn btn-danger btn-outline btn-1d btn-sm">
                        <?php echo get_phrase('delete'); ?>
                      </button>
                    </td>
                  </tr>
                <?php
              endforeach;
              ?>
                </tbody>
              </table>
            </div>
          </div>
        
          <div role="tabpanel" class="tab-pane fade" id="billing">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>#</th>
                      <th><?php echo get_phrase('date');?></th>
                      <th><?php echo get_phrase('invoice_code');?></th>
                      <th><?php echo get_phrase('amount');?></th>
                      <th><?php echo get_phrase('status');?></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $count = 1;
                    $this->db->where('patient_id', $row['patient_id']);
                    $invoices = $this->db->get('invoice')->result_array();
                    foreach ($invoices as $invoice):
                ?>
                  <tr>
                      <td><?php echo $count++;?></td>
                    <td><?php echo date('F j, Y', $invoice['timestamp']); ?></td>
                    <td><?php echo $invoice['code'];?></td>
                    <td><?php echo $invoice['charge'];?></td>
                      <td>
                          <?php
                          $status = $invoice['status'] == 1 ? get_phrase('paid') : get_phrase('unpaid');
                          ?>
                          <span class="label label-<?php echo $invoice['status'] == 1 ? 'success' : 'danger'; ?>">
                    <?php echo $status; ?>
                  </span>
                      </td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
  endforeach;
?>


<script type="text/javascript">

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
      swal("Deleted!", "Prescription deleted", "success");
      setTimeout(function() {
        window.location = "<?php echo site_url('doctor/prescription/delete/');?>" + prescription_id;
      }, 1000);
    });
  }

  function delete_files(file_id) {
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
      swal("Deleted!", "Prescription deleted", "success");
      setTimeout(function() {
        window.location = "<?php echo site_url('doctor/file/delete/');?>" + file_id;
      }, 1000);
    });
  }

</script>
