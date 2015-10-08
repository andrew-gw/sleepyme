<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rooms_model extends CI_Model
{
	function __construct() {
		parent::__construct();
    }

	public function getAllRooms()
	{
		$rs = $this->db->get('rooms');
		return $rs->result();
	}
}

?>