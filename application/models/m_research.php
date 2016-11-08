<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_research extends CI_Model {


	public function getResearch($page = null)
	{
		return $this->db->get('research')->result();
	}

}
