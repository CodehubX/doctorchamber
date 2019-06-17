<div class="row">
  <div class="col-sm-12">
  <a href="<?php echo site_url('doctor/billing');?>" 
    class="btn btn-success">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_invoice_list'); ?>
    </a>
    <button type="button" class="btn btn-info pull-right"
      onclick="print_div()">
      <i class="fa fa-print"></i> &nbsp; <?php echo get_phrase('print_invoice'); ?>
    </button>
  </div>
</div>


<?php
  $info = $this->db->get_where('invoice', array(
    'invoice_id' => $invoice_id
  ))->result_array();
  foreach ($info as $row):
?>
<div class="invoice-print">
  <div class="row m-t-10">
    <div class="col-md-12">
      <div class="white-box">
        <h3><b><?php echo get_phrase('invoice'); ?></b> <span class="pull-right"># <?php echo $row['code']; ?></span></h3>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="pull-left">
              <address>
                <h3>
                    <b class="text-danger">
                        <?php echo get_user_info_by_id($row['user_id'], 'name');?>
                    </b>
                </h3>
                <p class="text-muted m-l-5">
                    <?php echo get_phrase('chamber').' - '. $this->db->get_where('chamber', array(
                            'chamber_id' => $row['chamber_id']
                        ))->row()->name;?> <br>
                    <?php echo $this->db->get_where('chamber', array(
                            'chamber_id' => $row['chamber_id']
                        ))->row()->address;?><br>
                    <?php echo get_phrase('email').' - '. get_user_info_by_id($row['user_id'],'email');?> <br>
                    <?php echo get_phrase('phone').' - '. get_user_info_by_id($row['user_id'],'phone');?>
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
          <div class="col-md-12">
            <div class="table-responsive m-t-40">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th><?php echo get_phrase('info'); ?></th>
                    <th class="text-right"><?php echo get_phrase('charge'); ?></th>
                    <th class="text-right"><?php echo get_phrase('total'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td><?php echo $row['title']; ?></td>
                    <td class="text-right"><?php echo get_settings('currency');?> <?php echo $row['charge'];?></td>
                    <td class="text-right"><?php echo get_settings('currency');?> <?php echo $row['charge'];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="pull-right m-t-30 text-right">
              <hr>
              <h3><b><?php echo get_phrase('total'); ?> :</b> <?php echo get_settings('currency');?> <?php echo $row['charge'];?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script type="text/javascript">
  function print_div() {
    $('.invoice-print').printThis();
  }
</script>

