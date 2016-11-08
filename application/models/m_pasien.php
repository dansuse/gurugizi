<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pasien extends CI_Model {


	public function regPasien($data)
	{
		$this->db->insert('pasien', $data);
	}
	public function cekPasienLogin($email, $pass){
		return $this->db->get_where('pasien', ['email'=>$email, 'password'=>$pass])->row();
	}
	public function getDataPasien($email){
		return $this->db->get_where('pasien', ['email'=>$email])->row();
	}
	public function updateProfile($data){
		$this->db->where('email', $data['email']);
		$this->db->update('pasien', $data);
	}

}
