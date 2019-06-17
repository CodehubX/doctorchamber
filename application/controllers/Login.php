<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	// constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
	}

	public function index()
	{
		if ($this->session->userdata('doctor_login') == 1)
			redirect(site_url('doctor'), 'refresh');
		$this->load->view('login');
	}

	function do_login()
	{
		$response    = array();
		//Recieving post input of email, password from ajax request
		$email_phone = $_POST["email_phone"];
		$password    = $_POST["password"];

		//Validating login
		$login_status = $this->validate_login($email_phone, $password);
		if ($login_status == 'invalid') {
			$this->session->set_flashdata('error_message', 'Invalid login! Please enter correct email and password.');
		}
		redirect(site_url('login'), 'refresh');
	}

	function validate_login($email_phone = '', $password = '')
	{
		$credential = array(
			'email' => $email_phone,
			'password' => sha1($password)
		);
		// Checking login credential for users
		$query      = $this->db->get_where('users', $credential);
		if ($query->num_rows() <= 0) {
			$credential  = array(
				'phone' => $email_phone,
				'password' => sha1($password)
			);
			$phone_query = $this->db->get_where('users', $credential);
			if ($phone_query->num_rows() > 0)
				$query = $phone_query;
		}

		if ($query->num_rows() > 0) {
			$row = $query->row();

			if ($row->user_type == 1)
				$user_type = 'doctor';
			else if ($row->user_type == 2)
				$user_type = 'staff';

			$this->session->set_userdata($user_type . '_login', '1');
			$this->session->set_userdata('login_type', $user_type);
			$this->session->set_userdata('login_user_id', $row->user_id);
			$this->session->set_userdata('name', $row->name);
			$this->session->set_userdata('user_type', $row->user_type);
			$this->session->set_userdata('phone', $row->phone);
			$this->session->set_userdata('user_email', $row->email);

			$data['last_login'] = time();
			$this->db->where('user_id', $row->user_id);
			$this->db->update('users', $data);

			return 'success';
		} else {
			return 'invalid';
		}

	}

	function forgot_password()
	{
		$this->load->view('forgot_password');
	}

	function reset_password()
	{
		$email = $this->input->post('email');
		$query = $this->db->get_where('users', array(
			'email' => $email
		));
		if ($query->num_rows() > 0) {
			$new_password    = substr(md5(rand(100000000, 20000000000)), 0, 7);
			$password_hashed = sha1($new_password);
			$this->db->where('email', $email);
			$this->db->update('users', array(
				'password' => $password_hashed
			));
			$this->email_model->password_reset_email($new_password, $email);
			$this->session->set_flashdata('success_message', get_phrase('please_check_your_email_for_new_password'));
			redirect(site_url('login/forgot_password'), 'refresh');
		} else {
			$this->session->set_flashdata('error_message', get_phrase('invalid_email_address'));
			redirect(site_url('login/forgot_password'), 'refresh');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'), 'refresh');
	}

	public function useremail_check($str)
	{
		$res = $this->user_model->is_email_exists($str);
		if ($res > 0) {
			$this->form_validation->set_message('useremail_check', get_phrase('email_in_use'));
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function phone_check($str)
	{
		$res = $this->user_model->is_phone_exists($str);
		if ($res > 0) {
			$this->form_validation->set_message('phone_check', get_phrase('mobile_in_use'));
			return FALSE;
		} else {
			return TRUE;
		}
	}

}