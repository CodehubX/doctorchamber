<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prescription_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function create_prescription()
	{
		$patient_type = $this->input->post('patient_type');
		if ($patient_type == 'new') {
			$data_patient['name']   = $this->input->post('name');
			$data_patient['phone']  = $this->input->post('phone');
			$data_patient['gender'] = $this->input->post('gender');
			$data_patient['age']    = $this->input->post('age');
			if ($this->validation_model->validate_phone_number($data_patient['phone']) == FALSE) {
				return FALSE;
			} else {
				$this->db->insert('patient', $data_patient);
				$patient_id = $this->db->insert_id();
			}
		} else {
			$patient_id = $this->input->post('patient_id');
		}
		$data_pres['symptom']   = $this->input->post('symptom');
		$data_pres['diagnosis'] = $this->input->post('diagnosis');

		$medicine_names        = $this->input->post('medicine_name');
		$medicine_notes        = $this->input->post('medicine_note');
		$data_pres['medicine'] = $this->encode_medicines($medicine_names, $medicine_notes);

		$test_names        = $this->input->post('test_name');
		$test_notes        = $this->input->post('test_note');
		$data_pres['test'] = $this->encode_tests($test_names, $test_notes);

		$data_pres['patient_id'] = $patient_id;
		$data_pres['chamber_id'] = get_settings('chamber_id');
		$data_pres['timestamp']  = strtotime(date('Y-m-d'));

		$this->db->insert('prescription', $data_pres);



		return TRUE;
	}

	function manage_prescription($prescription_id)
	{
		$data_patient['name']   = $this->input->post('name');
		$data_patient['age']    = $this->input->post('age');
		$data_patient['gender'] = $this->input->post('gender');
		$data_patient['phone']  = $this->input->post('phone');

		$patient_id = $this->db->get_where('prescription', array(
			'prescription_id' => $prescription_id
		))->row()->patient_id;

		if ($this->validation_model->validate_phone_number($data_patient['phone'], $patient_id) == FALSE) {
			return FALSE;
		} else {
			$this->db->where('patient_id', $patient_id);
			$this->db->update('patient', $data_patient);
		}
		$data_pres['symptom']   = $this->input->post('symptom');
		$data_pres['diagnosis'] = $this->input->post('diagnosis');

		$medicine_names        = $this->input->post('medicine_name');
		$medicine_notes        = $this->input->post('medicine_note');
		$data_pres['medicine'] = $this->encode_medicines($medicine_names, $medicine_notes);

		$test_names        = $this->input->post('test_name');
		$test_notes        = $this->input->post('test_note');
		$data_pres['test'] = $this->encode_tests($test_names, $test_notes);

		$data_pres['patient_id'] = $patient_id;
		$data_pres['chamber_id'] = get_settings('chamber_id');
		$data_pres['timestamp']  = strtotime(date('Y-m-d'));

		$this->db->where('prescription_id', $prescription_id);
		$this->db->update('prescription', $data_pres);



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

        $file_data['file_name'] = $_FILES['file_name']['name'];
        $file_data['type'] = 'Prescription';
        $file_data['patient_id'] = $patient_id;
		$file_data['prescription_id'] = $prescription_id;
		
		if($files['name'] != NULL)
		{
			$this->db->insert('file', $file_data); 
		}
		
		return TRUE;
	}

	function encode_medicines($medicine_names, $medicine_notes)
	{
		$number_of_medicine_entries = sizeof($medicine_names);
		$medicine_entries           = array();
		for ($i = 0; $i < $number_of_medicine_entries; $i++) {
			$new_medicine_entry = array(
				'medicine_name' => $medicine_names[$i],
				'note' => $medicine_notes[$i]
			);
			array_push($medicine_entries, $new_medicine_entry);
		}
		return json_encode($medicine_entries);
	}

	function encode_tests($test_names, $test_notes)
	{
		$number_of_test_entries = sizeof($test_names);
		$test_entries           = array();
		for ($i = 0; $i < $number_of_test_entries; $i++) {
			$new_test_entry = array(
				'test_name' => $test_names[$i],
				'note' => $test_notes[$i]
			);
			array_push($test_entries, $new_test_entry);
		}
		return json_encode($test_entries);
	}

	function add_prescription_for_appointment($appointment_id)
	{
		$pres_data['appointment_id'] = $appointment_id;
		$pres_data['patient_id']     = $this->db->get_where('appointment', array(
			'appointment_id' => $appointment_id
		))->row()->patient_id;
		$pres_data['chamber_id']     = get_settings('chamber_id');
		$pres_data['timestamp']      = strtotime(date('Y-m-d'));
		$this->db->insert('prescription', $pres_data);
		$prescription_id = $this->db->insert_id();
		return $prescription_id;
	}

}