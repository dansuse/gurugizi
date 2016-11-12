<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_postingan extends CI_Model {
	public function getAll($limit=null,$start=null,$keyword=null,$kategori=null,$tanggal=null,$email){
		if($limit != null)
		{
			$this->db->limit($limit,$start);
		}
		if($keyword != null)
		{
			if($kategori!='waktu_posting')
			{
				$this->db->like($kategori, $keyword);
			}
			else
			{
				$this->db->where($kategori.' '.$tanggal.' ', $keyword);
			}
		}
		$this->db->where('email_nutritionist',$email);
		$this->db->order_by('waktu_posting','desc');
		return $this->db->get('postingan')->result();
	}
	public function delete($data)
	{
		$this->db->where('id_postingan', $data);
		$this->db->delete('vote_postingan');
		$this->db->where('id_postingan', $data);
		$this->db->delete('comment_postingan');
		$this->db->where('id_postingan', $data);
		$this->db->delete('postingan');
	}
}
