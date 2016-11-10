<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_signup extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_nutritionist');
		$this->load->model('m_pasien');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('upload');
	}
	
	public function index()
	{
	}

	public function pasien()
	{
		if($this->session->flashdata() != null)
		{
			$data = $this->session->flashdata();
			$this->load->view('v_signup_pasien',$data);
		}
		else
		{
			$this->load->view('v_signup_pasien');
		}
	}
	
	public function nutritionist()
	{
		if($this->session->flashdata() != null)
		{
			$data = $this->session->flashdata();
			$this->load->view('v_signup_nutritionist',$data);
		}
		else
		{
			$this->load->view('v_signup_nutritionist');
		}
	}
	
	public function fHandlePasien()
	{
		$this->form_validation->set_rules('tbName', 'Name', 'required');
		$this->form_validation->set_rules('tbEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('tbPassword', 'Password', 'required');
		$this->form_validation->set_rules('tbPasswordConf', 'Konfirmasi Password', 'required|matches[tbPassword]');
		$this->form_validation->set_rules('rbGender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tbBirthday', 'Birthday', 'required');
		$this->form_validation->set_rules('tbLocation', 'Location', 'required');
		
		$data = [
				'nama'=>$this->input->post('tbName'),
				'email'=>$this->input->post('tbEmail'),
				'password'=>$this->input->post('tbPassword'),
				'jenis_kelamin'=>$this->input->post('rbGender'),
				'tanggal_lahir'=>date('Y-m-d', strtotime($this->input->post('tbBirthday'))),
				'domisili'=>$this->input->post('tbLocation')
			];

		if($this->form_validation->run())
		{
			$user = $this->m_pasien->getDataPasien($data['email']);
			if(!is_object($user))
			{
				$this->m_pasien->regPasien($data);
				redirect('c_home/login');
			}
			else
			{
				$this->session->set_flashdata($data);
				$this->session->set_flashdata('error', 'Email Telah Digunakan');
				redirect('c_signup/pasien');
			}
			
		}
		else
		{
			$this->session->set_flashdata($data);
			$this->session->set_flashdata('error', validation_errors());
			redirect('c_signup/pasien');
		}
	}
	
	public function fHandleNutritionist(){

		$this->form_validation->set_rules('tbName', 'Name', 'required');
		$this->form_validation->set_rules('tbEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('tbPassword', 'Password', 'required');
		$this->form_validation->set_rules('tbPasswordConf', 'Konfirmasi Password', 'required|matches[tbPassword]');
		$this->form_validation->set_rules('rbGender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tbBirthday', 'Birthday', 'required');
		$this->form_validation->set_rules('tbLocation', 'Location', 'required');
		
		$config = array(
			'upload_path' => './dataakademik/',
			'allowed_types' => 'pdf',
			'encrypt_name' => true
		);
		
		
		$data = [
			'nama'=>$this->input->post('tbName'),
			'email'=>$this->input->post('tbEmail'),
			'password'=>$this->input->post('tbPassword'),
			'jenis_kelamin'=>$this->input->post('rbGender'),
			'tanggal_lahir'=>date('Y-m-d', strtotime($this->input->post('tbBirthday'))),
			'domisili'=>$this->input->post('tbLocation')
		];

		if($this->form_validation->run())
		{
			$user = $this->m_nutritionist->getDataNutritionist($data['email']);
			if(!is_object($user))
			{
				$gagalUpload = false;
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('fileCv'))
				{
					$gagalUpload = true;
					$this->session->set_flashdata('alertCv',$this->upload->display_errors());
				}
				else
				{
					$getUpload = $this->upload->data();
					$data['file_cv'] = $getUpload['file_name'];
				}
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('fileTranskrip'))
				{
					$gagalUpload = true;
					$this->session->set_flashdata('alertTranskrip',$this->upload->display_errors());
				}
				else
				{
					$getUpload = $this->upload->data();
					$data['file_transkrip_nilai'] = $getUpload['file_name'];
				}
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('fileIjazah'))
				{
					$gagalUpload = true;
					$this->session->set_flashdata('alertIjazah',$this->upload->display_errors());
				}
				else
				{
					$getUpload = $this->upload->data();
					$data['file_ijazah'] = $getUpload['file_name'];
				}
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('fileStr'))
				{
					$gagalUpload = true;
					$this->session->set_flashdata('alertStr',$this->upload->display_errors());
				}
				else
				{
					$getUpload = $this->upload->data();
					$data['file_str'] = $getUpload['file_name'];
				}
				
				
				if(!$gagalUpload)
				{
					$this->m_nutritionist->regNutritionist($data);
					redirect('c_home/login');
				}
				else
				{
					$this->session->set_flashdata($data);
					redirect('c_signup/nutritionist');
				}
			}
			else
			{
				$this->session->set_flashdata($data);
				$this->session->set_flashdata('error', 'Email Telah Digunakan');
				redirect('c_signup/nutritionist');
			}
			
		}
		else
		{
			$this->session->set_flashdata($data);
			$this->session->set_flashdata('error', validation_errors());
			redirect('c_signup/nutritionist');
		}
		
		/*if($this->input->post("btnUpload"))
		{
			$id = $this->session->userdata('id');
			
			$data['alert'] = '';
			$config = array(
			'upload_path' => './dataakademik/',
			'allowed_types' => 'pdf',
			'encrypt_name' => true
			);
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('fileTranskrip')){
				$data['alertTranskrip'] = $this->upload->display_errors();
			}
			else{
				$getUpload = $this->upload->data();
				$nama = $getUpload['file_name'];
				$dataUpdate = array('transkrip'=>$nama);
				$this->m_dokter->updateDataDokter($id,$dataUpdate);
				$data['alertTranskrip'] = 'Berhasil Upload';
			}
			
			if(!$this->upload->do_upload('fileIjazah')){
				$data['alertIjazah'] = $this->upload->display_errors();
			}
			else{
				$getUpload = $this->upload->data();
				$nama = $getUpload['file_name'];
				$dataUpdate = array('ijazah'=>$nama);
				$this->m_dokter->updateDataDokter($id,$dataUpdate);
				$data['alertIjazah'] = 'Berhasil Upload';
			}
			
			if(!$this->upload->do_upload('filePengalamanKerja')){
				$data['alertPK'] = $this->upload->display_errors();
			}
			else{
				$getUpload = $this->upload->data();
				$nama = $getUpload['file_name'];
				$dataUpdate = array('pengalamankerja'=>$nama);
				$this->m_dokter->updateDataDokter($id,$dataUpdate);
				$data['alertPK'] = 'Berhasil Upload';
			}
			
			$this->load->view('v_dataakademik_dokter',$data);
		}*/
		
		/*$this->form_validation->set_rules('tbName', 'Name', 'required');
		$this->form_validation->set_rules('tbEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('tbPassword', 'Password', 'required');
		$this->form_validation->set_rules('tbPasswordConf', 'Konfirmasi Password', 'required|matches[tbPassword]');
		$this->form_validation->set_rules('tbBirthday', 'Birthday', 'required');
		$this->form_validation->set_rules('tbLocation', 'Location', 'required');
		$this->form_validation->set_rules('tbTelp', 'Telp', 'required|numeric');
		$this->form_validation->set_rules('tbAlamat', 'Alamat', 'required');

		$data['nama'] = $this->input->post('tbName');
		$data['tempatLahir'] = $this->input->post('tbLocation');
		$data['tanggalLahir'] = $this->input->post('tbBirthday');
		$data['email'] = $this->input->post('tbEmail');
		$data['hp'] = $this->input->post('tbTelp');
		$data['alamat'] = $this->input->post('tbAlamat');
		$data['errorID'] = '';
		
		if($this->form_validation->run()){
			$cekID = $this->m_dokter->cekID($data['email']);
			if($cekID == 0)
			{
				$data = [
				'nama'=>$this->input->post('tbName'),
				'ttl'=>$this->input->post('tbLocation').','.date('Y-m-d', strtotime($this->input->post('tbBirthday'))),
				'email'=>$this->input->post('tbEmail'),
				'password'=>$this->input->post('tbPassword'),
				'hp'=>$this->input->post('tbTelp'),
				'alamat'=>$this->input->post('tbAlamat')
				];
				$aff = $this->m_dokter->regDokter($data);
				if($aff == 1)
				{
					$this->session->set_userdata('id',$data['email']);
					$this->m_dokter->buatDataDokter($data['email']);
					$this->load->view('v_dataakademik_dokter');
				}
				else{echo 'gagal';}
			}
			else
			{
				$errorID = 'Maaf Alamat Email '.$data['email'].' Telah Digunakan';
				$data['email'] = $errorID;
				$this->load->view('v_signup_dokter',$data);
			}
		}else{
			$this->load->view('v_signup_dokter',$data);
		}*/
	}
}
