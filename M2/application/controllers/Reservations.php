<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Controller
{

	var $TPL = array();

	function __construct()
	{
		parent::__construct();
		$this->TPL['title'] = "Reservations";
	}

	public function index()
	{
		$this->template->show('reservations', $this->TPL);
	}

}

?>