<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dokter extends CI_Model {


	public function regDokter($data)
	{
		$this->db->insert('dokter', $data);
		return $this->db->affected_rows();
	}
	public function buatDataDokter($email)
	{
		$data = array('email_dokter'=>$email);
		$this->db->insert('data_dokter', $data);
		return $this->db->affected_rows();
	}
	public function updateDataDokter($email,$data)
	{
		$this->db->where('email_dokter',$email);
		$this->db->update('data_dokter', $data);
		return $this->db->affected_rows();
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
	
	public function cekID($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('dokter');
		$rowcount = $query->num_rows();
		return $rowcount;
	}
}
