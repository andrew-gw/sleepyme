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
		$this->TPL['username'] = "";
		$this->TPL['firstname_'] = "";
	}

	public function index()
	{
		$this->TPL['msg'] = "Contact Us Form";
		$this->TPL['firstname_'] = "Barthalomew Benjamin"; //populate form data

		$this->template->show('contact', $this->TPL);
	}

	// Form validation class
	public function post()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'User name', 'callback_username_check');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|integer');
		$this->form_validation->set_rules('program', 'Programs', 'required');

		if ($this->form_validation->run() == FALSE):
			$this->TPL['msg'] = 'Errors still in form';
			$this->template->show('contact' ,$this->TPL);
			return;
		endif;

		$this->TPL['msg'] = "Thank you for your interest.";
		$this->template->show('contact' ,$this->TPL);
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

		return TRUE; // all good
	}

	function mailMe()
	{
		$this->load->library('email');

		$this->email->from('bruch@csunix.mohawkcollege.ca', 'Big Guy');
		$this->email->to('000306746@csunix.mohawkcollege.ca');

		$this->email->subject('Email From SleepyMe Contact From');
		$this->email->message('IP Address of Sender: '. $this->input->ip_address());

		if ($this->email->send() == false):
			$this->TPL['msg'] = "Email Failed.... <br>";
		else:
			$this->TPL['msg'] = "Email sent. Check it with Pine";
		endif;

		$this->TPL['msg'] .= "<br>". $this->email->print_debugger();
		$this->template->show('contact', $this->TPL);
	}
}
?>