<?php
class Home extends CI_Controller {

	var $TPL = array();

	function __construct()
	{
		parent::__construct();
		$this->TPL['title'] = 'Home';
	}

	public function index()
	{
		$this->template->show('home', $this->TPL);
	}

}
?>