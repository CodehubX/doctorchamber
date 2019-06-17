<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_patient_name_by_id')) {
	function get_patient_name_by_id($patient_id)
	{
		if ($patient_id == 0)
			return '';

		$CI    = get_instance();
		$query = $CI->db->get_where('patient', array(
			'patient_id' => $patient_id
		));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->name;
		} else {
			return '';
		}
	}
}


if (!function_exists('get_patient_phone_by_id')) {
	function get_patient_phone_by_id($patient_id)
	{
		if ($patient_id == 0)
			return '';

		$CI    = get_instance();
		$query = $CI->db->get_where('patient', array(
			'patient_id' => $patient_id
		));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->phone;
		} else {
			return '';
		}
	}
}