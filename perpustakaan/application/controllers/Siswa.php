<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_user')== 'Peminjam'|| $this->session->userdata('role_user')==NULL ){
			redirect('auth');
		}
	}
	public function index()
	{
        $this->db->from('siswa')->order_by('id_siswa','ASC');
		$siswa = $this->db->get()->result_array();
		$data =  array(
			'judul_halaman' => 'User',
            'siswa'        => $siswa,
		);
		$this->template->load('temp/template','admin/siswa',$data);
	}

	public function tambah(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'assets/siswa/';
        $config['max_size'] = 500 * 1024;
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload',$config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Ukuran foto terlalu besar.
		</div>');
        redirect('Buku');
        }else if(! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
			'tanggal' => $this->input->post('tanggal'),
			'foto'        => $namafoto,

        );
        $this->db->insert('siswa',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Siswa Berhasil DiTambahkan
	</div>');
		redirect('Siswa');
    }
		public function hapus($id){
		$filename = FCPATH.'/assets/siswa/'.$id;
		if(file_exists($filename)){
			unlink("./assets/siswa/".$id);
		}
		$where = array(
			'foto' => $id
		);
		$this->db->delete('siswa',$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiHapus
	</div>');
		redirect('Siswa');
	}
    public function update(){
	$namafoto = $this->input->post('foto');
	$config['upload_path']      = 'assets/siswa/';
	$config['max_size'] = 500 * 1024;
	$config['file_name'] = $namafoto;
	$config['overwrite'] = true;
	$config['allowed_types'] = '*';
	$this->load->library('upload',$config);
	if($_FILES['foto']['size'] >= 500 * 1024){
		$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Ukuran foto terlalu besar.
	</div>');
	redirect('Siswa');
	}else if(! $this->upload->do_upload('foto')){
		$error = array('error' => $this->upload->display_errors());
	}else{
		$data = array('upload_data' => $this->upload->data());
	}
	$data = array(
		'nis' => $this->input->post('nis'),
		'nama' => $this->input->post('nama'),
		'alamat' => $this->input->post('alamat'),
		'tanggal' => $this->input->post('tanggal'),
	);
	$where = array(
		'foto' => $this->input->post('foto')
	);
	$this->db->update('siswa',$data,$where);
	$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
	<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiUpdate
    </div>');
	redirect('Siswa');
    }
}
