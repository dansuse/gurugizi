<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_nutritionist extends CI_Model {


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

}
