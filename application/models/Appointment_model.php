<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function create_appointment()
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
		$data_appointment['timestamp']  = strtotime($this->input->post('timestamp'));
		$data_appointment['schedule']   = $this->input->post('schedule');
		$data_appointment['patient_id'] = $patient_id;
		$data_appointment['user_id']    = $this->session->userdata('login_user_id');
		$data_appointment['chamber_id'] = get_settings('chamber_id');
		$data_appointment['is_visited'] = 0;
		$this->db->insert('appointment', $data_appointment);
		return TRUE;
	}

	function insert_appointment($data)
	{
		$this->db->insert('appointment', $data);
		//return $this->db->insert_id();
	}

	function get_appointment_by_day($timestamp)
	{
		$query = $this->db->get_where('appointment', array(
			'timestamp' => $timestamp,
			'chamber_id' => $this->session->userdata('chamber_id')
		));
		return $query;
	}

	function delete_appointment($appointment_id)
	{
		$this->db->where('appointment_id', $appointment_id);
		$this->db->delete('appointment');
	}

	function create_or_get_prescription($appointment_id, $patient_id)
	{
		$query = $this->db->get_where('prescription', array(
			'appointment_id' => $appointment_id
		));

		if ($query->num_rows() <= 0) {
			$data['appointment_id'] = $appointment_id;
			$data['patient_id']     = $patient_id;
			$data['chamber_id']     = $this->session->userdata('chamber_id');
			$this->db->insert('prescription', $data);
			$prescription_id = $this->db->insert_id();

			$query = $this->db->get_where('prescription', array(
				'prescription_id' => $prescription_id
			));
		}
		return $query->row();
	}

}