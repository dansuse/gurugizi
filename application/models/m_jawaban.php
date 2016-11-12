<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_jawaban extends CI_Model {
	public function getAll($limit=null,$start=null,$keyword=null,$kategori=null,$tanggal=null,$email){
		$this->db->limit($limit,$start);
		if($keyword != null)
		{
			if($kategori!='waktu_jawab')
			{
				$this->db->like($kategori, $keyword);
			}
			else
			{
				$this->db->where($kategori.' '.$tanggal.' ', $keyword);
			}
		}
		$this->db->where('email_nutritionist',$email);
		$this->db->order_by('waktu_jawab','desc');
		return $this->db->get('jawaban')->result();
	}
	public function delete($data)
	{
		$this->db->where('id_jawaban', $data);
		$this->db->delete('jawaban');
	}
}
