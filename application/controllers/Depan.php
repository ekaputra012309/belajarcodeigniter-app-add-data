<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}
	
	public function index()
	{
		$this->load->view('depan');
	}

	function log2()
	{
		$this->load->view('back/login');
	}

	function login()
	{
		$data = array(
			'username' => $this->input->post('username', TRUE),
			'password' => md5($this->input->post('password', TRUE))
		);
		$hasil = $this->m_login->cek_user('user',$data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$data = array(
					'login'		=> 'Sudah Loggin',
					'id'	    => $sess->id,
					'username'	=> $sess->username,
					'nama'	    => $sess->nama,
					'level'	    => $sess->level,
					'img'	    => $sess->img,
				);
				$this->session->set_userdata($data);				
			} redirect('dashboard');
		}
		else {
			$this->session->set_flashdata('msg', 'Username atau password salah!');
			redirect('depan/log2');
		}
	}

	function logout() {
		$this->session->unset_userdata('username');
		session_destroy();
		redirect('');
	}
}
