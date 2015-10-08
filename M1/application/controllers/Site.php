<?php
class Site extends CI_Controller {

	public function index()
	{
		$TPL['title'] = 'Home';
		$this->template->show('home', $TPL);
	}

	public function roomsAndRates()
	{
		$TPL['title'] = 'Rooms &amp; Rates';
		$this->template->show('rooms-and-rates', $TPL);
	}

	public function reservations()
	{
		$TPL['title'] = 'Reservations';
		$this->template->show('reservations', $TPL);
	}

	public function contact()
	{
		$TPL['title'] = 'Contact';
		$this->template->show('contact', $TPL);
	}
	
}
?>