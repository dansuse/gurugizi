<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_nutritionist');
		$this->load->model('m_pasien');
		$this->load->model('m_pertanyaan');
		$this->load->model('m_komentar');
		$this->load->model('m_postingan');
		$this->load->model('m_jawaban');
		$this->load->model('m_calon_nutritionist');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('download');
		$this->load->helper('file');
		
		if($this->session->userdata('admin') == null)
		{
			redirect('c_home');
		}
	}
	
	public function index()
	{
		
	}

	public function pasien($halamanKe=null)
	{
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/pasien');
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->m_pasien->getAll(null,null,$keyword,$kategori,$tanggal));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['pasien'] = $this->m_pasien->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal);
		$this->load->view('v_laporan_pasien',$data);
	}
	
	public function nutritionist()
	{
		$this->session->keep_flashdata('per_page');
		$this->session->keep_flashdata('keyword');
		$this->session->keep_flashdata('kategori');
		$this->session->keep_flashdata('tanggal');
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/nutritionist');
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->m_nutritionist->getAll(null,null,$keyword,$kategori,$tanggal));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['nutritionist'] = $this->m_nutritionist->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal);
		$this->load->view('v_laporan_nutritionist',$data);
	}
	
	public function calonnutritionist()
	{
		$this->session->keep_flashdata('per_page');
		$this->session->keep_flashdata('keyword');
		$this->session->keep_flashdata('kategori');
		$this->session->keep_flashdata('tanggal');
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/calonnutritionist');
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->m_calon_nutritionist->getAll(null,null,$keyword,$kategori,$tanggal));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['nutritionist'] = $this->m_calon_nutritionist->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal);
		$this->load->view('v_laporan_calon_nutritionist',$data);
	}
	
	public function deletePasien($email)
	{
		$convertEmail = str_replace(":", '@', $email);
		$pertanyaan = $this->m_pertanyaan->getAll(null,null,null,null,null,$convertEmail);
		foreach($pertanyaan as $p)
		{
			$this->m_pertanyaan->delete($p->id_pertanyaan);
		}
		$this->m_pasien->delete($convertEmail);
		redirect('c_laporan/pasien');
	}
	
	public function deleteNutritionist($email)
	{
		$convertEmail = str_replace(":", '@', $email);
		$data = array(
			'email' => $convertEmail
		);
		$postingan = $this->m_postingan->getAll(null,null,null,null,null,$convertEmail);
		foreach($postingan as $p)
		{
			$this->m_postingan->delete($p->id_postingan);
		}
		$this->m_nutritionist->delete($data);
		redirect('c_laporan/nutritionist');
	}
	
	public function deleteCalonNutritionist($email)
	{
		$convertEmail = str_replace(":", '@', $email);
		$data = array(
			'email' => $convertEmail
		);
		$postingan = $this->m_postingan->getAll(null,null,null,null,null,$convertEmail);
		foreach($postingan as $p)
		{
			$this->m_postingan->delete($p->id_postingan);
		}
		$this->m_nutritionist->delete($data);
		redirect('c_laporan/calonnutritionist');
	}
	
	public function terimaCalonNutritionist($email)
	{
		$convertEmail = str_replace(":", '@', $email);
		$data = array(
			'email' => $convertEmail,
			'keterangan' => 'diterima'
		);
		$this->m_nutritionist->updateProfile($data);
		redirect('c_laporan/calonnutritionist');
	}
	
	public function deletePertanyaan($email,$id_pertanyaan)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->m_pertanyaan->delete($id_pertanyaan);
		redirect('c_laporan/riwayatPertanyaan/'.$email);
	}
	
	public function deleteKomentar($email,$id_comment)
	{
		$convertEmail = str_replace(":", '@', $email);
		$data = array(
			'id_comment' => $id_comment
		);
		$this->m_komentar->delete($data);
		redirect('c_laporan/riwayatKomentar/'.$email);
	}
	
	public function deletePostingan($email,$id)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->m_postingan->delete($id);
		redirect('c_laporan/riwayatPostingan/'.$email);
	}
	
	public function deleteJawaban($email,$id)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->m_jawaban->delete($id);
		redirect('c_laporan/riwayatJawaban/'.$email);
	}
	
	public function riwayatPertanyaan($email,$halamanKe=null)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->session->set_flashdata('emailPasien',$email);
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/riwayatPertanyaan/'.$email);
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['total_rows'] = sizeof($this->m_pertanyaan->getAll(null,null,$keyword,$kategori,$tanggal,$convertEmail ));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['pertanyaan'] = $this->m_pertanyaan->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal,$convertEmail );
		$data['pasien'] = $this->m_pasien->getDataPasien($convertEmail);
		$this->load->view('v_laporan_pertanyaan',$data);
	}
	
	public function riwayatKomentar($email,$halamanKe=null)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->session->set_flashdata('emailPasien',$email);
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/riwayatKomentar/'.$email);
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['total_rows'] = sizeof($this->m_komentar->getAll(null,null,$keyword,$kategori,$tanggal,$convertEmail ));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['comment'] = $this->m_komentar->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal,$convertEmail );
		$data['pasien'] = $this->m_pasien->getDataPasien($convertEmail);
		$this->load->view('v_laporan_komentar',$data);
	}
	
	public function riwayatPostingan($email,$halamanKe=null)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->session->set_flashdata('emailNutritionist',$email);
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/riwayatPostingan/'.$email);
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['total_rows'] = sizeof($this->m_postingan->getAll(null,null,$keyword,$kategori,$tanggal,$convertEmail ));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['postingan'] = $this->m_postingan->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal,$convertEmail );
		$data['nutritionist'] = $this->m_nutritionist->getDataNutritionist($convertEmail);
		$this->load->view('v_laporan_postingan',$data);
	}
	
	public function riwayatJawaban($email,$halamanKe=null)
	{
		$convertEmail = str_replace(":", '@', $email);
		$this->session->set_flashdata('emailNutritionist',$email);
		
		$perPage = 5;
		if($this->session->flashdata('per_page') != null)
		{
			$perPage = $this->session->flashdata('per_page');
		}
		
		$per_page = $perPage;
		$keyword = $this->session->flashdata('keyword');
		$kategori = $this->session->flashdata('kategori');
		$tanggal = $this->session->flashdata('tanggal');
		
		$config = array();
		$config['base_url'] = site_url('c_laporan/riwayatJawaban/'.$email);
		$config["per_page"] = $per_page;
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['total_rows'] = sizeof($this->m_jawaban->getAll(null,null,$keyword,$kategori,$tanggal,$convertEmail ));
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$data['perPage'] = $this->session->flashdata('per_page');
		$data['keyword'] = $this->session->flashdata('keyword');
		$data['kategori'] = $this->session->flashdata('kategori');
		$data['tanggal'] = $this->session->flashdata('tanggal');
		$data['jawaban'] = $this->m_jawaban->getAll($config['per_page'],$page,$keyword,$kategori,$tanggal,$convertEmail );
		$data['nutritionist'] = $this->m_nutritionist->getDataNutritionist($convertEmail);
		$this->load->view('v_laporan_jawaban',$data);
	}
	
	public function fHandlePasien()
	{
		if($this->input->post('btnRefresh'))
		{
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'tanggal_lahir')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/pasien');
		}
		
		if($this->input->post('btnRefreshPertanyaan'))
		{
			$email = $this->session->flashdata('emailPasien',$perPage);
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'waktu_bertanya')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/riwayatPertanyaan/'.$email);
		}
		
		if($this->input->post('btnRefreshKomentar'))
		{
			$email = $this->session->flashdata('emailPasien',$perPage);
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'waktu_comment')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/riwayatKomentar/'.$email);
		}
		
		if($this->input->post('btnKembaliKeLapPasien'))
		{
			redirect('c_laporan/pasien');
		}
	}
	
	public function fHandleNutritionist(){
		
		if($this->input->post('btnRefresh'))
		{
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'tanggal_lahir')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/nutritionist');
		}
		
		if($this->input->post('btnRefreshPostingan'))
		{
			$email = $this->session->flashdata('emailNutritionist',$perPage);
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'waktu_posting')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/riwayatPostingan/'.$email);
		}
		
		if($this->input->post('btnRefreshJawaban'))
		{
			$email = $this->session->flashdata('emailNutritionist',$perPage);
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'waktu_jawab')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/riwayatJawaban/'.$email);
		}
		
		if($this->input->post('btnKembaliKeLapNutritionist'))
		{
			redirect('c_laporan/nutritionist');
		}
	}
	
	public function fHandleCalonNutritionist(){
		
		if($this->input->post('btnRefresh'))
		{
			$perPage = $this->input->post('nPerPage');
			$keyword = $this->input->post('tbKeyword');
			$tanggal = $this->input->post('rbFilterTanggal');
			$kategori = $this->input->post('ddKategori');
			if($kategori == 'tanggal_lahir')
			{
				$keyword = date('Y-m-d', strtotime($this->input->post('tbKeyword')));
			}
			else
			{
				$keyword = $this->input->post('tbKeyword');
			}
			
			$this->session->set_flashdata('per_page',$perPage);
			$this->session->set_flashdata('keyword',$keyword);
			$this->session->set_flashdata('kategori',$kategori);
			$this->session->set_flashdata('tanggal',$tanggal);
			redirect('c_laporan/calonnutritionist');
		}
		
		if($this->input->post('btnKembaliKeLapNutritionist'))
		{
			redirect('c_laporan/calonnutritionist');
		}
	}
	
	public function downloadFileAkademik($jenis,$fileName)
	{
		$data = file_get_contents(base_url('/dataakademik/'.$fileName));
		$name = $jenis.'.pdf';
		force_download($name, $data);
	}
}
