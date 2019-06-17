<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Email_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function password_reset_email($new_password = '', $email = '')
	{

		$email_msg = "Your request for password reset was successfull.<br />";
		$email_msg .= "Your new password is : " . $new_password . "<br />";

		$email_sub = "Password reset request";
		$email_to  = $email;
		$this->do_email($email_msg, $email_sub, $email_to);
	}

	function do_email($msg = NULL, $sub = NULL, $to = NULL, $from = NULL)
	{

		$config              = array();
		$config['useragent'] = "CodeIgniter";
		$config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
		$config['protocol']  = "smtp";
		$config['smtp_host'] = "localhost";
		$config['smtp_port'] = "25";
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['newline']   = "\r\n";
		$config['wordwrap']  = TRUE;

		$this->load->library('email');

		$this->email->initialize($config);

		$doctor_name = $this->db->get_where('settings', array(
			'type' => 'doctor_name'
		))->row()->description;
		if ($from == NULL)
			$from = $this->db->get_where('settings', array(
				'type' => 'doctor_email'
			))->row()->description;

		$this->email->from($from, $doctor_name);
		$this->email->from($from, $doctor_name);
		$this->email->to($to);
		$this->email->subject($sub);

		$this->email->message($msg);

		$this->email->send();

		//echo $this->email->print_debugger();
	}
}