<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_user')!== 'Admin' ){
			redirect('auth');
		}
	}
	public function index()
	{
        $this->db->from('users')->order_by('id_user','ASC');
		$user = $this->db->get()->result_array();
		$data =  array(
			'judul_halaman' => 'User',
            'user'        => $user,
		);
		$this->template->load('temp/template','admin/user',$data);
	}

	public function tambah(){
        $data = array(
            'nama'   => $this->input->post('nama'),
            'alamat'    =>$this->input->post('alamat'),
            'email'      =>$this->input->post('email'),
            'username'      =>$this->input->post('username'),
            'password'      =>$this->input->post('password'),
            'role_user'      =>$this->input->post('role_user'),

        );
        $this->db->insert('users',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>User Berhasil DiTambahkan
	</div>');
		redirect('User');
    }
	public function hapus($id){
		$where = array(
			'id_user' => $id
		);
		$this->db->delete('users',$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiHapus
	</div>');
		redirect('User');
	}
}
