<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dokter extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_dokter');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('upload');
	}

	public function index()
	{
		//Coba Edit Boy
		//$this->load->view('v_header');
		$this->load->view('v_signup_dokter');
		//$this->load->view('v_dataakademik_dokter');
	}

	public function profile(){
		$this->load->model('m_pasien');
		$data['result']=$this->m_pasien->getDataPasien($this->session->userdata(SESSION_LOGIN_NOW));
		$this->load->view('v_profile', $data);
	}
	public function ubahProfile(){
		$this->load->view('v_ubah_profile');
	}
	public function fHandleUbahProfile(){
		$this->load->model('m_pasien');
		$data['email']=$this->session->userdata(SESSION_LOGIN_NOW);
		$data['berat_badan']=$this->input->post('tbBeratBadan');
		$data['tinggi_badan']=$this->input->post('tbTinggiBadan');
		$data['keterangan']=$this->input->post('tbKeterangan');
		$this->m_pasien->updateProfile($data);
		redirect('c_home/profile');
	}

	public function login(){
		if($this->session->userdata(SESSION_LOGIN_NOW) != false){
			redirect('c_home/index');
		}
		$this->load->view('v_login');
	}
	public function logout(){
		$this->session->unset_userdata(SESSION_LOGIN_NOW);
		redirect('c_home/index');
	}
	public function fHandleLogin(){
		$this->load->model('m_pasien');

		$this->form_validation->set_rules('tbPassword', 'Password', 'required|callback_cekPasswordValid');
		$this->form_validation->set_message('cekPasswordValid', 'Login gagal');

		if($this->form_validation->run()){
			$this->session->set_userdata(SESSION_LOGIN_NOW, $this->input->post('tbEmail'));
			redirect('c_home/index');
		}else{
			$this->load->view('v_login');
		}
	}
	public function cekPasswordValid($pass){
		$this->load->model('m_pasien');
		if(strval($this->input->post('tbEmail')) == "" || is_null($this->m_pasien->cekPasienLogin($this->input->post('tbEmail'), $pass))){
			return false;
		}
		return true;
	}

	public function about(){
		$this->load->view('v_header');
		$this->load->view('v_about_us');
	}

	public function research(){
		$this->load->view('v_header');
		$this->load->model('m_research');
		$data['result'] = $this->m_research->getResearch();
		$this->load->view('v_research', $data);
	}
	public function signup(){
		$this->load->view('v_signup_pasien');
	}
	public function livechat(){
		//$this->load->view('v_header');
		$this->load->model('m_pasien');
		$data['result'] = $this->m_pasien->getDataPasien($this->session->userdata(SESSION_LOGIN_NOW));
		$this->load->view('v_live_chat', $data);
	}
	public function consulting($halaman = null){
		$this->load->view('v_header');
		if($halaman == null){
			$this->load->view('v_consulting');
		}else if($halaman == "personalised-nutrition"){
			$this->load->view('v_personalised_nutrition');
		}

	}


	public function fHandleSignup(){

		$this->form_validation->set_rules('tbName', 'Name', 'required');
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
		}
	}
	
	public function fHandleUploadData()
	{
		if($this->input->post("btnUpload"))
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
		}
	}
}
