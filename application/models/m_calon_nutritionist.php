<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_calon_nutritionist extends CI_Model {
	public function regNutritionist($data)
	{
		$this->db->insert('nutritionist', $data);
	}
	public function cekNutritionistLogin($email, $pass){
		return $this->db->get_where('nutritionist', ['email'=>$email, 'password'=>$pass])->row();
	}
	public function getDataNutritionist($email){
		return $this->db->get_where('nutritionist', ['email'=>$email])->row();
	}
	public function updateProfile($data){
		$this->db->where('email', $data['email']);
		$this->db->update('nutritionist', $data);
	}
	public function delete($data){
		$this->db->where('email_nutritionist', $data['email']);
		$this->db->delete('jawaban');
		$this->db->where('email_nutritionist', $data['email']);
		$this->db->delete('postingan');
		$this->db->where('email', $data['email']);
		$this->db->delete('nutritionist', $data);
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
		$this->db->where('keterangan', '');
		$this->db->order_by('tanggal_lahir','desc');
		return $this->db->get('nutritionist')->result();
	}
}
