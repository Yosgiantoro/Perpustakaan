<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_user')==NULL || $this->session->userdata('role_user')== 'Peminjam' ){
			redirect('auth');
		}
	}
	public function index()
	{
        $this->load->view('admin/laporan');
	}
    public function tanggal(){
        $awal = $this->input->post('tanggal_peminjaman');
        $akhir = $this->input->post('tanggal_pengembalian');
        $this->db->from('detail_peminjaman a')->join('buku b','a.id_buku=b.id_buku')->join('users c','a.id_user=c.id_user');
        $this->db->where('tanggal_peminjaman >=', $awal);
        $this->db->where('tanggal_peminjaman <=', $akhir);
        $laporan = $this->db->get()->result_array();
        $data = array(
            'laporan' => $laporan,
            'awal' => $this->input->post('tanggal_peminjaman'),
            'akhir' => $this->input->post('tanggal_pengembalian'),

        );
        $this->load->view('admin/laporan',$data);
    }
    public function nama(){
        $awal = $this->input->post('tanggal_peminjaman');
        $akhir = $this->input->post('tanggal_pengembalian');
        $nama = $this->input->post('nama');
        $this->db->from('detail_peminjaman a')->join('buku b','a.id_buku=b.id_buku')->join('users c','a.id_user=c.id_user');
        $this->db->where('tanggal_peminjaman >=', $awal);
        $this->db->where('tanggal_peminjaman <=', $akhir);
        $this->db->where('c.id_user =', $nama);
        $laporan = $this->db->get()->result_array();
        $data = array(
            'laporan' => $laporan,
            'awal' => $this->input->post('tanggal_peminjaman'),
            'akhir' => $this->input->post('tanggal_pengembalian'),

        );
        $this->load->view('admin/laporan',$data);
    }

}
