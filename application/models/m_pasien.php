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
	public function delete($data){
		$this->db->where('email_pasien', $data);
		$this->db->delete('vote_pertanyaan');
		$this->db->where('email_pasien', $data);
		$this->db->delete('vote_postingan');
		$this->db->where('email_pasien', $data);
		$this->db->delete('pertanyaan');
		$this->db->where('email_pasien', $data);
		$this->db->delete('comment_postingan');
		$this->db->where('email', $data);
		$this->db->delete('pasien');
	}
	public function getAll($limit=null,$start=null,$keyword=null,$kategori=null,$tanggal=null){
		$this->db->limit($limit,$start);
		if($keyword != null)
		{
			if($kategori!='tanggal_lahir')
			{
				$this->db->like($kategori, $keyword);
			}
			else
			{
				$this->db->where($kategori.' '.$tanggal.' ', $keyword);
			}
		}
		
		$this->db->order_by('tanggal_lahir','desc');
		return $this->db->get('pasien')->result();
	}
}
