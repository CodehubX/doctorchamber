<div class="row">
  <div class="col-lg-12">
    <div class="white-box">
      <div class="row">
        <div class="col-md-6">
          <h3 class="box-title m-b-0"><?php echo $page_title . ' - ' . date('F j, Y' , $timestamp); ?></h3>
        </div>
        <div class="col-md-2">
          <a href="<?php echo site_url('doctor/invoice_new');?>"
            class="fcbtn btn btn-info btn-outline btn-1d">
            <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('create_invoice'); ?>
          </a>
        </div>
        <div class="col-md-4">
          <div class="input-group" style="z-index: 1000;">
            <span class="input-group-addon"><i class="icon-calender"></i></span>
            <input type="text" class="form-control mydatepicker"
              value="<?php echo date('d-m-Y' , $timestamp);?>">
          </div>
        </div>
        <div class="table-responsive m-t-40">
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo get_phrase('code'); ?></th>
                <th><?php echo get_phrase('patient'); ?></th>
                <th><?php echo get_phrase('amount'); ?></th>
                <th><?php echo get_phrase('status'); ?></th>
                <th><?php echo get_phrase('options'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $count = 1;
                $chamber_id = get_settings('chamber_id');
                $this->db->where('timestamp', $timestamp);
                $this->db->where('chamber_id', $chamber_id);
                $this->db->order_by('invoice_id', 'DESC');
                $invoices = $this->db->get('invoice')->result_array();
                foreach ($invoices as $row):
              ?>
              <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td>
                  <a href="<?php echo site_url('doctor/patient_profile/' . $row['patient_id']);?>">
                    <?php echo get_patient_info_by_id($row['patient_id'], 'name'); ?>
                  </a>
                </td>
                <td><?php echo get_settings('currency');?> <?php echo $row['charge']; ?></td>
                <td>
                  <?php
                    $status = $row['status'] == 1 ? get_phrase('paid') : get_phrase('unpaid');
                  ?>
                  <span class="label label-<?php echo $row['status'] == 1 ? 'success' : 'danger'; ?>">
                    <?php echo $status; ?>
                  </span>
                </td>
                <td>
                  <a href="<?php echo site_url('doctor/invoice_view/' . $row['invoice_id']);?>"
                    class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                    <?php echo get_phrase('view_invoice'); ?>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
      <div class="row m-t-20">
        <div class="col-sm-12">
          <blockquote>
            <?php
              $bill = $this->billing_model->get_total_bill($timestamp);
              $chamber = $this->db->get_where('chamber', array('chamber_id' => get_settings('chamber_id')))->row()->name;
              echo get_phrase('total_billing_amount_for') . ' <strong>' . date('F j, Y', $timestamp) . '</strong>' . ' - ' . '<strong>'.get_settings('currency').' '. $bill.'</strong>';
              echo '<br>' . get_phrase('chamber') . ' - ' . $chamber;
            ?>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    init_datatable();
    init_datepicker();
    apply_filter();
  });

  function apply_filter() {
    $('.mydatepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    }).on('changeDate', function (ev) {
      load_invoices();
    });
  }

  function load_invoices() {
    var selected_date = $('.mydatepicker').val();
    $.ajax({
      url: '<?php echo site_url('doctor/apply_invoice_filter');?>/' + selected_date,
      success: function(response) {
        jQuery('#invoice_list').html(response);
        //init_datatable();
      }
    });
  }

  function init_datatable() {
    $('#myTable').DataTable({
      "pageLength": 50
    });
  }

  function init_datepicker() {
    $('.mydatepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    });
  }

</script>
