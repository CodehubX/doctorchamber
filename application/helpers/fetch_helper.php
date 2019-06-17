<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_settings')) {
	function get_settings($type = '')
	{
		$CI = get_instance();
		if ($type != '') {
			$result = $CI->db->get_where('settings', array(
				'type' => $type
			))->row()->description;
			return $result;
		} else {
			return 'missing argument (settings type)';
		}
	}
}

if (!function_exists('get_user_info_by_id')) {
	function get_user_info_by_id($user_id = '', $info = '')
	{
		$CI = get_instance();
		if ($user_id != '' && $info != '') {
			$result = $CI->db->get_where('users', array(
				'user_id' => $user_id
			))->row()->$info;
			return $result;
		} else {
			return 'missing arguments (user id / info)';
		}
	}
}

if (!function_exists('get_patient_info_by_id')) {
	function get_patient_info_by_id($patient_id = '', $info = '')
	{
		$CI = get_instance();
		if ($patient_id != '' && $info != '') {
			$result = $CI->db->get_where('patient', array(
				'patient_id' => $patient_id
			))->row()->$info;
			return $result;
		} else {
			return 'missing arguments (patient id / info)';
		}
	}
}

if (!function_exists('get_chambers_of_account')) {
	function get_chambers_of_account()
	{
		$CI     = get_instance();
		$result = $CI->db->get('chamber')->result_array();
		return $result;

	}
}

if (!function_exists('get_appointments')) {
	function get_appointments($chamber_id = '', $timestamp = '')
	{
		$CI = get_instance();
		if ($chamber_id != '' && $timestamp != '') {
			$CI->db->where('chamber_id', $chamber_id);
			$CI->db->where('timestamp', $timestamp);
			$CI->db->order_by('appointment_id', 'ASC');
			$result = $CI->db->get('appointment')->result_array();
			return $result;
		} else {
			return 'missing argument (chamber id, timestamp)';
		}
	}
}