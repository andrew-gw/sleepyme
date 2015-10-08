<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
	var $TPL = array();

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form')); // can also autoload
		$this->load->helper('security');

		$this->TPL['title'] = "Contact";
		$this->TPL['errors'] = false;
		$this->TPL['submitted'] = false;
		$this->TPL['username'] = "";
		$this->TPL['firstname_'] = "";
		$this->TPL['programOptions'] = array(
			"" => "Please Select One",
			"technology" => "Technology",
			"business" => "Business",
			"environment" => "Environment"
			);
	}

	public function index()
	{
		// $this->TPL['msg'] = "Contact Us Form";
		$this->TPL['firstname_'] = "Barthalomew Benjamin";

		$this->template->show('contact', $this->TPL);
	}

	// Form validation class
	public function post()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'User name', 'callback_username_check|xss_clean');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[3]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('program', 'Programs', 'required');

		if ($this->form_validation->run() == FALSE):
			$this->TPL['errors'] = true;
			$this->TPL['msg'] = 'Please fill out the form';
			$this->template->show('contact' ,$this->TPL);
			return;
		endif;

		$this->mailMe();
		// $this->TPL['submitted'] = true;
		// $this->TPL['msg'] = "Thanks for your feedback!";
		// $this->template->show('contact' ,$this->TPL);
	}

	// Callback function for form validation
	function username_check($str)
	{
		$str = trim($str);
		if (empty($str) == true):
			$this->form_validation->set_message('username_check', '%s is required field.');
			return FALSE;
		endif;

		if (preg_match('/^[a-zA-z09]{3,9}$/',$str) == false):
			$this->form_validation->set_message('username_check', 'Only character/numbers allowed 3-9 chars');
			return FALSE;
		endif;

		return TRUE;
	}

	function mailMe()
	{
		if (! ini_get('date.timezone'))
		{
			date_default_timezone_set('GMT');
		}

		$this->load->library('email');

		$this->email->from('000306746@csunix.mohawkcollege.ca', 'SleepyMe Hotel');
		$this->email->to('000306746@csunix.mohawkcollege.ca');

		$this->email->subject('SleepyMe Contact From');
		$this->email->message(
			"IP: " . $this->input->ip_address() .
			"\r\nfname: " . $this->input->post('username') .
			"\r\nfname: " . $this->input->post('firstname') .
			"\r\nlname: " . $this->input->post('lastname') .
			"\r\nage: " . $this->input->post('age') .
			"\r\nprogram: " . $this->input->post('program')
		);

		if ($this->email->send() == false):
			$this->TPL['errors'] = true;
			$this->TPL['msg'] = "Sorry, failed to send e-mail!";
		else:
			$this->TPL['submitted'] = true;
			$this->TPL['msg'] = "Thank you for your feedback!";
		endif;

		$this->template->show('contact', $this->TPL);
	}

}
?>