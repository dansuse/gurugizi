<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$nav = [
			["nama"=>"Home", "url"=>site_url(['c_home', 'index'])],
			["nama"=>"Research", "url"=>site_url(['c_home', 'index'])],
			["nama"=>"Recipe", "url"=>site_url(['c_home', 'index'])],
			["nama"=>"Home", "url"=>site_url(['c_home', 'index'])]
		];

	}
	public function index()
	{
		//$this->load->view('v_header');
		$this->load->view('v_home');
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
	public function buatPostingan(){
		$this->load->view('v_buat_artikel');
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
	public function cekUsernameTersedia($username){
		$this->load->model('m_pasien');
		$temp = $this->m_pasien->cekUsernameTersedia($username);
		if(is_null($temp)){
			echo "Tersedia";
		}else{
			echo "Tidak Tersedia";
		}
	}
	public function cekEmailBelumPunyaAkun($email){
		$this->load->model('m_pasien');
		$temp = $this->m_pasien->cekEmailBelumPunyaAkun(urldecode($email));
		if(is_null($temp)){
			echo "";
		}else{
			echo "Email sudah terdaftar. Coba pakai email yang lain.";
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

		$this->form_validation->set_rules('tbNickName', 'NickName', 'required');
		$this->form_validation->set_rules('tbFullname', 'Fullname', 'required');
		$this->form_validation->set_rules('tbEmail', 'Email', 'required');
		$this->form_validation->set_rules('tbPassword', 'Password', 'required');
		$this->form_validation->set_rules('tbPasswordConf', 'Konfirmasi Password', 'required|matches[tbPassword]');
		$this->form_validation->set_rules('rbGender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tbBirthday', 'Birthday', 'required');
		$this->form_validation->set_rules('tbLocation', 'Location', 'required');

		if($this->form_validation->run()){
			$this->load->model('m_pasien');
			//echo $this->input->post('tbBirthday');
			$data = [
				'nickname'=>$this->input->post('tbNickName'),
				'fullname'=>$this->input->post('tbFullname'),
				'email'=>$this->input->post('tbEmail'),
				'password'=>$this->input->post('tbPassword'),
				'gender'=>$this->input->post('rbGender'),
				'birthday'=>date('Y-m-d', strtotime($this->input->post('tbBirthday'))),
				'kota'=>$this->input->post('tbLocation')
			];
			$this->m_pasien->regPasien($data);
			redirect('c_home/login');
		}else{
			$this->load->view('v_signup_pasien');
		}
	}
}
