<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CobaLogin extends CI_Controller {

	public function index()
	{
        $this->load->view('coba/cobalogin');
	}
    public function register(){
        $this->load->view('coba/cobaregis');
    }
    public function tambah(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
        );
        $this->db->insert('coba_login',$data);
        redirect('CobaLogin');
    }
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->from('coba_login')->where('username' ,$username);
        $cek = $this->db->get()->row();
        if($cek == NULL){
            redirect('CobaLogin');
        }else if($password == $cek->password){
            $data = array(
            'id_user' => $cek->id_user,
            'username' => $cek->username,
            'nama' => $cek->nama,
            );
            $this->session->set_userdata($data);
            redirect('CobaLogin/utama');
        }else{
            redirect('CobaLogin');
        }
    }
    public function utama(){
        $this->load->view('coba/halamanutama');
    }
}
