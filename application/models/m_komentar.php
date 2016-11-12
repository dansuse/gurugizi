<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_komentar extends CI_Model {
	public function getAll($limit=null,$start=null,$keyword=null,$kategori=null,$tanggal=null,$email){
		$this->db->limit($limit,$start);
		if($keyword != null)
		{
			if($kategori!='waktu_comment')
			{
				$this->db->like($kategori, $keyword);
			}
			else
			{
				$this->db->where($kategori.' '.$tanggal.' ', $keyword);
			}
		}
		$this->db->where('email_pasien',$email);
		$this->db->order_by('waktu_comment','desc');
		return $this->db->get('comment_postingan')->result();
	}
	public function delete($data)
	{
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->delete('comment_postingan');
	}
}
