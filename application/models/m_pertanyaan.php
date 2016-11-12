<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pertanyaan extends CI_Model {
	public function getAll($limit=null,$start=null,$keyword=null,$kategori=null,$tanggal=null,$email){
		$this->db->limit($limit,$start);
		if($keyword != null)
		{
			if($kategori!='waktu_bertanya')
			{
				$this->db->like($kategori, $keyword);
			}
			else
			{
				$this->db->where($kategori.' '.$tanggal.' ', $keyword);
			}
		}
		$this->db->where('email_pasien',$email);
		$this->db->order_by('waktu_bertanya','desc');
		return $this->db->get('pertanyaan')->result();
	}
	public function delete($data)
	{
		$this->db->where('id_pertanyaan', $data);
		$this->db->delete('vote_pertanyaan');
		$this->db->where('id_pertanyaan', $data);
		$this->db->delete('jawaban');
		$this->db->where('id_pertanyaan', $data);
		$this->db->delete('pertanyaan');
	}
}
