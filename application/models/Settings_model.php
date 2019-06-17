<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function update_settings()
	{

		$data['description'] = $this->input->post('doctor_name');
		$this->db->where('type', 'doctor_name');
		$this->db->update('settings', $data);

		$data['description'] = $this->input->post('doctor_email');
		$this->db->where('type', 'doctor_email');
		$this->db->update('settings', $data);


		$data['description'] = $this->input->post('purchase_code');
		$this->db->where('type', 'purchase_code');
		$this->db->update('settings', $data);

		$data['description'] = $this->input->post('chamber_id');
		$this->db->where('type', 'chamber_id');
		$this->db->update('settings', $data);

		$data['description'] = $this->input->post('language');
		$this->db->where('type', 'language');
		$this->db->update('settings', $data);

		$data['description'] = $this->input->post('currency');
		$this->db->where('type', 'currency');
		$this->db->update('settings', $data);

		if ($_FILES['logo']['name'] != '') {
			$data['description'] = $_FILES['logo']['name'];
			$this->db->where('type', 'logo');
			$this->db->update('settings', $data);
			move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/' . $_FILES['logo']['name']);
		}
	}

}