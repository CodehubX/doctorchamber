<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function create_invoice()
	{
		$patient_type = $this->input->post('patient_type');
		if ($patient_type == 'new') {
			$data_patient['name']  = $this->input->post('name');
			$data_patient['phone'] = $this->input->post('phone');
			if ($this->validation_model->validate_phone_number($data_patient['phone']) == FALSE) {
				return FALSE;
			} else {
				$this->db->insert('patient', $data_patient);
				$patient_id = $this->db->insert_id();
			}
		} else {
			$patient_id = $this->input->post('patient_id');
		}
		$data_invoice['title']      = $this->input->post('title');
		$data_invoice['code']       = $this->input->post('code');
		$data_invoice['charge']     = $this->input->post('charge');
		$data_invoice['patient_id'] = $patient_id;
		$data_invoice['status']     = $this->input->post('status');
		;
		$data_invoice['user_id']    = $this->session->userdata('login_user_id');
		$data_invoice['chamber_id'] = get_settings('chamber_id');
		$data_invoice['timestamp']  = strtotime(date('d-m-Y'));

		$this->db->insert('invoice', $data_invoice);
		$invoice_id = $this->db->insert_id();
		return $invoice_id;
	}

	function get_total_bill($timestamp)
	{
		$chamber_id = get_settings('chamber_id');
		$status     = 1;
		$match      = array(
			'chamber_id' => $chamber_id,
			'timestamp' => $timestamp,
			'status' => $status
		);
		$total_bill = 0;
		$invoices   = $this->db->get_where('invoice', $match)->result_array();
		foreach ($invoices as $row) {
			$total_bill = $total_bill + $row['charge'];
		}
		return $total_bill;
	}

}