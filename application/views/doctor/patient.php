<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/patient_add');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_patient');?>
    </a>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo get_phrase('patient_list'); ?></h3>
      <div class="table-responsive">
        <table id="myTable" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo get_phrase('name'); ?></th>
              <th><?php echo get_phrase('phone'); ?></th>
              <th><?php echo get_phrase('age'); ?></th>
              <th><?php echo get_phrase('address'); ?></th>
             
              <th><?php echo get_phrase('options'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              $this->db->order_by('patient_id', 'DESC');
              $patients = $this->db->get('patient')->result_array();
              foreach ($patients as $row):
            ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td>
                <a href="<?php echo site_url('doctor/patient_profile/' . $row['patient_id']);?>">
                  <?php echo $row['name']; ?>
                </a>
              </td>
              <td><?php echo $row['phone']; ?></td>
              <td>
                <?php echo $row['age'] == NULL ? '' : $row['age']; ?>
              </td>
              <td>
                <?php echo $row['address'] == NULL ? '' : $row['address']; ?>
              </td>

           
                <td>
                    <a href="<?php echo site_url('doctor/patient_profile/' . $row['patient_id']);?>"
                        class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                        <?php echo get_phrase('manage_patient');?>
                    </a>
                </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
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
</script>
