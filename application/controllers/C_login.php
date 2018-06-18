<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index(){
		$this->load->view('login');
	}

	public function proses_login(){
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$cek_username = $this->M_login->ambil_user('userNama', $username);
		if($cek_username->num_rows() == 0){
			$this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Username tidak ditemukan !</div>'
            );
            redirect(base_url().'c_login'); //location
		}else{
			$ambil_password = $cek_username->row()->userPassword;
			$cek_password = password_verify($password, $ambil_password);
			if($cek_password === TRUE){		
				$ses['status'] = 'login';
				$ses['userId'] = $cek_username->row()->userId;	
				$ses['userNama'] = $cek_username->row()->userNama;	
				$ses['level'] = $cek_username->row()->userHakakses;	
				$this->session->set_userdata($ses);
	            redirect(base_url().'c_dashboard'); //location
			}else{
				$this->session->set_flashdata(
	                'msg', 
	                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Password salah !</div>'
	            );
	            redirect(base_url().'c_login'); //location
			}
		}

	}

	public function logout(){
		echo 'Please wait...';
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('userId');
		$this->session->unset_userdata('userNama');
		$this->session->unset_userdata('level');
		//session_destroy();
		echo '<script>window.location.href="'.base_url().'";</script>';
	}

}