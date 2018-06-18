<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index(){
        $data = array(
            'page' => 'user/datauser',
            'link' => 'user',
            'list' => $this->M_user->list_user(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'user/tambahdatauser',
            'link' => 'user',
            'script' => 'script/user'
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function tambahbarang(){
    	$data = array(
    		'userNama' => $this->input->post('username', true),
    		'userPassword' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
    		'userHakakses' => $this->input->post('hakakses', true)
    	);
    	$simpan = $this->M_user->simpan_user($data);
    	if($simpan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_user'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function hapuskategori(){
    	$brngId =$this->uri->segment(3);
		$hapuskategori = $this->M_user->hapus_user('userId',$brngId);
		if($hapuskategori){
		$this->session->set_flashdata(
		    'msg', 
		    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
		);
		redirect(base_url().'c_user'); //location
		}else{
		$this->session->set_flashdata(
		    'msg', 
		    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
		);
		}
    }

    public function formubah(){
        $brngId =$this->uri->segment(3);
         $data = array(
            'page' => 'user/ubahuser',
            'link' => 'user',
            'data' => $this->M_user->ambil_user('userId', $brngId),           
            'script' => 'script/user'
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function ubahbarang(){
    	if($password != ''){
    		$data = array(
	    		'userNama' => $this->input->post('username', true),
	    		'userPassword' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
	    		'userHakakses' => $this->input->post('hakakses', true)
	    	);
    	}else{
    		$data = array(
	    		'userNama' => $this->input->post('username', true),
	    		'userHakakses' => $this->input->post('hakakses', true)
	    	);
    	}

    	$simpan = $this->M_user->ubah_user('userId', $this->input->post('userId', true), $data);
    	if($simpan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
            redirect(base_url().'c_user'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
         }
    }

}