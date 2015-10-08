<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class RoomsAndRates extends CI_Controller
{

	var $TPL = array();

	function __construct()
	{
		parent::__construct();
		$this->load->model('Rooms_model');
		$this->TPL['title'] = 'Rooms &amp; Rates';
	}

	public function index()
	{
		$this->TPL['rooms'] = $this->Rooms_model->getAllRooms();
		$this->template->show('rooms-and-rates', $this->TPL);
	}
}

?>