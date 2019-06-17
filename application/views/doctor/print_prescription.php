<div class="row">
  <div class="col-sm-12">
    <button type="button" class="btn btn-info"
      onclick="print_div()">
      <i class="fa fa-print"></i> &nbsp; <?php echo get_phrase('print_prescription'); ?>
    </button>
  </div>
</div>


<?php
  $info = $this->db->get_where('prescription', array(
    'prescription_id' => $prescription_id
  ))->result_array();
  foreach ($info as $row):
?>
<div class="prescription-print">
  <div class="row m-t-10">
    <div class="col-md-12">
      <div class="white-box">
        <h3><b><?php echo get_phrase('prescription'); ?></b></h3>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="pull-left">
              <address>
                <h3>
                    <b class="text-danger">
                        <?php echo get_user_info_by_id($this->session->userdata('login_user_id'), 'name');?>
                    </b>
                </h3>
                <p class="text-muted m-l-5">
                    <?php echo get_phrase('chamber').' - '. $this->db->get_where('chamber', array(
                            'chamber_id' => $row['chamber_id']
                        ))->row()->name;?> <br>
                    <?php echo $this->db->get_where('chamber', array(
                            'chamber_id' => $row['chamber_id']
                        ))->row()->address;?><br>
                    <?php echo get_phrase('email').' - '. get_user_info_by_id($this->session->userdata('login_user_id'),'email');?> <br>
                    <?php echo get_phrase('phone').' - '. get_user_info_by_id($this->session->userdata('login_user_id'),'phone');?>
                </p>
              </address>
            </div>
            <div class="pull-right text-right">
              <address>
                <h3><?php echo get_phrase('to'); ?>,</h3>
                <h4 class="font-bold">
                  <?php echo get_patient_info_by_id($row['patient_id'], 'name'); ?>
                </h4>
                <p class="text-muted m-l-30">
                  <strong><?php echo get_phrase('phone'); ?></strong> : <?php echo get_patient_info_by_id($row['patient_id'], 'phone'); ?>
                </p>
                <p class="m-t-30">
                  <b> <?php echo get_phrase('date'); ?> :</b> <i class="fa fa-calendar"></i>
                  <?php echo date('F j, Y', $row['timestamp']); ?>
                </p>
              </address>
            </div>
          </div>
      </div>
      <div class="row">
      	<div class="col-md-12">
            <h3><?php echo get_phrase('symptoms');?></h3>
            <p><?php echo $row['symptom'];?></p>
          </div>
      </div>
      <div class="row">
      	<div class="col-md-12">
            <h3><?php echo get_phrase('diagnosis');?></h3>
            <p><?php echo $row['diagnosis'];?></p>
          </div>
      </div>
      <div class="row">
      	<div class="col-md-6">
      		<h3><?php echo get_phrase('tests');?></h3>
      		<?php
      			$tests = $row['test'];
      			if ($tests != '') {
      				$test_data = json_decode($tests);
      		?>
      		<div class="table-responsive">
      			<table class="table table-bordered table-hover">
      				<thead>
      					<tr>
      						<th><?php echo get_phrase('name');?></th>
      						<th><?php echo get_phrase('notes');?></th>
      					</tr>
      				</thead>
      				<tbody>
      					<?php for ($i = 0; $i < count($test_data); $i++):?>
      						<tr>
	      						<td><?php echo $test_data[$i]->test_name;?></td>
	      						<td><?php echo $test_data[$i]->note;?></td>
      						</tr>
      					<?php endfor;?>
      				</tbody>
      			</table>
      		</div>
      		<?php } else { ?>
      			<blockquote><?php echo get_phrase('no_test');?></blockquote>
      		<?php } ?>
      	</div>
      	<div class="col-md-6">
      		<h3><?php echo get_phrase('medicines');?></h3>
      		<?php
      			$medicines = $row['medicine'];
      			if ($medicines != '') {
      				$medicine_data = json_decode($medicines);
      		?>
      		<div class="table-responsive">
      			<table class="table table-bordered table-hover">
      				<thead>
      					<tr>
      						<th><?php echo get_phrase('name');?></th>
      						<th><?php echo get_phrase('notes');?></th>
      					</tr>
      				</thead>
      				<tbody>
      					<?php for ($i = 0; $i < count($medicine_data); $i++):?>
      						<tr>
	      						<td><?php echo $medicine_data[$i]->medicine_name;?></td>
	      						<td><?php echo $medicine_data[$i]->note;?></td>
      						</tr>
      					<?php endfor;?>
      				</tbody>
      			</table>
      		</div>
      		<?php } else { ?>
      			<blockquote><?php echo get_phrase('no_medicine');?></blockquote>
      		<?php } ?>
      	</div>
      </div>
      <hr>
    </div>
  </div>
</div>
<?php endforeach; ?>
</div>
<script type="text/javascript">
	
	$(document).ready(function() {
		print_div();
	});

  function print_div() {
    $('.prescription-print').printThis();
  }
</script>

