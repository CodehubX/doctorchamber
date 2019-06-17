<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Patient_model extends CI_Model
{

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}

	function edit_patient($patient_id)
	{
		$data['name']    = $this->input->post('name');
		$data['age']     = $this->input->post('age');
		$data['phone']   = $this->input->post('phone');
		$data['gender']  = $this->input->post('gender');
		$data['address'] = $this->input->post('address');

		$medical_data                   = array();
		$medical_info['blood_group']    = $this->input->post('blood_group');
		$medical_info['height']         = $this->input->post('height');
		$medical_info['weight']         = $this->input->post('weight');
		$medical_info['blood_pressure'] = $this->input->post('blood_pressure');
		$medical_info['pulse']          = $this->input->post('pulse');
		$medical_info['respiration']    = $this->input->post('respiration');
		$medical_info['allergy']        = $this->input->post('allergy');
		$medical_info['diet']           = $this->input->post('diet');
		array_push($medical_data, $medical_info);

		$data['medical_info'] = json_encode($medical_data);

		// check if the mobile number is already in use by another user
		if ($this->validation_model->validate_phone_number($data['phone'], $patient_id) == FALSE) 
		{
			return 'failed';
		} 
		else 
		{
			$this->db->where('patient_id', $patient_id);
			$this->db->update('patient', $data);

			//uploading file using codeigniter upload library
	        $files = $_FILES['file_name'];
	        
			
				$this->load->library('upload');
		        $config['upload_path']   =  'uploads/file/';
		        $config['allowed_types'] =  '*';
		        $ran= (rand(10,100000));
		        $_FILES['file_name']['name']     = $ran.$files['name'];
		        $_FILES['file_name']['type']     = $files['type'];
		        $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
		        $_FILES['file_name']['size']     = $files['size'];
		        $this->upload->initialize($config);
		        $this->upload->do_upload('file_name');

		        $file_data['file_name'] =$_FILES['file_name']['name'];
		        $file_data['type'] = 'Patient';
				$file_data['patient_id'] = $patient_id;
				if($files['name'] != NULL)
				{
					$this->db->insert('file', $file_data); 
				}
				
			return 'success';
		}
			
	}

	function get_patients_by_account()
	{
		$query = $this->db->get('patient');

		return $query;

	}

	function is_phone_exists($phone)
	{
		$query = $this->db->get_where('patient', array(
			'phone' => $phone
		));
		return $query->num_rows();
	}

	function insert_patient($data)
	{

		$this->db->insert('patient', $data);
		return $this->db->insert_id();
	}

	function get_patient_by_id($patient_id)
	{
		$query = $this->db->get_where('patient', array(
			'patient_id' => $patient_id
		));

		return $query->row();
	}

}
