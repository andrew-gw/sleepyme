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
	}

	public function index()
	{
		$this->template->show('contact', $this->TPL);
	}

	// Form validation class
	public function post()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'callback_validate_name|trim');
		$this->form_validation->set_rules('postal', 'Postal Code', 'callback_validate_postal|trim');
		$this->form_validation->set_rules('phone', 'Phone', 'callback_validate_phone|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'callback_validate_email|trim');
		$this->form_validation->set_rules('comment', 'Comment', 'required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE):
			$this->TPL['errors'] = true;
			$this->TPL['msg'] = 'This form is incomplete';
			$this->template->show('contact' ,$this->TPL);
			return;
		endif;

		redirect('contact/customerCommentSent', $this->input->post());
		// $this->customerCommentSent();
	}

	function validate_name($str)
	{
		$str = trim($str);
		if (empty($str) == true):
			$this->form_validation->set_message('validate_name', '%s is required');
			return FALSE;
		endif;

		if (! preg_match('/^[a-zA-Z]+(?:(\s|\–|\-)[a-zA-Z]+)+$/', $str)):
			$this->form_validation->set_message('validate_name', 'Name must be two or more words and contain only letters');
			return FALSE;
		endif;

		return TRUE;
	}

	function validate_postal($str)
	{
		$str = trim($str);
		if (empty($str) == true):
			$this->form_validation->set_message('validate_postal', '%s is required');
			return FALSE;
		endif;

		if (! preg_match('/^[ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvxy][0-9][ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvxy] ?[0-9][ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvxy][0-9]$/', $str)):
			$this->form_validation->set_message('validate_postal', 'Invalid postal code');
			return FALSE;
		endif;

		return TRUE;
	}

	function validate_phone($str)
	{
		$str = trim($str);
		if (empty($str) == true):
			$this->form_validation->set_message('validate_phone', '%s is required');
			return FALSE;
		endif;

		if (! preg_match('/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/', $str)):
			$this->form_validation->set_message('validate_phone', 'Invalid phone number');
			return FALSE;
		endif;

		return TRUE;
	}

	function validate_email($str)
	{
		$str = trim($str);
		if (empty($str) == true):
			$this->form_validation->set_message('validate_email', '%s is required');
			return FALSE;
		endif;

		if (! preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $str)):
			$this->form_validation->set_message('validate_email', 'Invalid e-mail address');
			return FALSE;
		endif;

		return TRUE;
	}

	function customerCommentSent()
	{
		if (! ini_get('date.timezone')) date_default_timezone_set('GMT');

		$this->load->library('email');

		$this->email->from('000306746@csunix.mohawkcollege.ca', 'SleepyMe');
		$this->email->to('000306746@csunix.mohawkcollege.ca');
		$this->email->subject('SleepyMe Customer Comment');
		$this->email->message(
			"IP: " . $this->input->ip_address() .
			"\r\nname: " . $this->input->post('name') .
			"\r\npostal: " . $this->input->post('postal') .
			"\r\nphone: " . $this->input->post('phone') .
			"\r\ncomment: " . $this->input->post('comment')
		);

		if (! $this->email->send()):
			$this->TPL['errors'] = true;
			$this->TPL['msg'] = "We didn't receive your message for some reason.";
		else:
			$this->TPL['submitted'] = true;
			$this->TPL['msg'] = "Thanks for your feedback!";
		endif;

		$this->template->show('contact', $this->TPL);
	}

}
?>