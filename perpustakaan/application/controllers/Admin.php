<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_user')==NULL || $this->session->userdata('role_user')== 'Peminjam' ){
			redirect('auth');
		}
	}
	public function index()
	{
		$this->template->load('temp/template','dashboard');
	}
	public function buku()
	{
		$this->template->load('temp/template','admin/buku');
	}
	public function peminjaman()
	{
		$user = $this->db->from('users')->where('role_user =','Peminjam')->get()->result_array();
		$pinjam = $this->db->from('peminjaman a')->join('users b','a.id_user=b.id_user')->get()->result_array();
		foreach ($pinjam as &$p) {
        $status = $this->db->from('detail_peminjaman')
                           ->where('kode', $p['kode'])
                           ->where('status_peminjaman', 'dipinjam')
                           ->get()
                           ->row_array();
        $p['status'] = $status ? 'Belum Selesai' : 'Selesai';
		}
		$data = array(
			'user' => $user,
			'pinjam' => $pinjam,
		);
		$this->template->load('temp/template','admin/peminjaman',$data);
	}
	public function tampil_detail($id){
		$detail = $this->db->from('detail_peminjaman a')->join('peminjaman b','a.kode=b.kode')
						->join('buku c','a.id_buku=c.id_buku')->join('users d','a.id_user=d.id_user')
						->where('a.kode',$id)->get()->result_array();
		$data = array(
			'detail' => $detail,
		);
		$this->template->load('temp/template','admin/tampil_pinjam',$data);
	}
	public function kembali($id){
        // Update status peminjaman di tabel buku
		date_default_timezone_set('Asia/Jakarta');
        $this->db->set('status_peminjaman', 'kembali')->set('tanggal_pengembalian', date('Y-m-d'))->where('id_buku',$id)->where('kode',$this->input->post('kode'))->update('detail_peminjaman');
		$this->db->set('stok','stok + 1',FALSE)->where('id_buku',$id)->update('buku');
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Buku Berhasil Dikembalikan.
	</div>');

        // redirect('Admin/peminjaman');	
		redirect($_SERVER['HTTP_REFERER']);
    }
	public function hapus($id){
		$where = array(
			'id_peminjaman' => $id
		);
		$this->db->delete('peminjaman',$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiHapus
	</div>');
		redirect('Admin/peminjaman');
	}
}
