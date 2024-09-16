<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        
		$this->load->view('login');
	}

	public function regis()
	{
        
		$this->load->view('register');
	}
    public function login() {
    $username = $this->input->post('username');
    $password = ($this->input->post('password'));
    $this->db->from('users')->where('username', $username);
    $cek = $this->db->get()->row();
    if ($cek == NULL) {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Username Tidak Ada
        </div>');
        redirect('Auth');
    } else if ($password == $cek->password) {
        $data = array(
            'id_user' => $cek->id_user,
            'nama' => $cek->nama,
            'email' => $cek->email,
            'username' => $cek->username,
            'role_user' => $cek->role_user,
        );
        $this->session->set_userdata($data);
        if ($cek->role_user == 'Admin' || $cek->role_user == 'Petugas') {
            redirect('Admin');
        } else {
            redirect('PinjamBuku');
        }
    } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>Password Salah
        </div>');
        redirect('Auth');
    }
}

    public function logout(){
        $this->session->sess_destroy();
        redirect('Auth');
    }
public function tambah() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');

    $data = array(
        'nama' => $this->input->post('nama'),
        'username' => $username,
        'password' =>$password,
        'alamat' =>$alamat,
        'email' =>$email,
        'role_user' => $this->input->post('role_user'),
    );
    $this->db->insert('users', $data);
    redirect('Auth');
}

}
